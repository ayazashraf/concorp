@extends('layouts.mainlayout')
@section('content')
@php 
$businessImage = "";
@endphp
<div class="container">
    <div class="container d-flex justify-content-center mt-3">
        <h3 class="home-page-h3">{{ $bus->name }}</h3>  
    </div>
    
    <div id="businessphotos" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach ($bus->business_photos as $key => $photo)    
                @foreach ($photo->photos as $key2 => $ph)
                    @if($key2 == 0)
                        @php $businessImage = asset('public/images/photos').'/'.$ph->name ; @endphp
                    @endif
                    <li data-target="#businessphotos" data-slide-to="{{$key}}" @if($key == 0) class="active"  @endif  ></li>
                @endforeach
            @endforeach
        </ol>
        
        <!-- The slideshow -->
        <div class="carousel-inner">
            @foreach ($bus->business_photos as $key => $photo)    
                @foreach ($photo->photos as $key2 => $ph) 
                    <div class="carousel-item @if($key == 0)  active  @endif">
                        <img src="{{asset('public/images/photos').'/'.$ph->name }}" alt="Los Angeles" max-height="500">
                    </div>
                @endforeach    
            @endforeach    
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#businessphotos" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#businessphotos" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="container d-flex justify-content-center btn-dark" @click="showBookingModal">
        <h3 class="home-page-h3">BOOK NOW</h3>  
    </div>
    
    <div class="row mt-3">
        <div class="col-sm-12 col-md-6">
            
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#photos">PHOTOS</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#map">MAP</a>
            </li>
            @if(count($bus->videos)>0)
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#video">VIDEO</a>
            </li>
            @endif
        </ul>

         <!-- Tab panes -->
        <div class="tab-content">
            <div id="photos" class="tab-pane active" style="background-color:white;"><br>
                <div class="product-slider">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                         <!-- Indicators -->
                        <ol class="carousel-indicators">
                        @php $i = 0; @endphp
                        @foreach ($bus->items as $key => $item)                    
                            @if($key == 1)
                                @foreach ($item->photos as $key2 => $photo)                    
                                    @foreach ($photo->photos as $key3 => $ph)                  
                                        <li data-target="#carousel" data-slide-to="{{$i++}}" @if($key3 == 0) class="active"  @endif  ></li>                                                                                            
                                    @endforeach    
                                @endforeach    
                            @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @php $i = 1; @endphp
                            @foreach ($bus->items as $key => $item)                    
                                @if($key == 1)
                                @foreach ($item->photos as $key2 => $photo)                    
                                    @foreach ($photo->photos as $key3 => $ph)                  
                                      @if($i++==1)
                                        <div class="carousel-item active" style="background-color:white;"> 
                                            <img class="imagethumb" src="{{asset('public/images/photos').'/'.$ph->name }}" style="max-height:300px;width:100%;object-fit:cover;"></img> 
                                        </div>
                                      @else
                                        <div class="carousel-item"  style="background-color:white;"> 
                                            <img class="imagethumb" src="{{asset('public/images/photos').'/'.$ph->name }}" style="max-height:300px;width:100%;object-fit:cover;"></img> 
                                        </div>
                                      @endif                                                                                                
                                    @endforeach    
                                @endforeach   
                                @endif 
                            @endforeach 
                        </div>
                    </div>
                    <div class="clearfix">
                        <div id="thumbcarousel" class="carousel slide" data-interval="false">    
                            <div class="carousel-inner">
                                <div class="carousel-item item active" style="background-color:white;">                                    
                                    @php $i = 0; @endphp
                                    @foreach ($bus->items as $key => $item)                    
                                    @if($key == 1)
                                        @foreach ($item->photos as $key2 => $photo)                    
                                            @foreach ($photo->photos as $key3 => $ph)                  
                                                @if($i != 0 && $i % 4 ==0)
                                                    </div>
                                                    <div class="carousel-item item"  style="background-color:white;">
                                                    <div data-target="#carousel" data-slide-to="{{$i++}}" class="thumb"><img src="{{asset('public/images/photos/thumbnail').'/'.$ph->name }}" style="min-height:80px;max-height:80px;max-width:100px;object-fit:cover;"></img>                                             </div>
                                                @else                                                
                                                     <div data-target="#carousel" data-slide-to="{{$i++}}" class="thumb"><img src="{{asset('public/images/photos/thumbnail').'/'.$ph->name }}" style="min-height:80px;max-height:80px;max-width:100px;object-fit:cover;"></img>                                                 </div>
                                                @endif                                                                                                
                                            @endforeach    
                                        @endforeach   
                                        @endif 
                                    @endforeach                                         
                                </div>
                                <a href="#thumbcarousel" data-slide="prev" class="carousel-control-prev"><i class="fas fa-arrow-circle-left color-black"></i></a> 
                            <a href="#thumbcarousel" data-slide="next" class="carousel-control-next"><i class="fas fa-arrow-circle-right color-black"></i></a>                                                                                               
                            </div>                                
                        </div>
                    </div>
                </div>                
            </div>
            <div id="map" class="tab-pane fade"  style="background-color:white;"><br>
                {!! $bus->map_code !!}
            </div>
            <div id="video" class="tab-pane fade"  style="background-color:white;"><br>
                @if(count($bus->videos)>0)
                    {!! $bus->videos[0]->embed_code !!}
                @else
                    No Video Available
                @endif                  
            </div>
        </div>
