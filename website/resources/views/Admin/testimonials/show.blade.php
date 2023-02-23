@extends('Admin.partials.super')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Testimonial</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('testimonials.home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $testimonial->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Recorded:</strong>
                {{ $testimonial->date_recorded }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Added:</strong>
                {{ $testimonial->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">                                    
                <textarea  class="form-control" name="testimonial" id="testimonial" rows="3" style="width:100%;" placeholder="Testimonial">{{ $testimonial->testimonial}}</textarea>                    
            </div>           
        </div>    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                @if ($testimonial->status == 1)
                Published
                @elseif ($testimonial->status == 2)
                Draft
                @elseif ($testimonial->status == 3)
                Hidden
                @endif                
            </div>
        </div>        
    </div>
</div>
@endsection