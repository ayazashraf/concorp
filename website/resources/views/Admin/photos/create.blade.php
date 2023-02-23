@extends('Admin.partials.super')
@section('content')
<div class="container mt-3">
    <h2>Add Photos</h2>
    <p><a class="btn btn-primary" href="{{ route('photo.home',$business) }}"> Back</a></p> 
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
    <div class="d-flex justify-content-start mb-3">
    <form action="{{ route('photo.store',$business) }}" method="POST" enctype="multipart/form-data">
        @csrf        
        {{csrf_field()}}

        <div class="input-group control-group increment" >
          <input type="file" name="filename[]" class="form-control" multiple>          
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
    </form>
</div>
@endsection