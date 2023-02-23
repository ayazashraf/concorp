@extends('layouts.mainlayout')
@section('content')

<div class="container">
  <h3 class="home-page-h3">Report Maintenance Issue</h3>  
</div>
<div class="container h-divider">
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
<div class="container d-flex justify-content-center mt-3">
    <form  method="POST" action="{{ route('report.submit') }}" class="needs-validation report-form-public" novalidate>
    @csrf
        <label for="name">Write your name here:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Name</span>
            </div>
            <input type="text" class="form-control" name="name" id="name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <label for="email">Write your email here:</label>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
            <div class="input-group-append">
                <span class="input-group-text">@example.com</span>
            </div>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>         
        <label for="name">Write your working phone number here:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Phone: 902-680-2540</span>
            </div>
            <input type="tel" class="form-control" placeholder="Phone, Format: 902-680-2540" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" name="phone" required>            
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <label for="city"> City:</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="city" name="city">
                <option value="Wolfville">Wolfville</option>                                              
            </select>
        </div>       
        <label for="property">Select Property:</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="property" name="property">
            @foreach ($businesses as $key => $bus)                   
                <option value="{{$bus->id}}">{{$bus->name}}</option>    
                @endforeach                   
            </select> 
        </div>
        <label for="unitnumber">Write Unit Number:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Unit Number</span>
            </div>
            <input type="text" class="form-control" name="unitnumber" id="unitnumber" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <label for="category">Service Category:</label>
        <div class="input-group mb-3">
            <select class="custom-select" id="category"  name="category">
                <option value="Electrical">Electrical</option>
                <option value="Heating">Heating</option>
                <option value="Plumbing">Plumbing</option>
                <option value="Appliances">Appliances</option>
                <option value="Security">Security</option>
                <option value="Other">Other</option>                                              
            </select>
        </div>        

        <label for="description">Complain:</label>
        <div class="input-group mb-3">
            <textarea class="form-control" placeholder="Write your Complain" rows="5" id="complain" name="complain" required></textarea>     
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>       
        </div>     
        
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="cbauthorize" name="cbauthorize" required>
            <label class="custom-control-label" for="cbauthorize">For the purpose of completing the specified work, I hereby authorize maintenance to enter my unit in my absence.</label>
        </div>


        <input type="submit" class="btn btn-danger mt-3" value="Submit Button">
    </form>    
</div>

@endsection