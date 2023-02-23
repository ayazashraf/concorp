@extends('layouts.mainlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            @include('user')
        </div>
        <div class="col-sm-6 col-md-8">
        <div class="d-flex  justify-content-start mb-3">
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
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <div class="card card-user">
                    <div class="card-header card-header-user">
                            <h3><strong>Vehicle Details</strong></h3>   
                            <button type="button" onclick="window.location='{{ route("create.vehicle") }}'" class="btn btn-danger">Add New Vehicle</button>                                                                           
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Car Type</th>
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
</div>    
@endsection