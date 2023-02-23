@extends('Admin.partials.super')

@section('content')
<div class="">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ route('business.create') }}"> Create New Property</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="businesssearch" name="businesssearch" placeholder="Write to search"  style="display:none;"></input>
        </div>        
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @php 
    $i = 1;
    @endphp
   <div class="row">
      <div class="col-lg-12 margin-tb">    
        
      </div>
   </div>   
    <table class="table table-bordered">
        <tr>            
            <th>#</th>
            <th>Property Name</th>
            <th>Property Type</th>
            <th>Address</th>
            <th>City</th>            
            <th>Photos</th>            
            <th>Units</th>
            <th>Videos</th>            
            <th>Status</th>                        
            <th >Action</th>
        </tr>
        <tbody id="dataRecords">
            @foreach ($businesses as $bus)
            <tr>                
                <td>{{ $i++ }}</td>
                <td>{{ $bus->name }}</td>  
                <td>{{ $bus->type->type }}</td>                
                <td>{{ $bus->street_number . ' '. $bus->street_name }}</td>            
                <td>{{ $bus->city }}</td> 
                @if(count($bus->business_photos)>0)                                
                    <td><a href="{{ route('photo.home',$bus->id) }}">{{ count($bus->business_photos) }}</a></td>
                @else                
                    <td>0</img></td>                
                @endif
                @if(count($bus->items)>0)                                
                    <td><a href="{{ route('item.home',$bus->id) }}">{{ count($bus->items) }}</a></td>
                @else                
                    <td>0</img></td>                
                @endif
                @if(count($bus->videos)>0)                                
                    <td><a href="{{ route('video.home',$bus->id) }}">{{ count($bus->videos) }}</a></td>
                @else                
                    <td>0</img></td>                
                @endif                                
                <td>
                <select id="active" name="active" class="form-control">
                    <option value="1" @if($bus->active == 1)  selected="selected" @endif >Published</option>
                    <option value="2" @if($bus->active == 2)  selected="selected" @endif >Draft</option>
                    <option value="3" @if($bus->active == 3)  selected="selected" @endif >Hidden</option>
                </select>
                </td>
                <td>
                
                    <form action="{{ route('business.destroy',$bus->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('business.edit',$bus->id) }}">Edit</a>       

                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $businesses->links() !!}
</div>      
@endsection

