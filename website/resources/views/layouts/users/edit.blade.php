@extends('layouts.mainlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <p><a class="btn btn-primary" href="{{ route('tenant') }}"> Back</a></p> 
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
            <div class="card">
                <div class="card-header">{{ __('Edit Information') }}</div>

                <div class="card-body">
                                          
                        <form method="POST" action='{{ url("tenant/update") }}'>
                            @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_no" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ Auth::user()->contact_no }}" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
