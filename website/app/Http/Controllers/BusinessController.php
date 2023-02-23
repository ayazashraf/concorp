<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessType;
use App\BusinessDetail;
use App\BusinessAmenityCategory;
use App\BusinessAmenity;
use App\ItemAmenity;
use App\ItemAmenityCategory;
use App\BusinessUtility;
use Illuminate\Http\Request;
use Validator,Redirect,File;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use DB;
use Image;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
       $businesses = Business::latest()->orderBy('name')->paginate(13);
       return view('Admin.business.index',compact('businesses'))->with('i', (request()->input('page', 1) - 1) * 13);    
    }

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = BusinessType::where('parent_id', 0)->get();
        $subtypes = BusinessType::where('parent_id','!=',0)->get();
        //$subcategories = $types->subcategory;                        
        
        $ba_cats = BusinessAmenityCategory::where('parent_id', 0)->get();
        $ba_subcats = BusinessAmenityCategory::where('parent_id','>',0)->get();

        $ia_cats = ItemAmenityCategory::where('parent_id', 0)->get();
        $ia_subcats = ItemAmenityCategory::where('parent_id','>',0)->get();

        $businesses = Business::get();    
        
        $data = ['types' => $types, 'subtypes' => $subtypes,'b_cats' => $ba_cats, 'b_sub_cats'=> $ba_subcats,'i_cats' => $ia_cats, 'i_sub_cats'=> $ia_subcats, 'businesses' =>$businesses];
        return view('Admin.business.create',$data);                
        
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate(request(), [
            'type_id' => 'required',
            'name' => 'required',
            'street_name' => 'required|max:70',
            'street_number' => 'required|max:70',
            'city' => 'required',
            'zip_postal' => 'required',
        ]);

        // START DB Transaction

        DB::transaction(function ()  use ($request) {

          // Update Business Information
          $business = new Business;               
          $business->name = $request->input('name');
          $business->street_number = $request->input('street_number');
          $business->street_name = $request->input('street_name');
          $business->city = $request->input('city');
          $business->zip_postal = $request->input('zip_postal');
          $business->main_intersection = $request->input('main_intersection');
          $business->neighborhood = $request->input('neighborhood'); 
          $business->header_text = $request->input('header_text');
          //$business->latitude = $request->input('latitude');
          //$business->longitude = $request->input('longitude');
          $business->business_type_id = $request->input('type_id');
          $business->map_code = $request->input('map_code');
          $business->active = $request->input('active');
          $business->save();
          
          // Update Business Detail Information
          $detail = new BusinessDetail;        
          $detail->business_id = $business->id;
          $detail->contact_email = $request->input('contact_email');
          $detail->maintenance_email = $request->input('maintenance_email');
          $detail->contact_name = $request->input('contact_name');
          $detail->phone = $request->input('phone');
          $detail->phone_extension = $request->input('phone_extension');
          $detail->alternat_phone = $request->input('alternat_phone');
          $detail->fax = $request->input('fax');
             
          $detail->office_hours = $request->input('office_hours');
          $detail->number_of_units = $request->input('number_of_units');
          $detail->number_of_floors = $request->input('number_of_floors');
          $detail->year_built = $request->input('year_built');
          $detail->purchase_date = $request->input('purchase_date');
          $detail->classification = $request->input('classification');
          $detail->summary = $request->input('summary');
          $detail->description = $request->input('description');
  
          $detail->seo_title = $request->input('seo_title');
          $detail->meta_description = $request->input('meta_description');
          $detail->seo_keywords = $request->input('seo_keywords');
          $detail->website_url = $request->input('website_url');
          $detail->seo_url = $request->input('seo_url');
          $detail->seo_bots = $request->input('seo_bots');
          $detail->seo_bots = $request->input('seo_bots');
   
          $detail->save();    
  
          // Update Business Utility Information
          $utility = new BusinessUtility;        
          $utility->business_id = $business->id;
          $utility->pet_friendly = $request->has('pet_friendly') ? 1 : 0; 
          $utility->small_dogs_friendly = $request->has('small_dogs_friendly') ? 1 : 0; 
          $utility->large_dogs_friendly = $request->has('large_dogs_friendly') ? 1 : 0; 
          $utility->cat_friendly = $request->has('cat_friendly') ? 1 : 0; 
          $utility->no_pets_allowed = $request->has('no_pets_allowed') ? 1 : 0; 
  
          $utility->heat = $request->has('heat') ? 1 : 0; 
          $utility->water = $request->has('water') ? 1 : 0; 
          $utility->electricity = $request->has('electricity') ? 1 : 0;
  
          $utility->parking_details = $request->input('parking_details');
  
          $utility->save();
  
          //Save Selected Business Amenities.
          
          if($request->has('p_amenities'))
          {
              $p_amenities = $request->input('p_amenities');        
              foreach($p_amenities as $amenity){            
                  DB::table('business_amenities')->insert(
                     array(
                       'business_id' => $business->id,
                       'category_id' =>  $amenity
                     )
                  );                              
              } 
          }                                     
          
          //Save Selected Item/Units Amenities.
           if($request->has('i_amenities'))
          {
              $p_amenities = $request->input('i_amenities');        
              foreach($p_amenities as $amenity){            
                  DB::table('item_amenities')->insert(
                     array(
                       'business_id' => $business->id,
                       'category_id' =>  $amenity
                     )
                  );                              
              } 
          }        
        }); // END DB Transaction
        return redirect()->route('business.home')
                        ->with('success','Property created successfully.');                      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $Business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('Admin.business.show',compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        $types = BusinessType::where('parent_id', 0)->get();
        $subtypes = BusinessType::where('parent_id','!=',0)->get();
        //$subcategories = $types->subcategory;                        
        
        $ba_cats = BusinessAmenityCategory::where('parent_id', 0)->get();
        $ba_subcats = BusinessAmenityCategory::where('parent_id','>',0)->get();

        $ia_cats = ItemAmenityCategory::where('parent_id', 0)->get();
        $ia_subcats = ItemAmenityCategory::where('parent_id','>',0)->get();

        $businesses = Business::get();    

        //var_dump(count($business->itemamenity->whereIn('category_id', [9])));
        $data = ['business' => $business, 'types' => $types, 'subtypes' => $subtypes,'detail' => $business->detail,'utility'=>$business->utility,'b_cats' => $ba_cats, 'b_sub_cats'=> $ba_subcats,'i_cats' => $ia_cats, 'i_sub_cats'=> $ia_subcats, 'businesses' =>$businesses];
        return view('Admin.business.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {        
        $this->validate(request(), [
            'type_id' => 'required',
            'name' => 'required',
            'street_name' => 'required|max:70',
            'street_number' => 'required|max:70',
            'city' => 'required',
            'zip_postal' => 'required',
        ]);


        // Update Business Information
        $business = Business::find($business->id);               
        $business->name = $request->input('name');
        $business->street_number = $request->input('street_number');
        $business->street_name = $request->input('street_name');
        $business->city = $request->input('city');
        $business->zip_postal = $request->input('zip_postal');
        $business->main_intersection = $request->input('main_intersection');
        $business->neighborhood = $request->input('neighborhood'); 
        $business->header_text = $request->input('header_text');
        $business->latitude = $request->input('latitude');
        $business->longitude = $request->input('longitude');
        $business->business_type_id = $request->input('type_id');
        $business->map_code = $request->input('map_code');
        $business->active = $request->input('active');
        $business->save();
        
        // Update Business Detail Information
        $detail = $business->detail;        
        $detail->contact_email = $request->input('contact_email');
        $detail->maintenance_email = $request->input('maintenance_email');
        $detail->contact_name = $request->input('contact_name');
        $detail->phone = $request->input('phone');
        $detail->phone_extension = $request->input('phone_extension');
        $detail->alternat_phone = $request->input('alternat_phone');
        $detail->fax = $request->input('fax');
           
        $detail->office_hours = $request->input('office_hours');
        $detail->number_of_units = $request->input('number_of_units');
        $detail->number_of_floors = $request->input('number_of_floors');
        $detail->year_built = $request->input('year_built');
        $detail->purchase_date = $request->input('purchase_date');
        $detail->classification = $request->input('classification');
        $detail->summary = $request->input('summary');
        $detail->description = $request->input('description');

        $detail->seo_title = $request->input('seo_title');
        $detail->meta_description = $request->input('meta_description');
        $detail->seo_keywords = $request->input('seo_keywords');
        $detail->website_url = $request->input('website_url');
        $detail->seo_url = $request->input('seo_url');
        $detail->seo_bots = $request->input('seo_bots');
        $detail->seo_bots = $request->input('seo_bots');
 
        $detail->save();    

        // Update Business Utility Information
        $utility = $business->utility;        
        
        $utility->pet_friendly = $request->has('pet_friendly') ? 1 : 0; 
        $utility->small_dogs_friendly = $request->has('small_dogs_friendly') ? 1 : 0; 
        $utility->large_dogs_friendly = $request->has('large_dogs_friendly') ? 1 : 0; 
        $utility->cat_friendly = $request->has('cat_friendly') ? 1 : 0; 
        $utility->no_pets_allowed = $request->has('no_pets_allowed') ? 1 : 0; 

        $utility->heat = $request->has('heat') ? 1 : 0; 
        $utility->water = $request->has('water') ? 1 : 0; 
        $utility->electricity = $request->has('electricity') ? 1 : 0;

        $utility->parking_details = $request->input('parking_details');

        $utility->save();

        //Save Selected Business Amenities.
        BusinessAmenity::where('business_id', $business->id)->delete();
        if($request->has('p_amenities'))
        {
            $p_amenities = $request->input('p_amenities');        
            foreach($p_amenities as $amenity){            
                DB::table('business_amenities')->insert(
                   array(
                     'business_id' => $business->id,
                     'category_id' =>  $amenity
                   )
                );                              
            } 
        }                                     
        
        //Save Selected Item/Units Amenities.
        ItemAmenity::where('business_id', $business->id)->delete();
        if($request->has('i_amenities'))
        {
            $p_amenities = $request->input('i_amenities');        
            foreach($p_amenities as $amenity){            
                DB::table('item_amenities')->insert(
                   array(
                     'business_id' => $business->id,
                     'category_id' =>  $amenity
                   )
                );                              
            } 
        }

        return redirect()->route('business.home')->with('success','Property updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        DB::delete('Update business set active = ? where id = ?',[3,$id]);  
        return redirect()->route('business.home')
                        ->with('success','Property deleted successfully');        
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $business=DB::table('business')->where('title','LIKE','%'.$request->search."%")
            ->orWhere('summary','LIKE','%'.$request->search."%")
            ->orWhere('content','LIKE','%'.$request->search."%")
            ->get();
           
            if($business)
            {
                foreach ($business as $key => $business) 
                {
                $output.='<tr>'.

                

                '<td>'.$business->title.'</td>';
                

                if(strlen($business->featured_image)>0)
                {
                    $output.='<td><img src="'.url("images/business/thumbnail").'/'.$business->featured_image. '" alt="'.(strlen($business->featured_image)>0?$business->image_caption:'').'"></img></td>';
                }
                else
                {
                    $output.='<td><img src="#" alt=""></img></td>';
                }
                $output.='<td>'.$business->image_caption.'</td>'.

                '<td>'.$business->summary.'</td>'.

                '<td>'.$business->status.'</td>';

                $output .= '<td><form action="'.url('business/destroy')."/".$business->id.'" method="GET">';                                
                $output .= '<a class="btn btn-info" href="'.url('business/show').'/'.$business->id.'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.url('business/edit').'/'.$business->id.'">Edit</a>';    
                $output .= ' <button type="submit" onclick="return confirm(\''."Are you sure?".'\')" class="btn btn-danger">Delete</button>';                    
                $output .= '</form></td>';
                $output .='</tr>';
                }
            return Response($output);
            }
        }
    }
    public function removeImage(Request $request)
    {        
        if($request->ajax())
        {
            $business = Business::find($request->businessid);
            $image_path = public_path('images/business').'/'.$business->featured_image;
            
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }                    
            } catch (Exception $e) {
                //report($e);                        
            }
            $image_path = public_path('images/business/thumbnail').'/'.$business->featured_image;
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            } catch (Exception $e) {
                //report($e);                        
            }
            
            $output="";
            
            $business->featured_image = "";        
            $business->save();
 
            return Response($output);         
        }
    }

    public function getItems(Business $business)
    {
        $sql = "SELECT bi.id,bi.name,bi.rent,bt.type
        FROM business_items bi
        join business_item_types bt on (bt.id = bi.item_type_id)
        where bi.business_id = ". $business->id. " and bi.active = 1";
                
        $items = DB::select($sql);
        return $items;
        //return $business->items->select('id','item_type_id','name','rent','busines_id')->get();
    }
}
