<?php

namespace App\Http\Controllers;
use App\Business;
use App\BusinessItem;
use App\BusinessItemType;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Hash;
use DB;


class BusinessItemController extends Controller
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
        $items = BusinessItem::where('business_id', $business->id)        
        ->orderBy('name')->paginate(10); 
        return view('Admin.items.index',compact('items','business'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Business $business)
    {
        $types = BusinessItemType::get();
        $businesses = Business::get();        
        return view('Admin.items.create',compact('business','types','businesses'));        
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
            'rent' => 'required',
            'name' => 'required',
            'business_id' => 'required'
        ]);
  

        $item = new BusinessItem;        
        $item->name = $request->input('name');
        $item->rent = $request->input('rent');

        $item->business_id  = $request->input('business_id');
        $item->item_type_id = $request->input('item_type_id');

        $item->floor = $request->input('floor');
        $item->description = $request->input('description');
        $item->notes = $request->input('notes');

        $item->deposit = $request->input('deposit');
        $item->square_feet = $request->input('square_feet');
        $item->furnished = $request->input('furnished')=='on'?1:0;

        $item->luxury = $request->input('luxury')=='on'?1:0;
        $item->executive = $request->input('executive')=='on'?1:0;
        $item->den = $request->input('den')=='on'?1:0;
        $item->short_term = $request->input('short_term')=='on'?1:0;

        $item->availability = $request->input('availability');
        $item->reference_number = $request->input('reference_number');
        $item->bedrooms = $request->input('bedrooms');
        $item->bathrooms = $request->input('bathrooms');
        $item->featured = $request->input('featured');
        $item->active = $request->input('active');
        
        $item->save();
        
        $business = $item->business;
        return redirect()->route('item.home',$business)->with('success','Unit created successfully');
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
    public function edit(BusinessItem $item)
    {
        $business = $item->business;
        $itemTypes = BusinessItemType::get();
        $businesses = Business::get();
        return view('Admin.items.edit',compact('item','business','itemTypes','businesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessItem $item)
    {
        $this->validate(request(), [
            'rent' => 'required',
            'name' => 'required',
            'business_id' => 'required'
        ]);
  
        $item = BusinessItem::find($item->id);        
        $item->name = $request->input('name');
        $item->rent = $request->input('rent');

        $item->business_id  = $request->input('business_id');
        $item->item_type_id = $request->input('item_type_id');

        $item->floor = $request->input('floor');
        $item->description = $request->input('description');
        $item->notes = $request->input('notes');

        $item->deposit = $request->input('deposit');
        $item->square_feet = $request->input('square_feet');
        $item->furnished = $request->input('furnished')=='on'?1:0;

        $item->luxury = $request->input('luxury')=='on'?1:0;
        $item->executive = $request->input('executive')=='on'?1:0;
        $item->den = $request->input('den')=='on'?1:0;
        $item->short_term = $request->input('short_term')=='on'?1:0;

        $item->availability = $request->input('availability');
        $item->reference_number = $request->input('reference_number');
        $item->bedrooms = $request->input('bedrooms');
        $item->bathrooms = $request->input('bathrooms');
        $item->featured = $request->input('featured');
        $item->active = $request->input('active');
        
        $item->save();
        $business = $item->business;
        return redirect()->route('item.home',$business)->with('success','Unit updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BusinessItem::find($id);
        $business = $item->business;
        DB::update('update business_items set active = 3 where id = ?',[$id]);
        return redirect()->route('item.home',compact('business'))
                        ->with('success','Unit deleted successfully');
    }
}
