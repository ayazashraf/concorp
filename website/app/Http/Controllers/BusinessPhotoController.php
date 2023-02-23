<?php

namespace App\Http\Controllers;
use App\Business;
use App\BusinessPhoto;
use App\ItemPhoto;
use App\Photo;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Hash;
use DB;
use Image;


class BusinessPhotoController extends Controller
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
    public function index(Business $business)
    {        
        $photos = Photo::where('business_id', $business->id)->orderBy('id')->paginate(10); 
        //$businessphotos = BusinessPhoto::find($business->id);
        return view('Admin.photos.index',compact('photos','business'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Business $business)
    {
        return view('Admin.photos.create',compact('business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Business $business)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $image)
            {
                $name=time().$image->getClientOriginalName();
                $image->move(public_path('images').'/'.'photos'.'/', $name);  
                $data[] = $name;  

                $destinationPath = public_path('images').'/'.'photos'.'/'.'thumbnail';                                
                $full_size_image_path =  public_path('images').'/'.'photos'.'/'.$name;   
                $img = Image::make($full_size_image_path);
                $img->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$name);

                $photo= new Photo();
                $photo->name=$name;
                $photo->business_id = $business->id;
                $photo->save();
            }
        }        
        return redirect()->route('photo.home',$business)->with('success','Photos added successfully.');        
    }

    public function assignToBusiness(Request $request)
    {                           
       if($request->ajax())
        {            
            if((int)$request->add) // Business photo assign
            {               
                $business_photo = new BusinessPhoto;
                $business_photo->business_id = $request->id;
                $business_photo->photo_id = $request->photo_id;
                $business_photo->save();
            }
            else
            {
                DB::delete('delete from business_photos where business_id  = ?  and photo_id=?',[$request->id,$request->photo_id]);  
            }            
            return Response('Photo updated.');
        }
    }    
    public function assignToItem(Request $request)
    {               
        if($request->ajax())
        {            
            if((int)$request->add) 
            {                
                $item_photo = new ItemPhoto;
                $item_photo->item_id = $request->id;
                $item_photo->photo_id = $request->photo_id;
                $item_photo->save();
            }
            else
            {
                DB::delete('delete from item_photos where item_id  = ? and photo_id=?',[$request->id,$request->photo_id]);  
            }            
            return Response('Photo updated.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $business = $photo->business;
        DB::delete('delete from business_photos where photo_id = ?',[$photo->id]); 
        DB::delete('delete from item_photos where photo_id = ?',[$photo->id]); 
        DB::delete('delete from photos where id = ?',[$photo->id]); 
        
        return redirect()->route('photo.home',$business)
                        ->with('success','Photo deleted successfully');
 
    }
}
