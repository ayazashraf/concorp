@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/garbage/garbages.jpg') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">MANAGEMENT SERVICES<span>
    </div>    
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">MANAGEMENT SERVICES</h3>  
</div>
<div class="container d-flexmt-3">
  <div class="row">
    <ul>
        <li>
            <a href="/management-services/full-management">Full Management</a>
        </li>
        <li>
            <a href="/management-services/snow-removal">Snow Removal</a>
        </li>
        <li>
            <a href="/management-services/pest-management">Pest Management</a>
        </li>
        <li>
            <a href="/management-services/repair-renovation">Repair Renovation</a>
        </li>
        <li>
            <a href="/management-services/appliances-repair">Appliances Repair</a>
        </li>
        <li>
            <a href="/management-services/garbage-grass-snow">Grabage Grass Snow</a>
        </li>
        <li>
            <a href="/management-services/ice-control">Ice Control</a>
        </li>
        <li>
            <a href="/residents/valley-waste-sorting-guides">Waste Sorting</a>
        </li>
        <li>
            <a href="/residents/leases">Leases</a>
        </li>
    </ul>
  </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center  mt-5">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>
@include('layouts.partials.appointment')

@endsection