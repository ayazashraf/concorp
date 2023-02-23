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
                            <h3><strong>Profile</strong></h3>                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Name:
                            </div>
                            <div class="col-sm-4 col-md-3">       
                                {{ Auth::user()->name }}
                            </div>
                            <div class="col-sm-4 col-md-3">       
                                <a href="{{ url('tenant/edit') }}">Edit</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Password:
                            </div>
                            <div class="col-sm-4 col-md-3">       
                                ********
                            </div>
                            <div class="col-sm-4 col-md-3">       
                                <a href="{{ url('password/reset') }}">change</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Email:
                            </div>
                            <div class="col-sm-4 col-md-7">       
                                {{ Auth::user()->email }}
                            </div>
                            <div class="col-sm-4 col-md-2">       
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Contact no:
                            </div>
                            <div class="col-sm-4 col-md-3">       
                                {{ Auth::user()->contact_no }} 
                            </div>
                            <div class="col-sm-4 col-md-2">       
                                <a href="{{ url('tenant/edit') }}">Edit</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Property:
                            </div>
                            <div class="col-sm-4 col-md-7">       
                                {{ Auth::user()->property->busuiness->name }}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Suit type:
                            </div>
                            <div class="col-sm-4 col-md-7">       
                            {{ Auth::user()->property->unit->type->type }}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Suit name/number:
                            </div>
                            <div class="col-sm-4 col-md-7">       
                            {{ Auth::user()->property->unit->name }}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3">       
                                Rent:
                            </div>
                            <div class="col-sm-4 col-md-7">       
                            ${{ Auth::user()->property->unit->rent }}
                            </div>                            
                        </div>
                    </div>            
            </div>
        </div>
    </div>
</div>    
@endsection