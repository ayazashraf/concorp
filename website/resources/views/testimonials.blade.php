@extends('layouts.mainlayout')
@section('content')
<header>
    <div class="container-image no-gutters">
        <img src="{{asset('public/images/pages/testimonials/testimonials.webp') }}" alt="Testimonials" style="width:100%;max-height:500px;object-fit:cover;">  
        <div class="row justify-content-center centered">
            <span class="garbage-header-text1">TESTIMONIALS<span>
        </div>  
    </div>
</header>

<!-- END Full Page Image Header with Vertically Centered Content -->
<div class="container mt-2">
    <div class="row justify-content-center">
    @foreach($testimonials as $key => $testimonial)
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header services-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><h5 class="card-title m-auto"><strong>{{$testimonial->name}}</strong></h5></div>
                        
                        <div>{{date('M-d-Y', strtotime($testimonial->date_recorded))}}</div>                        
                    </div>
                </div>   
                <div class="card-body services-card-body text-center">                                   
                    <p class="card-text mt-3">{{$testimonial->testimonial}}</p>                                                            
                </div>
                <div class="card-footer d-flex justify-content-center align-items-center">
                    <a class="btn btn-lg btn-dark pull-right" href="/rentals/{{str_replace(" ", "-", $testimonial->business->name)}}">SHOW PROPERTY</a>
                </div>
            </div>
        </div>                  
    @endforeach        
    </div>    
</div>

@endsection