@extends('Admin.partials.super')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-6 col-md-2">
        @include('Admin.partials.Inquirysidebar')
        @php $i = 0; @endphp
    </div>
    <div class="col-sm-6 col-md-10">
        <div class="card card-user">
            <div class="card-header card-header-user">
            <a class="btn btn-primary" href="{{ route('admin.inquiries.home') }}" style="float:left;"> Back</a>
                <h3><strong>Rental Application Inquiry</strong></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $inquiry->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $inquiry->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>University Year:</strong>
                            {{ $inquiry->year }}
                        </div>
                    </div>         
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Message Time:</strong>
                            {{ $inquiry->created_at }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Message:</strong>
                            <textarea rows="5" style="width: 100%;">{{ $inquiry->notes }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Other Tenants Info::</strong>                            
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>University Year</th>                                                                                                                   
                                </tr>
                                <tbody id="dataRecords">
                                    @foreach ($inquiry->detail as  $inq)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $inq->name }}</td>
                                        <td>{{ $inq->email }}</td>
                                        <td>{{ $inq->year }}</td>                                                                            
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>     
                        </div>
                    </div>        
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection