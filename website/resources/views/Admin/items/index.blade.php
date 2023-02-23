@extends('Admin.partials.super')
@section('content')

@include('Admin.partials.businesssidebar',['business' => $business])
    <div class="row">
        <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ route('item.create',$business) }}"> Create New Unit</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <!--<input type="text" class="form-controller" id="itemsearch" name="itemsearch" placeholder="Write to search"></input> -->
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
            <th>Name / Number</th> 
            <th>Unit Type</th>                                               
            <th>Bathroom</th>            
            <th>Rent</th>           
            <th>Status</th>      
            <th>Action</th>            
        </tr>
        <tbody id="dataRecords">
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>                                                    
                <td>{{ $item->type->type }}</td>                                                
                <td>{{ $item->bathrooms }}</td>                                
                <td>${{ $item->rent }}</td>     
                <td>
                <select id="active" name="active" class="form-control">
                    <option value="1" @if($item->active == 1)  selected="selected" @endif >Published</option>
                    <option value="2" @if($item->active == 2)  selected="selected" @endif >Draft</option>
                    <option value="3" @if($item->active == 3)  selected="selected" @endif >Hidden</option>
                </select>
                </td>                           
                <td>                
                    <form action="{{ route('item.destroy',$item) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('item.edit',$item) }}">Edit</a>       
                        @csrf
                        @method('GET')        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>  
    {!! $items->links() !!}
 
    </div>
        <!-- END Right Column for Property edit inputs -->        
    </div>  
    <!--END Main Row -->
</div>
@endsection