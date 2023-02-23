@extends('layouts.mainlayout')
@section('content')
<!--
<header>
<div class="container-image no-gutters" style="">
  <img src="{{asset('images/pages/fullmanagement/fullmanagement-header.jpg') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">FULL MANAGEMENT<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">15-19% OF GROSS MONTHLY INCOME, WITH A $500 MINIMUM FEE. BILLED MONTHLY
    </div>        
</div>
</header>
-->
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">FULL MANAGEMENT</h3>  
</div>
<div class="container mt-3">
    <p>ALSO KNOWN AS "ALL INCLUSIVE" PROPERTY MANAGEMENT, IT IS IDEAL FOR INVESTORS THAT DON'T HAVE TIME TO LOOK AFTER EACH PROPERTY. THE COST IS 15-19% OF GROSS MONTHLY INCOME, WITH A $500 MINIMUM FEE. BILLED MONTHLY</p>
</div>
<div class="container mt-3">
    <h4>SERVICES INCLUDE</h4>
</div>
<div class="container mt-3">
    <h4>SERVICES INCLUDE</h4>
</div>
<div class="container mt-3">
    <ul>
        <li>COLLECTING RENT</li>
        <li>SHOWING AND SIGNING LEASES</li>
        <li>LOCK OUTS AND INQUIRIES</li>
        <li>SNOW REMOVAL</li>
        <li>LAWN MAINTENANCE</li>
        <li>GARBAGE REMOVAL</li>
        <li>MINOR REPAIRS</li>
        <li>EMERGENCY REPAIRS</li>
        <li>PLUMBING REPAIR</li>
    </ul>
</div>
@include('layouts.partials.appointment')

@endsection