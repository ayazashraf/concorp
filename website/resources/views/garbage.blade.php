@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/garbage/garbages.jpg') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">TRASH-GRASS-SNOW<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">$400 AND UP PER MONTH DEPENDING ON SIZE AND REQUIREMENTS
    </div>        
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">Professionalism, Intgrity and Dedication</h3>  
</div>

<div class="container mt-5">

    <div class="row justify-content-center  mt-5">
        <ul>
            <li>THESE 3 TASKS ARE OFTEN OVERLOOKED AND SHOULD NOT BE NEGLECTED.</li>
            <li>EXCELLENT CHOICE FOR OWNERS THAT WANT TO LOOK AFTER THEIR OWN TENANTS</li>
            <li>$400 AND UP PER MONTH DEPENDING ON SIZE AND REQUIREMENTS</li>
            <li>WE TAKE CARE OF YOUR GARBAGE, GRASS AND SNOW REMOVAL</li>
        </ul>            
    </div>

    <div class="row mt-5">
        <div class="col-sm-6 col-md-4">
            <img rel="no-follow" class="full-width" src="{{ asset('images/pages/garbage/garbage-trash.jpg') }}" />
        </div>
        <div class="col-sm-6 col-md-8">
            <div><h4>Trash</h4></div>
            <div><p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.</p></div>
        </div>    
    </div>

    <div class="row mt-5">
        <div class="col-sm-6 col-md-8">
            <div><h4>Grass</h4></div>
            <div><p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.</p></div>
        </div>    
        <div class="col-sm-6 col-md-4">
            <img rel="no-follow" class="full-width" src="{{ asset('images/pages/garbage/garbage-grass.jpg') }}" />
        </div>    
    </div>

    <div class="row mt-5">
        <div class="col-sm-6 col-md-4">
            <img rel="no-follow" class="full-width" src="{{ asset('images/pages/garbage/garbage-snow.jpg') }}" />
        </div>
        <div class="col-sm-6 col-md-8">
            <div><h4>Snow</h4></div>
            <div><p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.</p></div>
        </div>    
    </div>    
</div>

<div class="container-image  mt-5 no-gutters">
  <img src="{{asset('images/bookappointment.jpg') }}" alt="Snow" style="width:100%;">
  <div class="centered">
    <div class="row justify-content-center ">
        <span class="head1">BOOK APPOINTMENTS<span>
    </div>
    <div class="row justify-content-center ">
        <span  class="head2">At Concorp you can book an appointment within no time and one of our representative contacts you.<span>
    </div>      
  </div>  
</div>


<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">CONCORP</h3>  
</div>

<div class="container mt-5">
<div><p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.</p></div>
</div>
@endsection
