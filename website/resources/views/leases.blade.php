@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/leasaes/leases-header.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">LEASESS<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">GET THE LEASE OF HOUSE OR COTTAGE AS VACANTION PROPERTY - REAL ESTATE RENTAL
    </div>        
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">BEST LEASE DEALS</h3>  
</div>

<div class="container mt-1">
    <div class="row justify-content-center">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>

<div class="container-image no-gutters">
    <img src="{{asset('images/pages/leasaes/leases1small.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-right leases-contact">
        <button class="btn btn-danger" onclick="window.location='{{ route("contact") }}'" >CLICK HERE</button>
    </div> 
</div>

<div class="container d-flex justify-content-center mt-2">
  <h3 class="home-page-h3">Why Lease deposit?</h3>  
</div>

<div class="container mt-1">
    <div class="row justify-content-center">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>

@include('layouts.partials.appointment')

<div class="d-flex justify-content-center btn-dark  mt-2">
    <h3 class="home-page-h3 p-3 mt-1">NEARBY PROPERTIES</h3>
</div>
<div class="container mt-2">
    @php 
        $bus = App\Business::find(1);          
    @endphp
    @include('layouts.partials.nearby',['business' => $bus])
</div>
@endsection