@extends('Admin.partials.super')

@section('content')

    
        <div class="container">
        <div class="d-flex  justify-content-start">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif    
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>        
            <div class="card card-user">
                    <div class="card-header card-header-user">
                            <h3><strong>PROPERTY LEASES</strong></h3>                            
                            <div><a class="btn btn-success" href="{{ route('admin.leases.create') }}">Add new Lease</a></div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Lease</th>
                                <th>Uploaded By</th>                                                            
                                <th>Active</th>
                                <th width="280px">Action</th>
                            </tr>
                            <tbody id="dataRecords">
                                @foreach ($leases as  $lease)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $lease->title }}</td>
                                    <td>
                                        <a href="{{ url('public/documents/leases')}}{{ '/' . $lease->file_name }}" download="{{$lease->file_name }}">
                                            <button class="btn btn-primary" style="width:100%"><i class="fas fa-download "></i> Download</button>
                                        </a>
                                    </td>
                                    <td>{{ Auth::user()->name . ' -  Admin '  }}</td>  
                                    <td>
                                    @if($lease->status)                     
                                        <i class="fas fa-check"></i>            
                                    @else
                                        <span><h5>Removed</h5></span>            
                                    @endif
                                    </td>
                                    <td>
                                    
                                        <form action="{{ route('admin.leases.destroy',$lease->id) }}" method="POST">                                                                                       
                                            @csrf
                                            @method('GET')                            
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>                                                                      
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                        {!! $leases->links() !!}
                    </div>            
            </div>

            
        </div>


@endsection