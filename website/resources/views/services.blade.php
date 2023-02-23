@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/services/services-banner-small.webp') }}" alt="Services" style="width:100%;max-height:500px;object-fit:cover;">  
    <div class="row justify-content-center centered">
        
    </div>    
</div>
</header>

<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center mt-3">
  <h3 class="home-page-h3">SERVICES</h3>  
</div>

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-header services-card-header d-flex"><h5 class="card-title m-auto"><strong>LEASES</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/leases.webp" alt="Leases" style="width: 80px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('leases')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-header services-card-header d-flex"><h5 class="card-title m-auto"><strong>GARBAGE</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/garbage.webp" alt="Card image" style="width: 80px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('garbage')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">            
            <div class="card">
                <div class="card-header services-card-header d-flex"><h5 class="card-title m-auto"><strong>SNOW REMOVAL</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/snow-removal.webp" alt="Card image" style="width: 137px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('snow.removal')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="card">
            <div class="card-header services-card-header d-flex"><h5 class="card-title m-auto"><strong>ICE CONTROL</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/ice-control.webp" alt="Card image" style="width: 108px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('ice.control')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>    
        </div>        
    </div>
    <div class="row justify-content-center  mt-5">
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-header services-card-header d-flex"><h5 class="card-title m-auto"><strong>WASTE SORTING</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/waste-sorting.webp" alt="Leases" style="width: 80px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('waste.sorting')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card">
                <div class="card-header services-card-header align-center"><h5 class="card-title m-auto"><strong>REPAIR RENOVATION</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/repair-renovation.webp" alt="Card image" style="width: 80px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('repair.renovation')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">            
            <div class="card">
                <div class="card-header services-card-header d-flex"><h5 class="card-title m-auto"><strong>PEST MANAGEMENT</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/pest-management.webp" alt="Card image" style="width: 137px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('pest.management')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="card">
            <div class="card-header services-card-header align-center"><h5 class="card-title m-auto"><strong>APPLIANCES REPAIR</strong></h5></div>   
                <div class="card-body services-card-body text-center">               
                    <img class="card-img-top" src="http://localhost:8000/images/pages/services/appliances-repair.webp" alt="Card image" style="width: 108px;height: 82px;">
                    <p class="card-text mt-3">Dummy text dummy text dummy text dummy text</p>
                    <a href="{{ route('appliances.repair')}}" class="btn btn-danger">Read More</a>
                </div>
            </div>    
        </div>        
    </div>
</div>

@endsection