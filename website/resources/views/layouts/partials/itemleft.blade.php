<div class="row mt-3 no-gutters align-items-center">
    <div class="col-sm-12 col-md-4 no-gutters">
        <div id="carousel{{$item->id}}" class="carousel slide" data-ride="carousel">        
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @php $i = 0; @endphp
                @foreach ($item->photos as $key => $photo)                                                         
                        @foreach ($photo->photos as $key2 => $ph)                                                                        
                            <li data-target="#carousel{{$item->id}}" data-slide-to="{{$i++}}" @if($key2 == 0) class="active"  @endif  ></li>                                                                                            
                        @endforeach                           
                @endforeach        
            </ol>
            <div class="carousel-inner">
                @php $i = 1; @endphp     
                @foreach ($item->photos as $key => $photo)                                                          
                        @foreach ($photo->photos as $key2 => $ph)                                                                        
                            @if($i++==1)
                                <div class="carousel-item active" style="background-color:white;"> 
                                    <img class="img-thumbnail img-fill-parent no-gutters p-0 m-0 imagethumb" src="{{ asset('public/images/photos/thumbnail/')}}{{ '/'.$ph->name}}" style="max-height: 200px;" /> 
                                </div>
                                @else
                                <div class="carousel-item" style="background-color:white;"> 
                                    <img class="img-thumbnail img-fill-parent no-gutters p-0 m-0 imagethumb" src="{{ asset('public/images/photos/thumbnail/')}}{{ '/'.$ph->name}}" style="max-height: 200px;" /> 
                                </div>
                            @endif                                                                                                                           
                        @endforeach                                  
                @endforeach   
                <a href="#carousel{{$item->id}}" data-slide="prev" class="carousel-control-prev"><i class="fas fa-arrow-circle-left color-black"></i></a> 
                <a href="#carousel{{$item->id}}" data-slide="next" class="carousel-control-next"><i class="fas fa-arrow-circle-right color-black"></i></a>                 
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-8 item-background no-gutters pt-4 pb-4">                            
        <div class="row no-gutters">
            <div class="col-sm-6">
                <div class="text-center"><h5><strong>&#10004; SUITE AMENITIES</strong></h5></div>
                <div>
                    <ul class="building-amenities-ul">
                        @foreach ($item->business->itemamenity as $key => $amen)        
                            @foreach ($amen->categories as $key2 => $type)
                                <li>{{$type->category}}</li>
                            @endforeach                        
                        @endforeach                    
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-center"><h3><strong>{{ $item->bedrooms }} @if($item->bedrooms>1) BEDROOMS @else BEDROOM @endif</strong></h3></div>  
                <div class="text-center"><h5><strong>Number/Name: {{ $item->name }}</strong></h5></div>  
                <div class="text-center"><button class="btn btn-dark">${{ $item->rent }} / MO</div> 
            </div>            
        </div>
    </div>
</div>