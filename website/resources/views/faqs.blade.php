@extends('layouts.mainlayout')
@section('content')
<div class="container d-flex justify-content-center mt-5">
  <h3 class="home-page-h3">RENTAL FAQS</h3>  
</div>

<div class="container mt-5">
<button class="collapsible">How can I apply to get a rental house?</button>
<div class="content">
  <p>Simply fill our the Contact us form and our representative will contact you.</p>
</div>
<button class="collapsible">Do I need to find the friends?</button>
<div class="content">
  <p>Yes you need to apply as a group of friends.</p>
</div>
<button class="collapsible">What is $550 for a unit rent on website? </button>
<div class="content">
  <p>The rent $550, $500, $700, or any other figure is the rent for One Room that is if there is a property with 4 bedrooms then you need to be a group of Four friends and rent would be ($550 x 4 = $2200). </p>
</div>
</div>
@include('layouts.partials.appointment')



@endsection


