@extends('layouts.mainlayout')
@section('content')
<div class="container">  
  <div class="row justify-content-center text-center mt-3">
    <div class="col-sm-12 col-md-6">
      <div>
        <h3><strong>Schedule Appointment</strong></h3>  
      </div>
      <div class="d-flex justify-content-center mb-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif    
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>        
      <form  method="POST" action="{{ route('appointment.submit') }}" class="needs-validation" novalidate>        
      @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Name</span>
            </div>
            <input type="text" class="form-control"  placeholder="Name"  name="name" id="name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Phone: 902-680-2540</span>
            </div>
            <input type="tel" class="form-control" placeholder="Phone, Format: 902-680-2540" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" name="phone" required>            
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div> 
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
            <div class="input-group-append">
                <span class="input-group-text">@example.com</span>
            </div>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div> 
        <div class="input-group mb-3">            
            <div class="input-group-prepend">
                <span class="input-group-text">Preferred Day</span>
            </div>
            <textarea class="form-control" placeholder="For Example: Monday to Friday OR Monday, Tuesday, Friday" rows="3" id="day" name="day" required></textarea>              
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>   
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Preferred Time</span>
            </div>
            <textarea class="form-control" placeholder="For Example: 13:00 to 14:00 OR after 14:00 to 21:00" rows="3" id="time" name="time" required></textarea>                 
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>   
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Message</span>
            </div>
            <textarea class="form-control" placeholder="Message" rows="5" id="message" name="message" required></textarea>     
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>       
        </div>  
        <input type="submit" id="submitAppointment" class="btn btn-danger mt-3" value="Submit Button">
      </form>
    </div>
  </div>
</div>
@endsection