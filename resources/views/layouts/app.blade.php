<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favi.png')}}">
    <script src="https://use.fontawesome.com/a5fa0ac781.js"></script>


    <!-- Title -->
    <title>@yield('title')</title>

    <!---Fontawesome css-->
    <link href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}'" rel="stylesheet">

    <!---Ionicons css-->
    <link href="{{asset('assets/plugins/ionicons/css/ionicons.min.css')}}'" rel="stylesheet">

    <!---Typicons css-->
    <link href="{{asset('assets/plugins/typicons.font/typicons.css')}}" rel="stylesheet">

    <!---Feather css-->
    <link href="{{asset('assets/plugins/feather/feather.css')}}" rel="stylesheet">

    <!---Falg-icons css-->
    <link href="{{asset('assets/plugins/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">

    <!---Style css-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom-style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/skins.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom-dark-style.css')}}" rel="stylesheet">


</head>

<body>
<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->
@yield('content')

<!-- End Page -->
<!-- Jquery js-->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Ionicons js-->
<script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>

<!-- Rating js-->
<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>


<!-- Custom js-->
<script src="{{asset('assets/js/custom.js')}}"></script>




</body>

</html>
