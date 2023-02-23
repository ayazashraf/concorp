<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Validator,Redirect,File;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use DB;
use Illuminate\Support\MessageBag;
use Newsletter;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\User;
use App\BusinessItem;
use App\Business;
use App\Inquiry;
use App\InquiryDetail;
use App\Blog;
use App\Subscription;

use Mail;
use Config;
use App\Mail\BookNow;
use App\Notifications\BookNowSubmitted;

use App\Notifications\SubscriberSubmit;

use App\Mail\BookAppointment;
use App\Notifications\ScheduleAppointmentSubmit;

use App\Mail\ReportMaintenance;
use App\Notifications\ReportMaintenanceSubmit;

use App\Mail\Contactus;
use App\Notifications\ContactSubmit;


use App\Appointment;
use App\Document;
use App\UserDocument;
use App\Report;
use App\Payment;
use App\Vehicle;
use App\Contact;
use Notification;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;

class DataController extends Controller
{
    use Notifiable;

    public function testmonials(Request $request)
    {        
       return response()->json([

        'testimonials' => Testimonial::where('status',1)->get()

        ], Response::HTTP_OK);
    }
    public function businessList(Request $request)
    {        
       return response()->json([

        'businesses' => Business::latest()->get()

        ], Response::HTTP_OK);
    }
    public function propertyList(Request $request)
    {               
        $items = BusinessItem::orderBy('name', 'desc')        
        ->get();
        $location = "";
        $bedrooms = "";
        $bathrooms = "";
        $budget = "";
        $parking = "";
        $heater = "";
        $stove = "";
        $fridge = "";
        $guest = "";
        return view('properties',compact('items','location','budget','bathrooms','bedrooms','parking','heater','stove','fridge','guest'));
    }
    public function testimonialsList(Request $request)
    {               
        $testimonials = Testimonial::where('status',1)->get();        
        return view('testimonials',compact('testimonials'));
    }
    public function blogsList(Request $request)
    {               
        $blogs = Blog::latest()->get();        
        return view('blogs',compact('blogs'));
    }
    public function feedback(Request $request)
    {               
        $businesses = Business::latest()->get();
        return view('layouts.users.feedback',compact('businesses'));
    }
    public function report(Request $request)
    {               
        $businesses = Business::latest()->get();
        return view('report',compact('businesses'));
    }
    public function bookappointment(Request $request)
    {               
        return view('appointment');
    }    
    public function submitappointment(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'            
        ]);

        $appoinment = new Appointment;
        $appoinment->name = $request->name;
        $appoinment->email = $request->email;
        $appoinment->phone = $request->phone;
        $appoinment->message = $request->message;                
        $appoinment->day = $request->day;
        $appoinment->time = $request->time;
        $appoinment->save();

        Mail::to($request->email)->send(new BookAppointment($appoinment));

        $when = now()->addMinutes(1);

        Notification::route('mail', "jamieconboy@gmail.com")
            ->notify((new ScheduleAppointmentSubmit($appoinment))->delay($when));    

        return redirect()->route('book.appiontment')
        ->with('success','Thank you for booking an appointment with us. One of our representative will contact you back if soon.');
    
    }
    public function submitcontact(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'            
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;                
        $contact->save();

        Mail::to($request->email)->send(new Contactus($contact));

        $when = now()->addMinutes(1);

        Notification::route('mail', "jamieconboy@gmail.com")     // Change this to jamieconboy@gmail.com so that Admin of website receive the Alert                
            ->notify((new ContactSubmit($contact))->delay($when));    


        return redirect()->route('contact')
        ->with('success','Thank you for contacting us. One of our representative will contact you back if required.');

    }        
    public function tenantdocument(Request $request)
    {               
        $user = Auth::user();
        $documents = UserDocument::where('user_id',$user->id)        
        ->paginate(5);
        $admindocuments = Document::where('status',1)->paginate(5);
        return view('layouts.users.documents',compact('documents','admindocuments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function tenantpayment(Request $request)
    {               
        $user = Auth::user();
        $payments = Payment::where('user_id',$user->id)->paginate(5);
        return view('layouts.users.payments',compact('payments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function tenantvehicle(Request $request)
    {               
        $user = Auth::user();
        $vehicles = Vehicle::where('user_id',$user->id)->paginate(5);
        return view('layouts.users.vehicle',compact('vehicles'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function createvehicle(Request $request)
    {                      
        return view('layouts.users.addvehicle');
    }
    public function createlease(Request $request)
    {                      
        return view('layouts.users.addlease');
    }
    public function createpayment(Request $request)
    {                      
        return view('layouts.users.addpayment');
    }
    public function submitvehicle(Request $request)
    {
        $this->validate(request(), [
            'type' => 'required',
            'color' => 'required',
            'license_plate' => 'required'            
        ]);

        $vehicle = new Vehicle;
        $vehicle->type = $request->type;
        $vehicle->color = $request->color;
        $vehicle->license_plate	 = $request->license_plate;
        if($user = Auth::user())
        {
            $vehicle->user_id = $user->id;        
        }                       
        $vehicle->save();

        return redirect()->route('vehicles')
        ->with('success','Vehicle added.');
    } 
    public function submitpayment(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'payment_date' => 'required',
            'file_name' => 'required'            
        ]);

        $payment = new Payment;
        $payment->name = $request->name;
        $payment->payment_date = $request->payment_date;
        
        if($request->has('file_name')) 
        {            
            $file_name = $request->file('file_name');
            $filename = time().$file_name->getClientOriginalName();                
            
            // save full size.
            $file_name->move(public_path('public/user/payments'), $filename);                
            $payment->proof = $filename;
        }        
        
        if($user = Auth::user())
        {
            $payment->user_id = $user->id;        
        }                       
        $payment->save();

        return redirect()->route('payments')
        ->with('success','Payment document added.');
    } 
    public function submitdocument(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'file_name' => 'required',
            'signed_by' => 'required'            
        ]);

        $document = new UserDocument;

        if($request->has('file_name')) 
        {            
            $file_name = $request->file('file_name');
            $filename = time().$file_name->getClientOriginalName();                
            
            // save full size.
            $file_name->move(public_path('public/user/leases'), $filename);                
            $document->file_name = $filename;
        }        
         
        
        $document->title = $request->title;
        $document->signed_by = $request->signed_by;
        if($user = Auth::user())
        {
            $document->user_id = $user->id;        
        }                       
        $document->save();

        return redirect()->route('documents')
        ->with('success','Payment document added.');
    } 
    public function tenantreport(Request $request)
    {               
        $businesses = Business::latest()->get();
        return view('layouts.users.report',compact('businesses'))->with('i', (request()->input('page', 1) - 1) * 5);
    }    
    public function submitfeedback(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',           
            'feedback' => 'required'
        ]);

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->testimonial = $request->feedback;
        $testimonial->reference_id  = $request->property;   
        $testimonial->status = 3;    
        if($user = Auth::user())
        {
            $testimonial->user_id = $user->id;        
        }                    
        $testimonial->save();

        /*
        $when = now()->addMinutes(1);

        Notification::route('mail', "jamieconboy@gmail.com")     // Change this to jamieconboy@gmail.com so that Admin of website receive the Alert                
            ->notify((new ReportMaintenanceSubmit($report))->delay($when));    
        */
        if($user = Auth::user())
        {
            return redirect()->route('feedback.write')
            ->with('success','Feedback submitted successfully. Thank you for your feedback.');
        }
        else
        {
            return redirect()->route('report')
            ->with('success','Feedback submitted successfully. Thank you for your feedback. ');
        }
    }
    public function submitreport(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'complain' => 'required'
        ]);

        $report = new Report;
        $report->name = $request->name;
        $report->email = $request->email;
        $report->unit = $request->unitnumber;        
        $report->phone = $request->phone;     
        $report->complain = $request->complain;        
        $report->business_id = $request->property;    
        if($user = Auth::user())
        {
            $report->user_id = $user->id;        
        }            
        $report->service = $request->category;     
        $report->save();

        Mail::to($request->email)->send(new ReportMaintenance($report));

        $when = now()->addMinutes(1);

        Notification::route('mail', "jamieconboy@gmail.com")     // Change this to jamieconboy@gmail.com so that Admin of website receive the Alert                
            ->notify((new ReportMaintenanceSubmit($report))->delay($when));    

        if($user = Auth::user())
        {
            return redirect()->route('tenant.report')
            ->with('success','Report submitted successfully. One of our representative will contact you back soon. ');
        }
        else
        {
            return redirect()->route('report')
            ->with('success','Report submitted successfully. One of our representative will contact you back soon. ');
        }
    }
    public function blogdetail(Request $request,Blog $blog)
    {               
       // $blog = Blog::find($blog->id)->get();        
        return view('blogdetail',compact('blog'));
    }
    public function rentals(Request $request,Business $business)
    {               
        $businessname =  $request->segment(count($request->segments()));
        $name = str_replace("-"," ",$businessname);
        
        $business = DB::select("select * from businesses where name =:name", ['name' => $name]);
        $bus = Business::find($business[0]->id);
                
        return view('propertydetail',compact('bus'));
    }
    public function searchproperty(Request $request)
    {   
        $stove = $request->stove;
        $fridge = $request->fridge;
        $location = $request->location;
        $bedrooms = "";
        $bathrooms = "";
        $budget = "";
        $parking = $request->parking;
        $heater = $request->heater;
        $guest = $request->guest;
        $fridge = $request->fridge;
        $stove = $request->stove;
        $where="";
        $bidwhere="";
        if(isset($request->bedrooms))
        {
            $bedrooms = $request->bedrooms;
            $matchThese['bedrooms'] = (int)$request->bedrooms;   
            $where = " business_items.bedrooms = ". (int)$request->bedrooms;
        }     
        
        if(isset($request->bathrooms))
        {
            $bathrooms = $request->bathrooms;
            $matchThese['bathrooms'] = (int)$request->bathrooms;   
            if(strlen($where)>0)
            {                
                $where .= " and business_items.bathrooms = ". (int)$request->bathrooms;
            }
            else
            {
                $where .= " business_items.bathrooms = ". (int)$request->bathrooms;
            }
        } 
        if(isset($request->budget))
        {
            $budget = $request->budget;
            $matchThese['rent'] = (int)$request->budget;   
            if(strlen($where)>0)
            {                
                $where .= " and business_items.rent <= ". (int)$request->budget;
            }
            else
            {
                $where .= " business_items.rent <= ". (int)$request->budget;
            }
        }             
        if(isset($request->location))
        {
            if(strlen($where)>0)
            {                
                $where .= " and (LOWER(b.name) like '%". strtolower($request->location)."%' or LOWER(b.city) like '%". strtolower($request->location)."%')";
            }
            else
            {
                $where .= " (LOWER(b.name) like '%". strtolower($request->location)."%' or LOWER(b.city) like '%". strtolower($request->location)."%')";
            }
        }
        if(isset($matchThese))
        {        
            $items = BusinessItem::where($matchThese)->orderBy('name', 'desc')->get();
        }
        else
        {
            $items = BusinessItem::orderBy('name', 'desc')->get();
        }
       
        if ($request->has('parking') && $request->has('guest')) {
            
            //$buswhere = " and bac.category IN ('Fridge') "; 
            $busparking =  DB::select("select  business_amenities.business_id
            from business_amenities
            left JOIN(
            SELECT id,category
            FROM business_amenity_categories
            where business_amenity_categories.category = 'Visitor parking'
            )temp ON business_amenities.category_id= temp.id
            
            left JOIN(
            SELECT id,category
            FROM business_amenity_categories
            where business_amenity_categories.category = 'Covered parking'
                or business_amenity_categories.category = 'Outdoor parking'
                or business_amenity_categories.category = 'Underground parking'
                limit 0,1
            )temp1 ON business_amenities.category_id= temp1.id
             where temp.id is not null or temp1.id is  not null
             group by business_id");
            
             $bus_ids = "";
             $numItems = count($busparking);
             $i = 0;
             foreach($busparking as $key=>$id)
             {
                 if(++$i === $numItems) {
                     $bus_ids .= $id->business_id;
                   }
                 else
                 {
                     $bus_ids .= $id->business_id. ",";
                 }                
             }
             if(strlen($where)>0)
             {
 
                 $where .=" and b.id IN (".$bus_ids.")";  
             }
             else
             {
                 $where .=" b.id IN (".$bus_ids.")";  
             }
        }
        else  if ($request->has('parking'))
        {
            if(strlen($where)>0)
            {

                $where .=" and (bac.category = 'Covered parking'
                or bac.category = 'Outdoor parking'
                or bac.category = 'Underground parking')";  
            }
            else
            {
                $where .=" (bac.category = 'Covered parking'
                or bac.category = 'Outdoor parking'
                or bac.category = 'Underground parking')";  
            }            
        }
        else  if ($request->has('guest'))
        {
            if(strlen($where)>0)
            {

                $where .=" and (bac.category = 'Visitor parking')";  
            }
            else
            {
                $where .=" bac.category = 'Visitor parking'";  
            }            
        }
        $itemwhere = "";
        if ($request->has('fridge') && $request->has('stove')) {        
            
           // $itemwhere = " and iac.category IN ('Fridge', 'Stove') ";      
            
            $busi = DB::select("select item_amenities.business_id
            from item_amenities
            left JOIN(
            SELECT id
            FROM item_amenity_categories
            where category = 'Fridge'
            )temp ON item_amenities.category_id= temp.id
            left JOIN(
            SELECT id
            FROM item_amenity_categories
            where category = 'Stove'
            )temp1 ON item_amenities.category_id= temp1.id
            where temp.id is not null or temp1.id is  not null
            group by business_id
            having count(business_id) > 1");
            $bus_ids = "";
            $numItems = count($busi);
            $i = 0;
            foreach($busi as $key=>$id)
            {
                if(++$i === $numItems) {
                    $bus_ids .= $id->business_id;
                  }
                else
                {
                    $bus_ids .= $id->business_id. ",";
                }                
            }
            if(strlen($where)>0)
            {

                $where .=" and b.id IN (".$bus_ids.")";  
            }
            else
            {
                $where .=" b.id IN (".$bus_ids.")";  
            }
            //$bidwhere =" and b.id IN (".$bus_ids.")";             
        }
        else if ($request->has('fridge')) {
            if(strlen($where)>0)
            {

                $where .=" and iac.category IN ('Fridge') ";
            }
            else
            {
                $where .=" iac.category IN ('Fridge') ";
            }
            //$itemwhere = " and iac.category IN ('Fridge') ";            
        } 
        else if ($request->has('stove')) {
            if(strlen($where)>0)
            {

                $where .=" and iac.category IN ('Stove') ";
            }
            else
            {
                $where .=" iac.category IN ('Stove') ";
            }
            //$itemwhere = " and iac.category IN ('Stove') ";            
        }

        if ($request->has('heater')) {
            if(strlen($where)>0)
            {
                $where .= " and bu.heat = 1";                
            }
            else
            {
                $where = " bu.heat = 1";
            }           
        }

        if ($request->has('guest')) {

            if(strlen($where)>0)
            {
                $where .= " and bac.category = 'Visitor parking'";                
            }
            else
            {
                $where = " bac.category = 'Visitor parking'";                
            }            
        }

        $sql = "SELECT business_items.id 
        FROM business_items 
        join businesses b on (b.id = business_items.business_id)
        left join item_amenities ia on ia.business_id = b.id
        left join item_amenity_categories iac on ( ia.category_id = iac.id)
        left join business_amenities ba on b.id = ba.business_id
        left join business_amenity_categories bac on ba.category_id = bac.id
        left join business_utilities bu on b.id = bu.business_id";
        if(strlen($where)>0)
        {
            $sql .=" where business_items.active = 1 and " .$where;         
        }      
        else
        {
        }
        $sql .= " group by business_items.id";
        $items2 = DB::select($sql);
        $idds = array();
        foreach($items2 as $i)
        {
            $idds[] = $i->id;
        }
        $items = BusinessItem::whereIn('id',$idds)->get();         
        return view('properties',compact('items','location','budget','bathrooms','bedrooms','parking','heater','stove','fridge','guest'));
    }    
    public function bookinginquiry(Request $request)
    {   
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'year' => 'required',
            'notes' => 'required'
        ]);

        $inquiry = new Inquiry;
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->year = $request->year;
        $inquiry->notes = $request->notes;
        $inquiry->business_id = $request->id;
        $inquiry->page_url = $request->page;
        $inquiry->save();
                
        if(isset($request->name1) && strlen($request->name1) > 0)
        {
            $det1 = new InquiryDetail;
            $det1->inquiry_id = $inquiry->id;
            $det1->name = $request->name1;
            $det1->email = $request->email1;
            $det1->year = $request->year1;
            $det1->save();
        }    

        if(isset($request->name2) && strlen($request->name2) > 0)
        {
            $det2 = new InquiryDetail;
            $det2->inquiry_id = $inquiry->id;
            $det2->name = $request->name2;
            $det2->email = $request->email2;
            $det2->year = $request->year2;
            $det2->save();
        }    

        if(isset($request->name3) && strlen($request->name3) > 0)
        {
            $det3 = new InquiryDetail;
            $det3->inquiry_id = $inquiry->id;
            $det3->name = $request->name3;
            $det3->email = $request->email3;
            $det3->year = $request->year3;
            $det3->save();
        }    

        
        if(isset($request->name4) && strlen($request->name4) > 0)
        {
            $det4 = new InquiryDetail;
            $det4->inquiry_id = $inquiry->id;
            $det4->name = $request->name4;
            $det4->email = $request->email4;
            $det4->year = $request->year4;
            $det4->save();
        }    

        if(isset($request->name5) && strlen($request->name5) > 0)
        {
            $det5 = new InquiryDetail;
            $det5->inquiry_id = $inquiry->id;
            $det5->name = $request->name5;
            $det5->email = $request->email5;
            $det5->year = $request->year5;
            $det5->save();
        }    

        $message = new MessageBag(['status' => 'success','message' => ['Thank you for your application, one of our representative will contact you soon.']]);                                        
        
        Mail::to($request->email)->send(new BookNow($inquiry));

        $when = now()->addMinutes(1);

        Notification::route('mail', "jamieconboy@gmail.com")     // Change this to jamieconboy@gmail.com so that Admin of website receive the Alert                
            ->notify((new BookNowSubmitted($inquiry))->delay($when));    

        return response()->json([
            $message
            ], Response::HTTP_OK);            
    }
    public function testmonialList(Request $request)
    {        
       return response()->json([

        'testimonials' => Testimonial::where('status',1)->get()

        ], Response::HTTP_OK);
    }
    public function index(Request $request)
    {     
    }
      
    public function login(Request $request) {
        $message = new MessageBag; // initiate MessageBag
        $credentials = [
            'email'     =>  $request->email,
            'password'  => $request->password
          ];
        
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password],  $request->remember)) 
        {
            $message = new MessageBag(['status' => 'success','message' => ['Login successful',Auth::user(),URL::previous()]]);                        
            //return redirect()->intended('/tenant');    
           // return redirect()->intended('/tenant');        
           
        }
        else
        {
            $message = new MessageBag(['status' => 'error','message' => ['Email and/or password invalid.']]);                        
            //return back()->withInput($request->only('email', 'remember'));
        }
                
        return response()->json([
            $message
            ], Response::HTTP_OK);            
    }
    public function profile(Request $request)
    {                
        return view('layouts.users.profile');
    }
    public function profile_edit(Request $request)
    {                
        return view('layouts.users.edit');
    }
    public function profile_update(Request $request)
    {                
        $this->validate(request(), [
            'name' => 'required',
            'contact_no' => 'required'
        ]);

        $user = User::find(Auth::user()->id);        
        $user->name = $request->name;
        $user->contact_no = $request->contact_no;          
        $user->save();

        Auth::user()->name = $request->name;
        Auth::user()->contact_no = $request->contact_no;
        Auth::user()->save();

        return redirect()->route('tenant')
                        ->with('success','Information updated successfully');
    }
    public function sendEmail(Request $request)
    {
      $users = DB::table('users')->distinct()->get();
      $data['title'] = "This is Test Mail Tuts Make";
      
      Mail::send('email', $data, function($message) {
             $message->to('ayaz@foreigntree.com', 'Foreign Tree')
                     ->subject('New Email ');
      });
 
        if (Mail::failures()) {
           //return response()->Fail('Sorry! Please try again latter');
         }else{
           //return response()->success('Great! Successfully send in your mail');
         }
    }
    public function subscription(Request $request)
    {

        $subscription = new Subscription;
        $subscription->email = $request->email;
        
        //Generate Verify code dynamically
        $verify_code =sha1(time());
        $subscription->verify_code = $verify_code;                
        
        $subscription->save();

        $when = now()->addMinutes(1);

        Notification::route('mail', "jamieconboy@gmail.com")     // Change this to jamieconboy@gmail.com so that Admin of website receive the Alert                
            ->notify((new SubscriberSubmit($subscription))->delay($when));    
        
        $message = new MessageBag(['status' => 'success','message' => ['Thank you for subscription.']]);                                        
                
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribe($request->email);            
        }

        return response()->json([
            $message    
            ], Response::HTTP_OK);
    }
}
   