@extends('layouts.mainlayout')
@section('content')
<!-- START Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <h1 class="font-weight-light banner-text-h1">DISCOVER YOUR NEW HOME</h1>
        <p class="lead banner-text-h3">Helping 100 million renters find their perfect fit.</p>        
      </div>
    </div>
  </div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->
<!-- START Management Services -->
<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">OUR MANAGEMENT SERVICES</h3>  
</div>
<div class="container d-flex">
  <div class="flex-fill">
    <div class="d-flex flex-column align-center">
      <div class="pt-2 "><img class="home-img-icon-size" src="{{ asset('public/images/home/manage1.webp') }}" style="max-width:80px;"/></div>
      <div class="pt-2"><h5>WOLFVILLE RENTAL PROPERTY SPECIALIST</h5></div>    
      <div class="pt-2"><P>24 hours maintenance and repair. We are passionate about our work.</p></div>
    </div>
  </div>
  <div class="pt-2 flex-fill align-center">
    <div class="pt-2"><img class="home-img-icon-size" src="{{ asset('public/images/home/manage2.webp') }}"/></div>
    <div class="pt-2"><h5>MANAGEMENT SERVICES</h5></div>
    <div class="pt-2"></div>
    <div class="pt-2"><P>24 hours maintenance and repair. We are passionate about our work.</p></div>
  </div>
  <div class="pt-2 flex-fill align-center">
    <div class="pt-2"><img  class="home-img-icon-size" src="{{ asset('public/images/home/manage3.webp') }}"/></div>
    <div class="pt-2"><h5>MEMBER PORTAL</h5></div>
    <div class="pt-2"></div>
    <div class="pt-2"><P>24 hours maintenance and repair. We are passionate about our work.</p></div>  
  </div>
</div>
<!-- END Management Services -->

<!-- START Find Property -->
<form action="{{ route('search.property') }}" method="POST">
@csrf
<div class="d-flex flex-column findproperty">  
  <div class="p-2 my-auto">    
    <div class="d-flex justify-content-center">    
      <div class="p-2 text-light">
        <h3>FIND YOUR PROPERTY</h3>  
      </div>      
    </div>
    <div class="d-flex">    
    
      <div class="p-2 flex-fill"></div>
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="location" name="location" placeholder="Find Your Location"></div>
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="budget" name="budget"  placeholder="Budget"></div>
      <div class="p-2 flex-fill"></div>
    </div>
    
    <div class="d-flex justify-content-center">          
      <div class="p-2 flex-fill"></div>
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="bedrooms" name="bedrooms" placeholder="Number of Bedrooms"></div>
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="bathrooms" name="bathrooms" placeholder="Number of Bathrooms"></div>
      <div class="p-2 flex-fill"></div>
    </div>
    
    
    <div class="d-flex justify-content-center">          
      <div class="p-2 flex-fill"></div>
      <div class="p-2 flex-fill ml-5">      
        <label class="switch">
            <input type="checkbox" id="parking" name="parking">
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Parking</span> 
        <label class="switch">
            <input type="checkbox" id="heater"  name="heater">
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Heat</span> 
        <label class="switch">
            <input type="checkbox" id="guest" name="guest">
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Guest Parking</span> 
        <label class="switch">
            <input type="checkbox" id="fridge" name="fridge">
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Fridge</span> 
        <label class="switch">        
            <input type="checkbox" id="stove" name="stove">
            <span class="slider round"></span>            
        </label>       
        <span style="color:white;">Stove</span>       
        <button class="btn btn-danger" name="search" id="search">Search</button>      
      </div>
      <div class="p-2 flex-fill"></div>
    </div>  
  </div>
</div>
</form>
<!-- END Find Property -->

<!-- START Featured Property -->
<div class="container">
  <div class="d-flex justify-content-center mt-5">
    <h3 class="home-page-h3">FEATURED PROPERTIES</h3>  
  </div>  
  @include('layouts.partials.item',compact('items'))  
</div>

<!-- START WHY CHOOSE US --> 
<div class="container">       
  <div class="d-flex justify-content-center mt-5">
    <h3 class="home-page-h3">WHY CHOOSE US</h3>  
  </div>
</div>
<div class="container mt-5">  
  <!-- START First Row -->     
  <div class="row">
    <div class="col-sm-2 col-md-1">
      <img src="{{ asset('public/images/icons/investment.webp') }}" rel="no-follow" />
    </div>
    <div class="col-sm-4 col-md-5">
      <div>
        <h5>WE VALUE YOUR INVESTMENT</h5>
      </div>      
      <div>
        <p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years.  170 happy tenants and growing all the time. <a href="#"> Read More</a></p>        
      </div>
    </div>

    

    <div class="col-sm-2 col-md-1">
        <img src="{{ asset('public/images/icons/investment.webp') }}" rel="no-follow" />
    </div>
    <div class="col-sm-4 col-md-5">
      <div>
        <h5>WE VALUE YOUR INVESTMENT</h5>
      </div>      
      <div>
        <p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years.  170 happy tenants and growing all the time. <a href="#"> Read More</a></p>        
      </div>
    </div>        
  </div>
  <!-- END First Row -->

   <!-- START SECOND Row -->     
   <div class="row mt-5">
    <div class="col-sm-2 col-md-1">
      <img src="{{ asset('public/images/icons/shakehands.webp') }}" rel="no-follow" />
    </div>
    <div class="col-sm-4 col-md-5">
      <div>
        <h5>WE VALUE YOUR INVESTMENT</h5>
      </div>      
      <div>
        <p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years.  170 happy tenants and growing all the time. <a href="#"> Read More</a></p>        
      </div>
    </div>

    

    <div class="col-sm-2 col-md-1">
        <img src="{{ asset('public/images/icons/shakehands.webp') }}" rel="no-follow" />
    </div>
    <div class="col-sm-4 col-md-5">
      <div>
        <h5>WE VALUE YOUR INVESTMENT</h5>
      </div>      
      <div>
        <p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years.  170 happy tenants and growing all the time. <a href="#"> Read More</a></p>        
      </div>
    </div>        
  </div>
  <!-- END SECOND Row -->

  <!-- START THIRD Row -->     
  <div class="row mt-5">
    <div class="col-sm-2 col-md-1">
      <img src="{{ asset('public/images/icons/home.webp') }}" rel="no-follow" />
    </div>
    <div class="col-sm-4 col-md-5">
      <div>
        <h5>WE VALUE YOUR INVESTMENT</h5>
      </div>      
      <div>
        <p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years.  170 happy tenants and growing all the time. <a href="#"> Read More</a></p>        
      </div>
    </div>

    

    <div class="col-sm-2 col-md-1">
        <img src="{{ asset('public/images/icons/home.webp') }}" rel="no-follow" />
    </div>
    <div class="col-sm-4 col-md-5">
      <div>
        <h5>WE VALUE YOUR INVESTMENT</h5>
      </div>      
      <div>
        <p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years.  170 happy tenants and growing all the time. <a href="#"> Read More</a></p>        
      </div>
    </div>        
  </div>
  <!-- END THIRD Row -->  
</div>
<!-- END WHY CHOOSE US --> 

<!-- START TESTIMONIALS --> 
<div class="container mb-4">       
  <div class="d-flex justify-content-center mt-5">
    <h3 class="home-page-h3"> TESTIMONIALS</h3>  
  </div>
</div>
<testimonials></testimonials>
<!-- END TESTIMONIALS --> 

<p class="float-right">
  <a href="#">Back to top</a>
</p>               
@endsection
