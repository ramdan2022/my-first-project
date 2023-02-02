<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fontawsome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
  </head>
  <body>
    
    @include('includs.main-navbar')
    <!-- custom img -->
    <img  class="d-block mw-100" src="{{ asset('imgs/banner.jpg') }}"  alt="no">

<div class="container">
  @yield('container')
</div>
<div class="container-fluid" >
  @yield('container-fluid')  
</div>
    

<!-- custom js -->
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>

