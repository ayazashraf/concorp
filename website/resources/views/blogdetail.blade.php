@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{ asset('images/blogs'). '/'.$blog->featured_image }}" alt="{{ strlen($blog->featured_image)>0?$blog->image_caption:'' }}" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">{{$blog->title}}<span>
    </div>    
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container mt-1">
  <h3 class="home-page-h3">Summary</h3>  
</div>

<div class="container">
    <p>{{$blog->summary}}</p>    
</div>

<div class="container">
  <h3 class="home-page-h3">Content</h3>  
</div>

<div class="container">
    {!! $blog->content !!}    
</div>

@endsection