</div>
<div class="col-sm-12 col-md-6">
            <div class="row d-flex">
                <h3>{{ $bus->name }} {{ $bus->city }}</h3>
            </div>
            <div class="row">
                {{ $bus->detail->description }}
            </div>            
        </div></div>

    <div class="row mt-3">
        <div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="col-sm-12">                   
                 
                </div>
            </div>                   
        </div>
        
    </div>
</div>
<div class="d-flex justify-content-center btn-dark  mt-4">
    <h3 class="home-page-h3 p-3 mt-3">SUITE TYPES & RATES</h3>
</div>
<div class="container mt-4">
    <div class="row no-gutters">
        <div class="col-sm-12 col-md-6 ">
            <div  class="text-center"><h5><strong>&#10004; BUILDING AMENITIES</strong></h5></div>
            <div>
                <ul class="building-amenities-ul">
                    @foreach ($bus->amenity as $key => $amen)        
                        @foreach ($amen->categories as $key2 => $type)
                        <li>{{$type->category}}</li>
                        @endforeach                        
                    @endforeach                    
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="text-center"><h5><strong>&#10004; INCLUDED UTILITIES</strong></h5></div>
            <div>
                <ul class="building-amenities-ul">
                  
                    @foreach($bus->utility->getAttributes() as $key => $value)

                        @switch($key)                        
                            @case("id")
                            @case("business_id")
                            @break
                            @case("parking_details")
                                @if(strlen($value)>0)
                                    <li>Parking {{$value}}</li>    
                                @endif
                            @break
                            @case("heat")                            
                            @case("water")                            
                            @case("electricity")
                            @case("pet_friendly")
                            @case("small_dogs_friendly")
                            @case("large_dogs_friendly")
                            @case("cat_friendly")
                            @case("no_pets_allowed")
                            @if((int)$value)
                                <li>{{$key}}</li>  
                            @endif
                            @break
                        @endswitch                        
                    
                    @endforeach                                           
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    @php 
        $left = 1;
    @endphp
    @foreach($bus->items as $key => $item)
        @if($left)
            @include('layouts.partials.itemleft',['item' => $item])
            @php $left = 0; @endphp 
        @else
            @include('layouts.partials.itemright',['item' => $item])
            @php $left = 1; @endphp 
        @endif        
        
    @endforeach
</div>
<div class="d-flex justify-content-center btn-dark  mt-4">
    <h3 class="home-page-h3 p-3 mt-3">NEARBY PROPERTIES</h3>
</div>
<div class="container mt-4">
    @include('layouts.partials.nearby',['business' => $bus])
</div>

<input type="hidden" value="{{$bus->id}}" id="business_id" name="business_id">

<!-- The Modal -->
<div id="propertyModal" class="modal modal-property">

  <!-- The Close Button -->
  <span class="close-property">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content modal-content-property" id="preview">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<div id="propertyPhotosModal" class="modal modal-bs">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content modal-content-bs">

    @php $i = 1; @endphp
    @foreach ($bus->items as $key => $item)                    
        @foreach ($item->photos as $key2 => $photo)                    
            @foreach ($photo->photos as $key3 => $ph)                                  
               <div class="mySlides">
                    <div class="numbertext">1 / 4</div>
                    <img src="{{asset('public/images/photos').'/'.$ph->name }}" style="width:100%;object-fit:cover;"></img> 
                </div>                
            @endforeach    
        @endforeach    
    @endforeach 
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>
     @php $i = 1; @endphp
    @foreach ($bus->items as $key => $item)                    
        @foreach ($item->photos as $key2 => $photo)                    
            @foreach ($photo->photos as $key3 => $ph)                                  
                <div class="column">
                    <img src="{{asset('public/images/photos/thumbnail').'/'.$ph->name }}" style="width:100%;object-fit:cover;"></img> 
                </div>               
            @endforeach    
        @endforeach    
    @endforeach 
   </div>
</div>
@endsection