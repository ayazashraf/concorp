<div class="row mt-3 no-gutters align-items-center">
    @foreach ($business->nearby as $key => $bus)                                       
        <div class="col-sm-12 col-md-4 no-gutters">    
            <div class="thumbnail">
                @foreach ($bus->near_business->business_photos as $key => $photo)                                                                                               
                    @if($key == 0)                            
                        @foreach ($photo->photos as $key2 => $ph)                                                    
                            @if($key2 == 0)                        
                                <a class="thumbnail" href="/rentals/{{str_replace(" ", "-", $bus->near_business->name)}}">                                    
                                    <i class="nearby-rent"><button type="button" class="btn btn-danger rent-button">${{$bus->near_business->items[0]->rent}}</button></i>
                                    <i class="nearby-distance"><button type="button" class="btn btn-danger">{{$bus->distance . ' '. $bus->distance_unit}}</button></i>
                                    <img class="img-thumbnail img-fill-parent" src="{{ asset('images/photos/thumbnail/')}}{{ '/'.$ph->name}}" />                                                                                
                                    <div class="bottom-left">{{$bus->near_business->name}}</div>                                    
                                </a>                            
                            @endif
                        @endforeach    
                    @endif                                                                           
                @endforeach                
            </div>
        </div>
    @endforeach                    
</div>