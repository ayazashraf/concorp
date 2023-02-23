<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <!-- One of the primary actions on mobile is to call a business - This displays a phone button on mobile only -->
  <div class="navbar-toggler-right">
    <button class="navbar-toggler" type="button" onclick="togglemenu();">
                <span class="navbar-toggler-icon" id="btntoggle"></span>
            </button>            
  </div>
  <div class="collapse navbar-collapse flex-column" id="navbar">
    <ul class="navbar-nav  w-100 justify-content-left px-3">
      <li class="nav-item">
        <a class="navbar-brand mx-auto" href="{{ url('/') }}" class="max-logo">
            <img src="{{ asset('public/images/logofinal.webp') }}" style="max-height: 100px;">
         </a>       
      </li>      
      <li class="nav-item ml-auto mt-4">
        <div>
            @if(Auth::user())
              <ul>
                    <li class="nav-item dropdown" style="list-style-type: none;">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#ff0000;">
                          {{ Auth::user()->name }} <span class="caret"></span>                        
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ url('/tenant') }}">
                              Dashboard
                          </a>                          
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                    </li>
              </ul>
              
            @else            
            <a href="#" class="flag-red-color" @click="showModal">MEMBER LOGIN</a>
            <loginmodal
            v-show="isModalVisible"
            @close="closeModal"
            />
            @endif
        </div>
        <div class="mt-3 d-flex">
          <div class="row justify-content-center align-self-center">
            <span class="justify-content-center align-self-center">            
              <img src="{{ asset('public/images/icons/phone.webp') }}" style="max-height: 20px;">
            </span>
            <span class="justify-content-center align-self-center" style="padding-right:10px;">902-680-2540</span>
            <button type="button" name="book" id="book" onclick="window.location='{{ route("book.appiontment") }}'" class="btn btn-danger">BOOK APPOINTMENTS</button>
        </dvi>        
      </li>       
    </ul>

    <ul class="navbar-nav justify-content-left w-100 bg-dark px-3">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ url('/cities/wolfville') }}">FEATURES <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('blogs') }}">BLOG <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ url('/services') }}">SERVICES <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ url('/about') }}">ABOUT US <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ url('/contact') }}">CONTCT US <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ml-auto">
       
      </li> 
    </ul>
  </div>
</nav>