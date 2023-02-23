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
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>        
            <div class="card card-user">
                    <div class="card-header card-header-user">
                            <h3><strong>Payments</strong></h3>  
                            <button type="button" onclick="window.location='{{ route("create.payment") }}'" class="btn btn-danger">Add New Payment</button>                                                      
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Payment Date</th>
                                <th>Payment proof</th>                                
                                               
                            </tr>
                            <tbody id="dataRecords">
                                @foreach ($payments as  $payment)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $payment->name }}</td>
                                    <td>{{ $payment->payment_date }}</td>                                                                      
                                    <td> <a href="{{ url('public/user/payments')}}{{ '/' . $payment->proof }}" download="{{ $payment->proof }}">
                                            <button class="btn btn-primary" style="width:100%"><i class="fas fa-download "></i> Download</button>
                                        </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                        {!! $payments->links() !!}
                    </div>            
            </div>
        </div>
    </div>
</div>    
@endsection