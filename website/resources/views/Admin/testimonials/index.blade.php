@extends('Admin.partials.super')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ url('admin/testimonials/create') }}"> Create New Testimonial</a>
        </div>        
        <!--
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="testimonialsearch" name="testimonialsearch" placeholder="Write to search"></input>
        </div>
        -->
        
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
            <th>No</th>
            <th>Name</th>
            <th>Property</th>
            <th>Date Recorded</th>            
            <th>Testimonial</th>            
            <th>Status</th>
            <th >Action</th>
        </tr>
        <tbody id="dataRecords">
            @foreach ($testimonials as $testimonial)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->business->name }}</td>
                <td>{{ $testimonial->date_recorded }}</td>            
                <td style="max-width:200px;">{{ $testimonial->testimonial }}</td>   
                <td>
                <select id="active" name="active" class="form-control">
                    <option value="1" @if($testimonial->status == 1)  selected="selected" @endif >Published</option>
                    <option value="2" @if($testimonial->status == 2)  selected="selected" @endif >Draft</option>
                    <option value="3" @if($testimonial->status == 3)  selected="selected" @endif >Hidden</option>
                </select>
                </td>
                <td>
                
                    <form action="{{ route('testimonials.destroy',$testimonial->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('testimonials.show',$testimonial->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('testimonials.edit',$testimonial->id) }}">Edit</a>       

                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $testimonials->links() !!}
</div>      
@endsection

