@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/appliances/appliances-repair-headersmall.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">APPLIANCES REPAIR<span>
    </div>
    <div class="row justify-content-center centered2">
        <span  class="garbage-header-text2">24 HOURS APPLIANCES REPAIR SERVICES
    </div>        
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">APPLIANCES REPAIR SERVICES</h3>  
</div>

<div class="container mt-1">
    <div class="row justify-content-center">
        <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
    </div>
</div>
<div class="container">
    <div class="row mt-3 no-gutters align-items-center">
        <div class="col-sm-12 col-md-4 no-gutters">
            <img class="img-thumbnail img-fill-parent no-gutters p-0 m-0" src="{{ asset('images/pages/appliances/appliances-repair1.webp')}}" style="max-height: 200px;" />                                                                                 
        </div>
        <div class="col-sm-12 col-md-8 item-background no-gutters pt-4 pb-4">                                    
            <div class="ml-4">
                <h5><strong>COMPUTER APPLIANCES REPAIRING</strong></h5>
            </div>
            <div class="ml-4">
                <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
            </div>            
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3 no-gutters align-items-center">    
        <div class="col-sm-12 col-md-8 item-background no-gutters pt-4 pb-4">                                    
            <div class="ml-4">
                <h5><strong>COMPUTER APPLIANCES REPAIRING</strong></h5>
            </div>
            <div class="ml-4">
                <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
            </div>            
        </div>
        <div class="col-sm-12 col-md-4 no-gutters">
            <img class="img-thumbnail img-fill-parent no-gutters p-0 m-0" src="{{ asset('images/pages/appliances/appliances-repair2.webp')}}" style="max-height: 200px;" />                                                                                 
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3 no-gutters align-items-center">
        <div class="col-sm-12 col-md-4 no-gutters">
            <img class="img-thumbnail img-fill-parent no-gutters p-0 m-0" src="{{ asset('images/pages/appliances/appliances-repair3.webp')}}" style="max-height: 200px;" />                                                                                 
        </div>
        <div class="col-sm-12 col-md-8 item-background no-gutters pt-4 pb-4">                                    
            <div class="ml-4">
                <h5><strong>COMPUTER APPLIANCES REPAIRING</strong></h5>
            </div>
            <div class="ml-4">
                <p>Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</p>
            </div>            
        </div>
    </div>
</div>
@include('layouts.partials.appointment')

@endsection