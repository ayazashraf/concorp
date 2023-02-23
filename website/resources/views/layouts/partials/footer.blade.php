<footer class="py-4 footer text-black-50">
  <div class="container">
    <div class="row text-left">
      <div class="col-sm-4 col-md-2">
        <div  class="mt-3">
          <a href="/">Home</a>
        </div>  
        <div  class="mt-3">
          <a href="{{ url('/cities/wolfville') }}">Features</a>
        </div>  
        <div class="mt-3">
          <a href="{{ route('blogs') }}">BLOG</a>
        </div>
        <div  class="mt-3">
          <a href="/services">Services</a>
        </div>  
        <div  class="mt-3">
          <a href="/about">About Us</a>
        </div>  
        <div  class="mt-3">
          <a href="/contact">Contact Us</a>
        </div>  
      </div>
      <div class="col-sm-2  col-md-1"></div>
      <div class="col-sm-4 col-md-3">
        <div class="mt-3">
          @if($user = Auth::user())        
          <a href="{{ route('tenant.report') }}">Report Maintenance Issue</a>
          @else
          <a href="{{ route('report') }}">Report Maintenance Issue</a>
          @endif
        </div>  
        <div  class="mt-3">
          <a href="/management-services/ice-control">Ice control</a>
        </div>  
        <div  class="mt-3">
          <a href="/management-services/snow-removal">Snow Removal</a>
        </div>  
        <div  class="mt-3">
          <a href="/management-services/garbage-grass-snow">Garbage Snow</a>
        </div>  
        <div  class="mt-3">
          <a href="{{route('waste.sorting')}}">Waste Sorting</a>
        </div>  
        <div  class="mt-3">
          <a href="/residents/leases">Leases</a>
        </div> 
        <div  class="mt-3">
          <a href="{{ route('testimonials') }}">Testimonials</a>
        </div>  
      </div>
      <div class="col-sm-2 col-md-1"></div>
      <div class="col-sm-12 col-md-5">
        <div class="mt-2">
            <h4>Sign up to our newsletter</h4>
        </div>
        <div class="mt-2">
            <p class = "text-justify">We respect your privacy. We will never share your email address.</p>            
        </div>
        <div class="row mt-2 no-gutters">         
          <div class="input-group">            
            <input type="text" class="form-control" name="newsletteremail" id="newsletteremail" placeholder="Enter your Email">  
            <span class="input-group-btn">
                  <button class="btn btn-dark" type="button" name="subscribeBtn" id="subscribeBtn" style="margin-top:2px;">SUBSCRIBE</button>              
            </span>
          </div>             
        </div>
        <div class="mt-2">
          <a href="#" class="fab fa-facebook-square"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-twitter-square"></a>    
        </div>
      </div>          
    </div>
    <div class="row justify-content-center">
      <small>Copyright &copy; 2020 CONCORP Inc.</small>        
    </div>           
  </div>  
</footer>
<input type="hidden" value="{{url('/')}}" id="url" name="url">
<input type="hidden" value="{{ url()->full() }}" id="page_url" name="page_url">
<bookingmodal
v-show="isBookingVisible"
            @close="closeBookingModal"
></bookingmodal>
