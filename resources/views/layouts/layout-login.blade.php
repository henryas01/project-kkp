<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <link href="{{asset('tamplate/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">


  <!-- Styles -->
  <link href="{{asset('tamplate/css/sb-admin-2.min.css')}}" rel="stylesheet">
  @yield('css')

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->

    @if (!View::hasSection('content'))
    @include('layouts.components.content-login')
    @else
    @yield('content')
    @endif



  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('tamplate/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{asset('tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('tamplate/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('tamplate/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  @yield('scripts')

</body>

</html>