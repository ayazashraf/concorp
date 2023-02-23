@extends('layouts.mainlayout')
@section('content')
<div class="container d-flex justify-content-center mt-5">
  <h3 class="home-page-h3">FIND YOUR PROPERTY</h3>  
</div>
                                 
            
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
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="location" name="location" placeholder="Find Your Location" value="{{ $location }}"></div>
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="budget" name="budget"  placeholder="Budget" value="{{ $budget }}"></div>
      <div class="p-2 flex-fill"></div>
    </div>
    
    <div class="d-flex justify-content-center">          
      <div class="p-2 flex-fill"></div>
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="bedrooms" name="bedrooms" placeholder="Number of Bedrooms" value="{{ $bedrooms }}"></div>
      <div class="p-2 flex-fill"><input type="text" class="form-control" id="bathrooms" name="bathrooms" placeholder="Number of Bathrooms" value="{{ $bathrooms }}"></div>
      <div class="p-2 flex-fill"></div>
    </div>
    
    <div class="d-flex justify-content-center">          
      <div class="p-2 flex-fill"></div>
      <div class="p-2 flex-fill ml-5">      
        <label class="switch">
            <input type="checkbox" id="parking" name="parking" @if($parking==="on") checked @endif>
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Parking</span> 
        <label class="switch">
            <input type="checkbox" id="heater"  name="heater"  @if($heater==="on") checked @endif>
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Heat</span> 
        <label class="switch">
            <input type="checkbox" id="guest" name="guest"  @if($guest==="on") checked @endif>
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Guest Parking</span> 
        <label class="switch">
            <input type="checkbox" id="fridge" name="fridge"  @if($fridge==="on") checked @endif>
            <span class="slider round"></span>
        </label>
        <span style="color:white;">Fridge</span> 
        <label class="switch">        
            <input type="checkbox" id="stove" name="stove"  @if($stove==="on") checked @endif>
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
<div class="container mt-4">  
   @include('layouts.partials.item',compact('items','location'))    
</div>

@endsection
