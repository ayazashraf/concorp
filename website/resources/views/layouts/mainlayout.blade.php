<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layouts.partials.head')

 </head>

 <body>

    <div id="app">
    @include('layouts.partials.nav2')

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')

    
    </div>
    @include('layouts.partials.footer-scripts')   
 </body>
 
</html>