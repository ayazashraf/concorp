@extends('layouts.mainlayout')
@section('content')
<header>
<div class="container-image no-gutters">
  <img src="{{asset('images/pages/aboutus/aboutheader.jpg') }}" alt="Snow" style="width:100%;">  
    <div class="row justify-content-center centered">
        <span class="garbage-header-text1">CONCORP INC.<span>
    </div>    
</div>
</header>
<!-- END Full Page Image Header with Vertically Centered Content -->

<div class="container d-flex justify-content-center">
  <h3 class="home-page-h3">About Concorp Inc.</h3>  
</div>

<div class="container">
    <div class="row justify-content-center">
    <p>Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.Founded in 2006 by owner Jamie Conboy, the business has grown successfully for 10 consecutive years. 170 happy tenants and growing all the time.</p>
    </div>
</div>

<div class="container">
  <ul>
      <li>
          <a href="{{ route('faqs')}}">FAQs</a>
      </li>
  </ul>
</div>
@endsection