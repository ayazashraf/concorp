@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/pest/pest-headersmall.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">PEST MANAGEMENT<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">HELPS TO REMOVE ANY UNWANTED PESTS FROM YOUR LOCATION
    </div>        
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-2">
  <h3 class="home-page-h3">PEST MANAGEMENT SERVICES</h3>  
</div>

<div class="container mt-1">
    <div class="row justify-content-center">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>

<div class="container d-flex justify-content-center mt-1">
  <div class="col-sm-12 col-md-4">
    <img src="{{asset('images/pages/pest/pest1.webp') }}" alt="Snow" style="width:100%;">  
  </div>
  <div class="col-sm-12 col-md-4">
    <img src="{{asset('images/pages/pest/pest2.webp') }}" alt="Snow" style="width:100%;">  
  </div>
  <div class="col-sm-12 col-md-4">
    <img src="{{asset('images/pages/pest/pest3.webp') }}" alt="Snow" style="width:100%;object-fit: cover;height: 100%;">  
  </div>
</div>

@include('layouts.partials.appointment')

<div class="container d-flex justify-content-center mt-1">
  <div class="col-sm-12 col-md-4">  
        <div class="card">        
            <div class="card-body services-card-body text-center">               
                <img class="card-img-top" src="http://localhost:8000/images/pages/pest/pest4.webp" alt="Card image" style="max-height: 100px;max-width:100px">
                <h5><strong>Small Machine</strong></h5>
                <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>                                
            </div>
        </div>        
  </div>
  <div class="col-sm-12 col-md-4">
    <div class="card">        
        <div class="card-body services-card-body text-center">               
            <img class="card-img-top" src="http://localhost:8000/images/pages/pest/pest5.webp" alt="Card image" style="max-height: 100px;max-width:100px">
            <h5><strong>Snow Plow</strong></h5>
            <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>                
        </div>
    </div>       
  </div>
  <div class="col-sm-12 col-md-4">
    <div class="card">        
        <div class="card-body services-card-body text-center">               
            <img class="card-img-top" src="http://localhost:8000/images/pages/pest/pest6.webp" alt="Card image" style="max-height: 100px;max-width:100px">
            <h5><strong>Truck</strong></h5>
            <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>                
        </div>
    </div> 
   </div>  
</div>

@endsection