<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use DB;
use Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $leases = Document::latest()->paginate(10);
        return view('Admin.leases.index',compact('leases'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.leases.create');
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
            'title' => 'required',
            'file_name' => 'required'
        ]);

        $document = new Document;
        
        if($request->has('file_name')) 
        {            
            $file_name = $request->file('file_name');
            $filename = time().$file_name->getClientOriginalName();                
            
            // save full size.
            $file_name->move(public_path('documents/leases'), $filename);                
            $document->file_name = $filename;
        }        
         
        
        $document->title = $request->title;        
        if($user = Auth::user())
        {
            $document->admin_id = $user->id;        
        }                       
        $document->save();
        
        return redirect()->route('admin.leases.home')
                        ->with('success','New Lease added successfully.');
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
    public function destroy($id)
    {
        DB::delete('update documents set status = ? where id = ?',[0,$id]);
  
        return redirect()->route('admin.leases.home')
                        ->with('success','Lease deleted successfully');
    }
}
