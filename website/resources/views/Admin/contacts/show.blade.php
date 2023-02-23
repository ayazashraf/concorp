@extends('Admin.partials.super')
@section('content')
<div class="row justify-content-center">
        <div class="col-sm-6 col-md-2">
            @include('Admin.partials.Inquirysidebar')
        </div>
        <div class="col-sm-6 col-md-10">
            <div class="card card-user">
                <div class="card-header card-header-user">
                <a class="btn btn-primary" href="{{ route('admin.contacts.home') }}" style="float:left;"> Back</a>
                    <h3><strong>Contact Form Inquiries</strong></h3>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $contact->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $contact->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        {{ $contact->phone }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Message Time:</strong>
                        {{ $contact->created_at }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Message:</strong>
                        <textarea rows="20" style="width: 100%;">{{ $contact->message }}</textarea>
                    </div>
                </div>
                

            </div>
            </div>
        </div>
    </div>   
    
</div>
@endsection