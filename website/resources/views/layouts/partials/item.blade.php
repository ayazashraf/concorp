    @foreach ($items as $item)   
    @if($item->active == 1)    
        <!-- START Item Row -->
        <div class="row justify-content-center no-gutters">
            <!-- START Item Photos on left side column -->
            <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3 no-gutters">
                <div class="row  no-gutters">                   
                @foreach ($item->business->business_photos as $key => $photo)                                                                                               
                    @if($key == 0)                            
                        @foreach ($photo->photos as $key2 => $ph)                                                    
                            @if($key2 == 0)                        
                            <img class="img-thumbnail img-fill-parent" src="{{ asset('public/images/photos/thumbnail/')}}{{ '/'.$ph->name}}" />                                                                                
                            @endif
                        @endforeach    
                    @endif                                                                           
                    @endforeach                                
                </div>        
                <div class="row no-gutter">
                    <div class="col-sm-6">
                    @foreach ($item->photos as $key => $photo)                   
                        
                        @if($key == 0)
                        
                            @foreach ($photo->photos as $key2 => $ph)                
                                                
                                @if($key2 == 0)
                                
                                <img class="img-thumbnail img-fill-parent" src="{{ asset('public/images/photos/thumbnail/')}}{{ '/'.$ph->name}}" style="max-height: 97px;" />            
                                                                        
                                @endif
                            @endforeach            
                        @endif
                        
                    @endforeach                                                
                    </div>
                    <div class="col-sm-6">
                    @foreach ($item->photos as $key => $photo)                   
                        
                        @if($key == 1)
                        
                            @foreach ($photo->photos as $key2 => $ph)                
                                                
                                @if($key2 == 0)
                                
                                <img class="img-thumbnail img-fill-parent" src="{{ asset('public/images/photos/thumbnail/')}}{{ '/'.$ph->name}}" style="max-height: 97px;" />            
                                                                        
                                @endif
                            @endforeach            
                        @endif
                        
                    @endforeach    
                    </div>
                </div>        
            </div>
            <!-- END Item Photos on left side column -->

            <!-- START Item Detail on side column -->
            <div class="col-sm-12 col-md-7 col-lg-8 col-xl-7"  style="margin-left: -6px;margin-top: 2px;">
                <div id="parallelogram-container" class="d-flex">
                    <div class="my-auto parallelogram">
                        <span class="pl-3" style="color:white;font-size: 30px;">{{ $item->business->name }} </span><span style="color:white;font-size: 16px;">- Number/Name: {{ strtoupper($item->name) }} </strong></span>
                    </div>      
                </div>
                <div class="d-flex ml-5 pl-3">
                    <span style="font-size: 20px;"> {{ $item->business->name }} {{ $item->business->city }}</span>
                </div>
                <div class="d-flex ml-5">
                    <div class="p-2 flex-fill" style="max-width:50%;">
                        <img class=" img-fill-parent" src="{{ asset('public/images/home/bedroom.webp') }}" style="max-width:40px;" />
                        <span style="ml-5">bedrooms {{ $item->bedrooms }}</span>
                    </div>
                    <div class="p-2 flex-fill" style="max-width:50%;">
                        <img class=" img-fill-parent" src="{{ asset('public/images/home/bathroom.webp') }}" style="max-width:40px;" />
                        <span style="ml-5">Bathrooms {{ $item->bathrooms }}</span>
                    </div>
                </div>
                <div class="d-flex ml-5">
                <div class="p-2 flex-fill" style="max-width:50%;">
                        <img class=" img-fill-parent" src="{{ asset('public/images/home/heater.webp') }}" style="max-width:40px;" />
                        <span style="ml-5">
                            @php $available = false @endphp
                            
                            @if($item->business->utility->heat==1)
                                    @php $available = true @endphp
                            @endif                                                
                            
                            @if($available)
                                Heat Available
                            @else
                                Heat Not Available
                            @endif
                        </span>
                    </div>
                    <div class="p-2 flex-fill" style="max-width:50%;">
                        <img class=" img-fill-parent" src="{{ asset('public/images/home/parking.webp') }}" style="max-width:40px;" />
                        <span style="ml-5">
                            @php $available = false @endphp
                            @foreach ($item->business->amenity as $key => $amenity)      
                            @if($amenity->categories != null)
                                @if(
                                        $amenity->categories[0]->category=="Covered parking" ||
                                        $amenity->categories[0]->category=="Outdoor parking"  ||
                                        $amenity->categories[0]->category=="Underground parking" 
                                    )
                                        @php $available = true @endphp
                                @endif                           
                            @endif                     
                            @endforeach
                            @if($available)
                                Parking Available
                            @else
                                Parking Not Available
                            @endif                        
                        </span>
                    </div>
                </div>
                <div class="d-flex ml-5">
                    <div class="p-2 flex-fill" style="max-width:50%;">
                        <img class=" img-fill-parent" src="{{ asset('public/images/home/fridge.webp') }}" style="max-width:40px;" />
                        <span style="ml-5">
                            @php $available = false @endphp
                            @foreach ($item->amenity as $key => $amenity)      
                            @if($amenity->categories[0]->category=="Fridge")
                                    @php $available = true @endphp
                            @endif                                                
                            @endforeach
                            @if($available)
                                Fridge Available
                            @else
                                Fridge Not Available
                            @endif
                        </span>
                    </div>
                    <div class="p-2 flex-fill" style="max-width:50%;">
                        <i class="fas fa-dollar-sign" style="font-size:30px;width:40px;"></i>                    
                        <span style="ml-5">Rent  ${{ $item->rent }}</span>
                    </div>
                </div>
                <div class="d-flex ml-5 pl-2">
                    <div class="p-2 flex-fill">
                        <a href="/rentals/{{str_replace(" ", "-", $item->business->name)}}">Read More</a>
                    </div>            
                </div>
                
            </div>
            <!-- END Item Detail on side column -->
        </div>
        <!-- END Item Row -->    
    @endif
@endforeach