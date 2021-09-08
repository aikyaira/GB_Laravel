<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@section('title') Новостной блог @show</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
  <!-- Custom icon font-->
  <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
  <!-- Google fonts - Open Sans-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <!-- Fancybox-->
  <link rel="stylesheet" href="{{ asset('vendor/@fancyapps/fancybox/jquery.fancybox.min.css') }}">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body>
  <header class="header">
    <!-- Main Navbar-->
    <x-navbar></x-navbar>
  </header>
  <img src="{{ asset('img/bg.jpg') }}" class="img-fluid" alt="...">
  <div class="container">
    <div class="row">

      @yield('content')

      <!-- Widget [Widget]-->
      @if (!isset($widget))<x-widget></x-widget> @endif

    </div>
  </div>
  <!-- Page Footer-->
  <footer class="main-footer">
    <div class="copyrights">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p>&copy; 2021. All rights reserved. Your great site.</p>
          </div>
          <div class="col-md-6 text-right">
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- JavaScript files-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
  <script src="{{ asset('vendor/@fancyapps/fancybox/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('js/front.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('.dropdown-toggle').click(function(){
        
        $('#dropdownMenu').slideToggle(300);      
        return false;
      });
    });
    </script>
    
</body>

</html>