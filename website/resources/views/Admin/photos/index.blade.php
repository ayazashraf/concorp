@extends('Admin.partials.super')
@section('content')
@include('Admin.partials.businesssidebar',['business' => $business])
    <div class="row">
        <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ route('photo.create',$business) }}">Add Photos</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            
        </div>        
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="row">
      <div class="col-lg-12 margin-tb">    
        
      </div>
   </div>   
    <table class="table table-bordered">
        <tr>                        
            <th>Photo</th>
            <th>Assign</th>            
            <th>Action</th>            
        </tr>
        <tbody id="dataRecords">
            
        @foreach ($photos as $photo)        
            <tr>                
                @if(strlen($photo->name)>0)                
                <td><img src="{{ url('images/photos/thumbnail').'/' .$photo->name }}" class="img-thumbnail" alt="" ></img></td>                
                @else                
                    <td><img src="#" alt=""></img></td>                
                @endif
                <td>                
                    <div>
                    Assign to {{ $business->name}}
                    <label class="switch">
                        <input type="checkbox" id="property_switch" onchange="togglePropertyPhotoSwitch({{$business->id}},{{$photo->id}},this)" 
                         {{$photo->business_photo == null ? '':'checked'}}>
                        <span class="slider round"></span>
                    </label>
                    </div>
                    @foreach ($business->items as $item)
                    <!-- Rounded switch -->
                    <div>
                    {{ $item->name. ' - '.$item->type->type . '( $'. $item->rent . ' )' }}

                    <label class="switch">
                        <input type="checkbox" onchange='toggleItemPhotoSwitch(this,{{$item->id}},{{$photo->id}})' 
                        @foreach($photo->item_photos as $assigned)
                            {{$assigned->item_id==$item->id?'checked':''}}
                        @endforeach
                        >
                        <span class="slider round"></span>
                    </label>
                    </div>
                    @endforeach      
                </td>                                
                <td>                
                    <form action="{{ route('photo.destroy', $photo) }}" method="POST">
                        @csrf
                        @method('GET')        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>  
    {!! $photos->links() !!}
    </div>
        <!-- END Right Column for Property edit inputs -->        
    </div>  
    <!--END Main Row -->
</div>
@endsection


