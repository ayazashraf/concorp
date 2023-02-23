<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Redirect,Response;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        
        $admins = Admin::latest()->paginate(5);
  
        if ($request->ajax()) {
            return datatables()::of($admins)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.admins.index',compact('admins'))->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8'
        ]);


  
        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $admin->password = $password;
        $admin->is_super = $request->input('is_super')=='on'?true:false;
        $admin->active = $request->input('active')=='on'?true:false;
        $admin->save();
        
        //Admin::create($request->all());
   
        return redirect()->route('admin.home')
                        ->with('success','Admin user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('Admin.admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('Admin.admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);
  
        $admin = Admin::find($admin->id);        
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        if(strlen($request->input('password'))>7)
        {
            $password = Hash::make($request->input('password'));
            $admin->password = $password;
        }                
        $admin->is_super = $request->input('is_super')=='on'?true:false;
        $admin->active = $request->input('active')=='on'?true:false;
        $admin->save();
        
        //$admin->update($request->all());
  
        return redirect()->route('admin.home')
                        ->with('success','Admin user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$admin->delete();
        DB::delete('delete from admins where id = ?',[$id]);
  
        return redirect()->route('admin.home')
                        ->with('success','Admin user deleted successfully');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $admins=DB::table('admins')->where('email','LIKE','%'.$request->search."%")
            ->orWhere('name','LIKE','%'.$request->search."%")
            ->get();

            if($admins)
            {
                foreach ($admins as $key => $admin) 
                {
                $output.='<tr>'.

                '<td>'.$admin->id.'</td>'.

                '<td>'.$admin->name.'</td>'.

                '<td>'.$admin->email.'</td>';

                if($admin->is_super)                     
                {
                    $output.='<td><i class="fas fa-check"></i></td>';
                }               
                else
                {
                    $output.='<td></td>';
                }            
                if($admin->active)                     
                {
                    $output.='<td><i class="fas fa-check"></i></td>';                    
                }
                else
                {
                    $output.='<td></td>';
                }
                $output .= '<td><form action="'.route('admins.destroy',$admin->id).'" method="GET"><input type="hidden" name="_token" value="'. csrf_token() .'">';                                
                $output .= '<a class="btn btn-info" href="'.route('admins.show',$admin->id).'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.route('admins.edit',$admin->id).'">Edit</a>';    
                $output .= ' <button type="submit" onclick="return confirm(\''."Are you sure?".'\')" class="btn btn-danger">Delete</button>';                    
                $output .= '</form></td>';
                $output .='</tr>';
                }
            return Response($output);
            }
        }
    }

}
