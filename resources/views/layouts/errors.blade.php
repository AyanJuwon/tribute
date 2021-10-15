<?php
/**
 * tribute2
 * Olamiposi
 * 25/11/2020
 * 20:19
 * CREATED WITH PhpStorm
 **/
?>
    <!doctype html>
<!--[if IE 7 ]>
<html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->


<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>@yield('title')</title>

<!-- FAVICON -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.html')}}">
    <!-- ICONS CSS -->
    <link rel="stylesheet" href="{{asset('../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon/font/flaticon.css')}}">
    <!-- THEME STYLES CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/vendor/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/themesuite.css')}}">
    <link rel="stylesheet" href="{{asset('js/vendor/lity/lity.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('css')
    <script src="{{asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    <script src="https://use.fontawesome.com/a5fa0ac781.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<body>
@yield('content')

<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('../../../s3-us-west-2.amazonaws.com/s.cdpn.io/3/froogaloop.js')}}"></script>
<script src="{{asset('js/vendor/lity/lity.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/mc/jquery.ketchup.all.min.js')}}"></script>
<script src="{{asset('js/mc/main.js')}}"></script>
</body>


</html>
