@extends('layouts.mainlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            @include('user')
        </div>
        <div class="col-sm-6 col-md-8">
            <div class="d-flex  justify-content-start mb-3">
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
                            <h3><strong>Add New Vehicle</strong></h3>                        
                    </div>

                    <div class="card-body">
                        <form  method="POST" action="{{ route('vehicle.submit') }}" class="needs-validation report-form-public" novalidate>
                            @csrf                           
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Car Type</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Car Type"  name="type" id="type" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>                            
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text">Color</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Color" id="color" name="color" required>                                
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text">License Plate</span>
                                </div>
                                <input type="text" class="form-control" placeholder="License Plate" id="license_plate" name="license_plate" required>        
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <input type="submit" class="btn btn-danger mt-3" value="Submit Button">
                        </form>
                    </div>            
            </div>
        </div>
    </div>
</div>    
@endsection