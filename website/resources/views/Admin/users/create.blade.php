@extends('Admin.partials.super')
@section('content')
<div class="container mt-3">
    <h2>Add New Tenant User</h2>
    <p><a class="btn btn-primary" href="{{ url('admin/users') }}"> Back</a></p> 
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
    <form action="{{ route('users.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact numbers:(Comma separated)</strong>
                    <input type="text" name="contact_no" class="form-control" placeholder="9026802540,xxxxxxxxxx" value="{{ old('contact_no') }}">
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password" value="{{ old('password') }}">                     
                </div>
            </div>   
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Property:</strong>
                    <select name="business_id" id="business_id" class="custom-select" required>
                        @foreach($businesses as $bus)                                            
                            <option value="{{ $bus->id }}" @if (old('business_id') == $bus->id) selected="selected" @endif  >{{ $bus->name }}</option>                                        
                        @endforeach
                    <select>          
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>                          
                </div>
            </div>   

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Unit:</strong>
                    <select name="item_id" id="item_id" class="custom-select" required>
                        @foreach($itemTypes as $item)                                            
                            <option value="{{ $item->id }}" @if (old('item_id') == $item->id) selected="selected" @endif >{{ $item->type->type .' - $'. $item->rent . ' - Name/Number: ' . $item->name }} </option>                                        
                        @endforeach
                    <select>                                    
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>    
                               
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Photo:</strong>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">                    
                </div>
            </div>                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Preview:</strong>
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="" alt="">
                    <i class="fas fa-trash-alt" id="remove_user_image" onclick="removeuserimage(0)"></i>
                </div>
            </div>    
            <div class="form-group col-xs-12 col-sm-12 col-md-12">                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="active" id="active">
                    <label class="form-check-label" for="active">
                        {{ __('Active') }}
                    </label>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>
</div>
@endsection