@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/waste-sorting/waste-headersmall.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">WASTE SORTING<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">WORKING WITH THE ENVRIONMENT
    </div>        
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-2">
  <h3 class="home-page-h3">Welcome to the World of Recycling</h3>  
</div>

<div class="container">
    <div class="row justify-content-center">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-sm-12 col-md-4">
            <img src="{{asset('images/pages/waste-sorting/waste1.webp') }}" alt="Snow" style="width:100%;min-height:380px;object-fit: cover;"> 
            <h5 class="mt-2"><strong>Heading 1</strong></h5> 
            <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy</p>
        </div>
        <div class="col-sm-12 col-md-4">
            <img src="{{asset('images/pages/waste-sorting/waste2.webp') }}" alt="Snow" style="width:100%;min-height:380px;object-fit: cover;"> 
            <h5 class="mt-2"><strong>Heading 2</strong></h5> 
            <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy</p>
        </div>
        <div class="col-sm-12 col-md-4">
            <img src="{{asset('images/pages/waste-sorting/waste3.webp') }}" alt="Snow" style="width:100%;min-height:380px;object-fit: cover;"> 
            <h5 class="mt-2"><strong>Heading 3</strong></h5> 
            <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy</p>
        </div>
    </div>
</div>
@include('layouts.partials.appointment')

@endsection