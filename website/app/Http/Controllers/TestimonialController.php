<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\User;
use App\Business;
use Illuminate\Http\Request;
use Redirect;
use Symfony\Component\HttpFoundation\Response;
use DB;
use Illuminate\Support\Facades\Hash;

class TestimonialController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::latest()->paginate(5);
  
        if ($request->ajax()) {
            return datatables()::of($testimonials)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.testimonials.index',compact('testimonials'))->with('i', (request()->input('page', 1) - 1) * 5);    
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::latest()->get();
        $businesses = Business::latest()->get();
        return view('Admin.testimonials.create',compact('users','businesses'));
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
            'testimonial' => 'required',
            'date_recorded' => 'required'
        ]);

        $testimonial = new Testimonial;
        $testimonial->name = $request->input('name');
        $testimonial->testimonial = $request->input('testimonial');
        $testimonial->date_recorded = $request->input('date_recorded');
        $testimonial->status = $request->input('status');
        $testimonial->user_id = $request->user_id;
        $testimonial->reference_id = $request->business_id;
        $testimonial->save();

        return redirect()->route('testimonials.home')
                        ->with('success','Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('Admin.testimonials.show',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $users = User::latest()->get();
        $businesses = Business::latest()->get();        
        return view('Admin.testimonials.edit',compact('testimonial','users','businesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
       $this->validate(request(), [
            'name' => 'required',
            'testimonial' => 'required',
            'date_recorded' => 'required'
        ]);

        $testimonial = Testimonial::find($testimonial->id);        
        $testimonial->name = $request->input('name');
        $testimonial->testimonial = $request->input('testimonial');
        $testimonial->date_recorded = $request->input('date_recorded');
        $testimonial->status = $request->input('status');   
        $testimonial->reference_id = $request->business_id;     
        $testimonial->user_id = $request->user_id;
        $testimonial->update();
        
        return redirect()->route('testimonials.home')
                        ->with('success','Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from testimonials where id = ?',[$id]);
        return redirect()->route('testimonials.home')
                        ->with('success','Testimonial deleted successfully');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $testimonials=DB::table('testimonials')->where('email','LIKE','%'.$request->search."%")
            ->orWhere('name','LIKE','%'.$request->search."%")
            ->get();

            if($testimonials)
            {
                foreach ($testimonials as $key => $testimonial) 
                {
                $output.='<tr>'.

                '<td>'.$testimonial->id.'</td>'.

                '<td>'.$testimonial->name.'</td>'.

                '<td>'.$testimonial->email.'</td>';

                if($testimonial->active)                     
                {
                    $output.='<td><i class="fas fa-check"></i></td>';                    
                }
                else
                {
                    $output.='<td></td>';
                }
                $output .= '<td><form action="'.url('testimonials/destroy')."/".$testimonial->id.'" method="GET">';                                
                $output .= '<a class="btn btn-info" href="'.url('testimonials/show').'/'.$testimonial->id.'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.url('testimonials/edit').'/'.$testimonial->id.'">Edit</a>';    
                $output .= ' <button type="submit" onclick="return confirm(\''."Are you sure?".'\')" class="btn btn-danger">Delete</button>';                    
                $output .= '</form></td>';
                $output .='</tr>';
                }
            return Response($output);
            }
        }
    }
}
