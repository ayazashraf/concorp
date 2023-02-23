@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/repair-renovation/repair-reno-headersmall.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">REPAIR RENOVATION<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">WORKING WITH THE ENVIRONMENT
    </div>        
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">WELCOME TO THE CONCORP REPAIR RENOVATION</h3>  
</div>

<div class="container mt-5">
    <div class="row justify-content-center  mt-5">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-sm-12 col-md-4">
            <img src="{{asset('images/pages/repair-renovation/repair-reno3.webp') }}" alt="Snow" style="width:100%;min-height:380px;object-fit: cover;"> 
            <h5 class="mt-2"><strong>HOME RENOVATION</strong></h5> 
            <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy</p>
        </div>
        <div class="col-sm-12 col-md-4">
            <img src="{{asset('images/pages/repair-renovation/repair-reno1.webp') }}" alt="Snow" style="width:100%;min-height:380px;object-fit: cover;"> 
            <h5 class="mt-2"><strong>FURNITURE RENOVATION</strong></h5> 
            <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy</p>
        </div>
        <div class="col-sm-12 col-md-4">
            <img src="{{asset('images/pages/repair-renovation/repair-reno2.webp') }}" alt="Snow" style="width:100%;min-height:380px;object-fit: cover;"> 
            <h5 class="mt-2"><strong>VEHICLE RENOVATION</strong></h5> 
            <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy</p>
        </div>
    </div>
</div>

@include('layouts.partials.appointment')

@endsection