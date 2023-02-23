@extends('layouts.mainlayout')
@section('content')
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">HAVE SOME QUESTIONS?</h3>  
</div>
<div class="default-background">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-sm-3 col-md-4">
        <span class="material-icons white-color google-icon">
          phone
        </span>
        <span class="white-color icon-text">
          902-680-2540
        </span>
      </div>
      <div class="col-sm-3 col-md-4">
        <span class="material-icons white-color google-icon">
        room
        </span>
        <span class="white-color icon-text">
        628 Main St Wolfville, NS B0P1T0
        </span>
      </div>
      <div class="col-sm-3 col-md-4">
      <span class="material-icons white-color google-icon">
          mail
        </span>
        <span class="white-color icon-text">
          concorp@gmail.com
        </span>
      </div>    
    </div>    
  </div>
</div>
<div class="container">  
  <div class="row justify-content-center text-center mt-3">
    <div class="col-sm-12 col-md-4">
      <img class="img-responsive" src="{{asset('images/pages/contactus/contactus-small.jpg') }}">
    </div>
    <div class="col-sm-12 col-md-8">
      <div>
        <h3><strong>Contact Form</strong></h3>  
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
      <form  method="POST" action="{{ route('contact.submit') }}" class="needs-validation" novalidate>        
      @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Name</span>
            </div>
            <input type="text" class="form-control" name="name" id="name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>        
        <div class="input-group mb-3">
            <input type="tel" class="form-control" placeholder="Phone, Format: 902-680-2540" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" name="phone" required>            
            <div class="input-group-prepend">
                <span class="input-group-text">Phone: 902-680-2540</span>
            </div>            
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
            <textarea class="form-control" placeholder="Message" rows="5" id="message" name="message" required></textarea>     
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>       
        </div>  
        <input type="submit" class="btn btn-danger mt-3" value="Submit Button">
      </form>
    </div>
  </div>
</div>
@include('layouts.partials.appointment')

@endsection