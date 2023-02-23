@extends('Admin.partials.super')

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-2">
            @include('Admin.partials.usersidebar',$user)
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
                            <h3><strong>VEHICLES</strong></h3>                            
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Type</th>
                                <th>Color</th>
                                <th>License Plate</th>                                                            
                            </tr>
                            <tbody id="dataRecords">
                                @foreach ($vehicles as  $vehicle)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $vehicle->type }}</td>
                                    <td>{{ $vehicle->color }}</td>
                                    <td>{{ $vehicle->license_plate }}</td>                                                                        
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                        {!! $vehicles->links() !!}
                    </div>            
            </div>

            
        </div>
    </div>

@endsection