@extends('Admin.partials.super')
@section('content')
<div class="container mt-3">
       
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
    </div>
    <div class="d-flex justify-content-start mb-3">
        <div class="card card-user">
                    <div class="card-header card-header-user">
                    <p><a class="btn btn-primary" href="{{ route('admin.leases.home') }}"> Back</a></p> 
                            <h3><strong>Add New Property Lease</strong></h3>                        
                    </div>

                    <div class="card-body">
                        <form  method="POST" action="{{ route('admin.leases.store') }}" class="needs-validation report-form-public"  enctype="multipart/form-data" novalidate>
                            @csrf                           
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Document Title</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Document Title" name="title" id="title" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>                                                        
                            <div class="input-group mb-3">                                
                                <div class="input-group-append">
                                    <span class="input-group-text">Add Lease</span>
                                </div>
                                <input type="file" id="file_name" name="file_name" class="form-control" >             
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <input type="submit" class="btn btn-danger mt-3" value="Submit Button">
                        </form>
                    </div>            
            </div>    
</div>
@endsection