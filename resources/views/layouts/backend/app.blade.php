<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Styles for sb-admin-2 -->
   <link href="{{asset ('assets/backend/css/sb-admin-2.css') }}" rel="stylesheet">
   <link href="{{asset ('assets/backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
   <link href="{{asset('assets/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>
<div id="wrapper">
    @include('layouts.backend.partials.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('layouts.backend.partials.topbar')
        <div class="container-fluid">
           @yield('content')
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>
     </div>
    </div>
</div>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('assets/backend/js/validators.min.js')}}"></script>
<script src="{{asset('assets/backend/js/snbutton.js')}}"></script>

  <!-- js plugin online-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{!! Toastr::message() !!}


 @stack('js')

  <!-- Page level plugins -->

  <!-- Page level custom scripts -->
</body>
</html>
