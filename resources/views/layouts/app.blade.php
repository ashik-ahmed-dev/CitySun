@php
    $general = json_decode(settings('general'), true);
@endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--favicon icon-->
    <link rel="icon" href="{{ asset(get_path('favicon.png')) }}" type="image/png">
    <!--title-->
    <title>{{ $general['site_title'] }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/toastr/ext-component-toastr.min.css') }}">
    <!--build:css-->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- endbuild -->
    <script src="{{ asset('js/vendors/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/vendors/popper.min.js') }}"></script>
    <script src="{{ asset('js/vendors/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
<!--preloader start-->
<div id="preloader">
    <div class="preloader-wrap">
        <img src="{{ asset(get_path('logo.png')) }}" alt="logo" class="img-fluid" />
    </div>
</div>
<!--preloader end-->
<!--header section start-->
@include('layouts.header')
<!--header section end-->

<div class="main">
    @yield('content')
</div>

<!--footer section start-->
@include('layouts.footer')

<!--build:js-->
<script src="{{ asset('js/vendors/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/vendors/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/vendors/countdown.min.js') }}"></script>
<script src="{{ asset('js/vendors/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/vendors/jquery.rcounterup.js') }}"></script>
<script src="{{ asset('js/vendors/magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/vendors/validator.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    @if(Session::has('success'))
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true,
    }
    toastr.success('{{ session('success') }}', 'Congratulations!!!');
    @endif
        @if(Session::has('error'))
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true
    }
    toastr.error('{{ session('error') }}', 'Ooops!!!');
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true}
    toastr.error('{{ $error }}');
    @endforeach
    @endif
</script>

<!--endbuild-->
</body>
</html>


