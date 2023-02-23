@extends('Admin.partials.super')
@section('content')
<div class="row justify-content-center">
        <div class="col-sm-6 col-md-2">
            @include('Admin.partials.Inquirysidebar')
        </div>
        <div class="col-sm-6 col-md-10">
         
            <div class="card card-user">
            <div class="card-header card-header-user">
            <a class="btn btn-primary" href="{{ route('admin.reports.home') }}" style="float:left;"> Back</a>
                <h3><strong>MAINTENANCE REPORTS - COMPLAINS</strong></h3>
            </div>
            <div class="card-body">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $report->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $report->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    {{ $report->phone }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    {{ $report->city }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Property:</strong>
                    {{ $report->business->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Unit:</strong>
                    {{ $report->unit    }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Service:</strong>
                    {{ $report->service }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tenant:</strong>
                    @if($report->user)
                        {{ $report->user->name}}
                    @else
                        Not Logged In
                    @endif
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Message Time:</strong>
                    {{ $report->created_at }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Complain:</strong>
                    <textarea rows="20" style="width: 100%;">{{ $report->complain }}</textarea>
                </div>
            </div>
            

        </div>
            </div>
        </div>
</div>
                    
    
</div>
@endsection