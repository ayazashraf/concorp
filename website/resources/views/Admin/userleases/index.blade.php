@extends('Admin.partials.super')

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-2">
            @include('Admin.partials.usersidebar')
        </div>
        <div class="col-sm-6 col-md-10">
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
                            <h3><strong>Digitally Signed leases</strong></h3>                            
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Lease</th>
                                <th>Signed By</th>                                                            
                            </tr>
                            <tbody id="dataRecords">
                                @foreach ($leases as  $lease)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $lease->title }}</td>
                                    <td>
                                        <a href="{{ url('public/user/leases')}}{{ '/' . $lease->file_name }}" download="{{$lease->file_name }}">
                                            <button class="btn btn-primary" style="width:100%"><i class="fas fa-download "></i> Download</button>
                                        </a>
                                    </td>
                                    <td>{{ $lease->signed_by }}</td>                                                                        
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                        {!! $leases->links() !!}
                    </div>            
            </div>

            
        </div>
    </div>

@endsection