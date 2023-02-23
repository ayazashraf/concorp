<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layouts.partials.head')

 </head>

 <body>


    @include('layouts.partials.nav')   

    @yield('content')

    @include('layouts.partials.footer')

    

 </body>
 @include('layouts.partials.footer-scripts')
</html>