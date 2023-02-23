@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/snow-removal/snow-header-500small.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">SNOW REMOVAL<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">$20 - $50 DEPENDING ON SIZE AND LOCATION
    </div>        
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-1">
  <h3 class="home-page-h3">Professionalism, Integrity and Dedication</h3>  
</div>

<div class="container mt-1">
    <div class="row justify-content-center">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>

<div class="container d-flex justify-content-center mt-1">
  <div class="col-sm-12 col-md-4">
    <img src="{{asset('images/pages/snow-removal/snow1small.webp') }}" alt="Snow" style="width:100%;">  
  </div>
  <div class="col-sm-12 col-md-4">
    <img src="{{asset('images/pages/snow-removal/snow2small.webp') }}" alt="Snow" style="width:100%;">  
  </div>
  <div class="col-sm-12 col-md-4">
    <img src="{{asset('images/pages/snow-removal/snow3small.webp') }}" alt="Snow" style="width:100%;object-fit: cover;height: 100%;">  
  </div>
</div>
@include('layouts.partials.appointment')

<div class="container d-flex justify-content-center mt-1">
  <div class="col-sm-12 col-md-4">  
        <div class="card">        
            <div class="card-body services-card-body text-center">               
                <img class="card-img-top" src="http://localhost:8000/images/pages/snow-removal/snow4.webp" alt="Card image" style="max-height: 100px;max-width:100px">
                <h5><strong>Small Machine</strong></h5>
                <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>                                
            </div>
        </div>        
  </div>
  <div class="col-sm-12 col-md-4">
    <div class="card">        
        <div class="card-body services-card-body text-center">               
            <img class="card-img-top" src="http://localhost:8000/images/pages/snow-removal/snow5.webp" alt="Card image" style="max-height: 100px;max-width:100px">
            <h5><strong>Snow Plow</strong></h5>
            <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>                
        </div>
    </div>       
  </div>
  <div class="col-sm-12 col-md-4">
    <div class="card">        
        <div class="card-body services-card-body text-center">               
            <img class="card-img-top" src="http://localhost:8000/images/pages/snow-removal/snow6.webp" alt="Card image" style="max-height: 100px;max-width:100px">
            <h5><strong>Truck</strong></h5>
            <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>                
        </div>
    </div> 
   </div>  
</div>

@endsection