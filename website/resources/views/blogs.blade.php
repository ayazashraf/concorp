@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/blog/blog-headersmall.webp') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">BLOG<span>
    </div>    
</div>
</header>
<div class="container mt-3">
  <div class="row">
    @foreach($blogs as $key => $blog)
        @if($key==1)            
            
        @endif            
        @include('layouts.partials.blog',['blog' => $blog])
    @endforeach
  </div>
</div>
@endsection