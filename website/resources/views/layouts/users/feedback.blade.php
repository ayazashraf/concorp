@extends('layouts.mainlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            @include('user')
        </div>
        <div class="col-sm-6 col-md-8">
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
            <div class="card card-user">
                    <div class="card-header card-header-user">
                            <h3><strong>Report Maintenance</strong></h3>                        
                    </div>

                    <div class="card-body">
                    <div class="container d-flex justify-content-center mt-3">
    <form method="POST" action="{{ route('feedback.submit') }}" class="needs-validation report-form-user" novalidate>
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
       
        <label for="description">Feedback:</label>
        <div class="input-group mb-3">
            <textarea class="form-control" placeholder="Write your Feedback" rows="5" id="feedback" name="feedback" required></textarea>     
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>       
        </div>     
        
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="cbauthorize" name="cbauthorize" required>
            <label class="custom-control-label" for="cbauthorize">For the purpose of completing the feedback process, I hereby authorize to enter publish my feedback on website or/and at other related sources.</label>
        </div>


        <input type="submit" class="btn btn-danger mt-3" value="Submit Button">
    </form>    
</div>

                    </div>            
            </div>
        </div>
    </div>
</div>    
@endsection