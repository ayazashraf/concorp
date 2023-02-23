<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Redirect,Response;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Payment;
use App\UserDocument;
use App\Vehicle;
use App\UserProperty;
use App\BusinessItemType;
use App\BusinessItem;
use App\Business;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Image;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

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
        $users = User::latest()->paginate(10);
  
        if ($request->ajax()) {
            return datatables()::of($users)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }
    public function payments(Request $request,User $user)
    {
        $payments = Payment::where('user_id',$user->id)->paginate(10);
        return view('Admin.users.payments',compact('payments'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }

    public function leases(Request $request,User $user)
    {
        $leases = UserDocument::where('user_id',$user->id)->paginate(10);
        return view('Admin.users.leases',compact('leases'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }

    public function vehicles(Request $request,User $user)
    {
        $vehicles = Vehicle::where('user_id',$user->id)->paginate(10);
        return view('Admin.users.vehicles',compact('vehicles'))->with('i', (request()->input('page', 1) - 1) * 10);    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businesses = Business::get();        
        $business =  Business::find(1);
        $itemTypes = $business->items;
        return view('Admin.users.create',compact('businesses','business','itemTypes'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'contact_no' => 'required',
        ]);

        $user = new User;

        // If image is also added with Create Form.
        $image = $request->file('image');
        if($request->has('image') && isset($image)) 
        {            
            $image = $request->file('image');
            $filename = time().$image->getClientOriginalName();                
            
            // save full size.
            $image->move(public_path('images/users'), $filename);                
            
            // save thumbnail image using the full size image saved in above line of code.
            // Resize image using component "intervention".

            $destinationPath = public_path('images/users/thumbnail');                                
            $full_size_image_path =  public_path('images/users/').$filename;   
            $img = Image::make($full_size_image_path);
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);
                                        
            $user->photo = $filename;            
        }
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contact_no');        
        $user->user_type = 1;
        $password = Hash::make($request->input('password'));
        $user->password = $password;
        //$user->is_super = $request->input('is_super')=='on'?true:false;
        $user->active = $request->input('active')=='on'?true:false;
        $user->save();

        $user_property = new UserProperty;
        $user_property->property_id = $request->business_id;
        $user_property->item_id = $request->item_id;
        $user_property->user_id = $user->id;        
        $user_property->save();
        

        return redirect()->route('users.home')
                        ->with('success','Tenant user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $businesses = Business::get();
        $business =  Business::find(1);
        return view('Admin.users.edit',compact('user','businesses','business'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required'
        ]);
  
        $user = User::find($user->id);        

        
        // If image is also added with Create Form.
        $image = $request->file('image');
        
        if($request->has('image') && isset($image)) 
        {            
                     
            $image_path = public_path('images/users').'/'.$user->photo;
            if(strlen($user->photo)>0)
            {
                try {
                    if(stripos($user->photo,"img-male") || stripos($user->photo,"img-female"))
                    {
                        
                    }
                    else 
                    {
                        unlink($image_path);
                    }                    
                } catch (Exception $e) {
                    //report($e);                        
                }
                $image_path = public_path('images/users/thumbnail').'/'.$user->photo;
            
                try {
                    if(stripos($user->photo,"img-male") || stripos($user->photo,"img-female"))
                    {
                        
                    }
                    else 
                    {
                        unlink($image_path);
                    }                    
                } catch (Exception $e) {
                    //report($e);                        
                }
            }
             $image = $request->file('image');
             $filename = time().$image->getClientOriginalName();                
             
             // save full size.
             $image->move(public_path('images/users'), $filename);                
             
             // save thumbnail image using the full size image saved in above line of code.
             // Resize image using component "intervention".
 
             $destinationPath = public_path('images/users/thumbnail');                                
             $full_size_image_path =  public_path('images/users/').$filename;   
             $img = Image::make($full_size_image_path);
             $img->resize(300, 300, function ($constraint) {
                 $constraint->aspectRatio();
             })->save($destinationPath.'/'.$filename);
                                         
             $user->photo = $filename;              
        }
        else if($request->thumbImg == NULL)
        {
            $user->photo ="img-male.png";
        }        
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('contact_no');
        if(strlen($request->input('password'))>7)        
        {
            $password = Hash::make($request->input('password'));
            $user->password = $password;
        }                
        
        $user->user_type = 1;
        $user->active = $request->input('active')=='on'?true:false;
        $user->save();
        
        return;
        $user_property = UserProperty::where('user_id',$user->id)->first();
        $user_property->property_id = $request->business_id;
        $user_property->item_id = $request->item_id;
        $user_property->save();

       return redirect()->route('users.home')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::update('update user_properties set active = 0 where user_id = ?',[$id]);
        DB::update('update users set active = 0  where id = ?',[$id]);
        return redirect()->route('users.home')
                        ->with('success','User deleted successfully');
    }
    public function search(Request $request)
    {
        
        if($request->ajax())
        {
            $output="";
            $users=DB::table('users')->where('email','LIKE','%'.$request->search."%")
            ->orWhere('name','LIKE','%'.$request->search."%")
            ->get();

            if($users)
            {
                foreach ($users as $key => $user) 
                {
                $output.='<tr>'.

                '<td>'.$user->id.'</td>'.

                '<td>'.$user->name.'</td>'.

                '<td>'.$user->email.'</td>'.
                '<td>'.$user->contact_no.'</td>';
                if($user->active)                     
                {
                    $output.='<td><i class="fas fa-check"></i></td>';                    
                }
                else
                {
                    $output.='<td></td>';
                }

                $output .= '<td><a class="btn btn-primary" href="'. url('admin/users/payments')."/".$user->id . '">Payments</a></td>';
                
                $output .= '<td><a class="btn btn-primary" href="'. url('admin/users/leases')."/".$user->id . '">Leases</a></td>';
                $output .= '<td><a class="btn btn-primary" href="'. url('admin/users/vehicles')."/".$user->id .'">Vehicles</a></td>';

                

                $output .= '<td><form action="'.route('users.destroy',$user->id).'" method="GET"> <input type="hidden" name="_token" value="'. csrf_token() .'">';                                
                $output .= '<a class="btn btn-info" href="'.route('users.show',$user->id).'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.route('users.edit',$user->id).'">Edit</a>';    
                $output .= ' <button type="submit" onclick="return confirm(\''."Are you sure?".'\')" class="btn btn-danger">Delete</button>';                    
                $output .= '</form>';
                
                $output .= '<form action="'.route('users.reset',$user->id).'" method="PUT">
                            <input type="hidden" name="_token" value="'. csrf_token() .'">
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="email" value="'.$user->email.'">
                            <button class="btn btn-success" type="submit">Send Password Reset Email</button>
                            </form>';   
                
                $output .= '</td>';
                $output .='</tr>';
                }
            return Response($output);
            }
        }
    }
    public function sendResetEmail(Request $request)
    {
        $this->sendResetLinkEmail($request);
        return redirect()->route('users.home')
                        ->with('success','Email sent successfully');
    }
}
