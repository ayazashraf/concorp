@extends('Admin.partials.super')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Testimonial</h2>
            </div>
            <div class="pull-right">    
                <a class="btn btn-primary" href="{{ route('testimonials.home') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('testimonials.update',$testimonial) }}" method="POST"  class="needs-validation" novalidate>
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>User:</strong>
                    <select name="user_id" id="user_id" class="custom-select" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @if($user->id == $testimonial->user_id)  selected="selected" @endif>{{ $user->name }}</option>                                        
                        @endforeach
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>                                         
                </div>                                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Property:</strong>
                    <select name="business_id" id="business_id" class="custom-select" required>
                        @foreach($businesses as $business)
                            <option value="{{ $business->id }}"  @if($business->id == $testimonial->reference_id)  selected="selected" @endif>{{ $business->name }}</option>                                        
                        @endforeach
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>                                         
                </div>                                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="form-group">
                    <strong>Date Recorded:</strong>
                    <input type="date" name="date_recorded" value="{{ date('Y-m-d', strtotime($testimonial->date_recorded)) }}" class="form-control" placeholder="Date Recorded" required>                    
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>            
            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <strong>Status:</strong>
                <select id="status" name="status" class="form-control">
                    <option value="1" @if($testimonial->status == 1)  selected="selected" @endif>Published</option>
                    <option value="2" @if($testimonial->status == 2)  selected="selected" @endif>Draft</option>                    
                    <option value="3" @if($testimonial->status == 3)  selected="selected" @endif>Hidden</option> 
                </select>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">                                    
                    <textarea  class="form-control" name="testimonial" id="testimonial" rows="3" style="width:100%;" placeholder="Testimonial" required>{{ $testimonial->testimonial}}</textarea>                    
                </div>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>                       
           
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>   
    </form>
</div>
@endsection