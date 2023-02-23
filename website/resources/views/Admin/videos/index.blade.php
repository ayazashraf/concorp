@extends('Admin.partials.super')
@section('content')
@include('Admin.partials.businesssidebar',['business' => $business])
    <div class="row">
        <div class="col-lg-6 margin-tb pull-right">            
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="blogsearch" name="blogsearch" placeholder="Write to search"></input>
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
            <th>Title</th>            
            <th>Description</th>           
            <th>Embeded Code</th>             
            <th>Action</th>            
        </tr>
        <tbody id="dataRecords">
        @foreach ($videos as $video)
            <tr>
                <td>{{ $video->title }}</td>                                
                <td>{{ $video->description }}</td>                      
                <td>{{ $video->embed_code }}</td>                                          
                <td>                
                    <form action="{{ route('video.destroy',$video->business->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('video.edit',$video->business->id) }}">Edit</a>       
                        @csrf
                        @method('GET')        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>  
    {!! $videos->links() !!}
    </div>
        <!-- END Right Column for Property edit inputs -->        
    </div>  
    <!--END Main Row -->
</div>
@endsection