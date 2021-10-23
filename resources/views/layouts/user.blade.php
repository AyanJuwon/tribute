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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/js/index.js')}}" defer></script>
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
<div class="wrapper">
    <div class="topbar topbar3 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-xs-12 col-sm-12">
                    <div class="padding-bottom-20"></div>
{{--                    <div class="top-social">--}}
{{--                        <a href="#"><i class="flaticon-social"></i></a>--}}
{{--                        <a href="#"><i class="flaticon-social-1"></i></a>--}}
{{--                        <a href="#"><i class="flaticon-play"></i></a>--}}
{{--                        <a href="#"><i class="flaticon-vimeo"></i></a>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-3 hidden-xs">
                    <div class="lang-select pull-right">
                        <a style="color: #4d5965" href="#search" ><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <header class="header">
        <img src="{{asset('assets/img/logo.png')}}" alt="Logo" class="logo">
        <nav class="main-nav">
            <ul class="main-nav__list">
                <li><a href="{{route('landing')}}" class="main-nav__link active">Home</a></li>
                
                <li><a href="#" class="main-nav__link">How It Works</a></li>
                <li><a href="/main/userProfile/dashboard.html" class="main-nav__link">Pricing</a></li>
                <li><a href="{{route('faq')}}" class="main-nav__link">FAQ</a></li>
                <li><a href="{{route('memorials')}}" class="main-nav__link">Memorials</a></li> 
                
                <li><a href="{{route('contact')}}" class="main-nav__link">Contact Us</a></li> 
            </ul>
            <ul class="main-nav__cta">
                @if (auth()->user())
                    <li><a href="{{route('logout')}}" class="nav-cta-light">Log Out</a></li>
                @else
                     <li><a href="{{route('login')}}" class="nav-cta-light">Sign in</a></li>
                <li><a href="{{route('register')}}" class="nav-cta-dark">Sign up</a></li>
                @endif
               
            </ul>
        </nav>
    </header>
    <main>@yield('content')
    </main>
    
</div>

<footer class="footer">
        <div class="container grid footer-grid">
            <div class="col-logo">
                <img src="./assets/img/logo.png" alt="Logo" class="col-logo__img">
                <p class="col-logo__copy">
                    Copyright &copy; 2021 Createtribute.com<br>
                    Powered by <a href="#" class="col-logo__cfb">Codefixbug Limited</a>
                    <br><br>
                    All rights reserved
                </p>
                <div class="col-logo__socials">
                    <a href="#" class="col-logo__link"><img src="./assets/img/instagram.svg" alt="instagram" class="col-logo__icon"></a>
                    <a href="#" class="col-logo__link"><img src="./assets/img/whatsapp.svg" alt="whatsapp" class="col-logo__icon"></a>
                    <a href="#" class="col-logo__link"><img src="./assets/img/twitter.svg" alt="twitter" class="col-logo__icon"></a>
                    <a href="#" class="col-logo__link"><img src="./assets/img/facebook.svg" alt="facebook" class="col-logo__icon"></a>
                </div>
            </div>
            <nav class="col-nav">
                <p class="footer-heading">Company</p>
                <ul class="footer-nav">
                    <li><a href="/main/landingPage/about.html" class="footer-link">About us</a></li>
                    <li><a href="{{route('contact')}}" class="footer-link">Contact us</a></li>
                    <li><a href="{{route('pricing')}}" class="footer-link">Pricing</a></li>
                </ul>
            </nav>
            <nav class="col-nav">
                <p class="footer-heading">Support</p>
                <ul class="footer-nav">
                    <li><a href="#" class="footer-link">Help center</a></li>
                    <li><a href="{{route('terms')}}" class="footer-link">Terms of service</a></li>
                    <li><a href="#" class="footer-link">Legal</a></li>
                    <li><a href="{{route('policy')}}" class="footer-link">Privacy policy</a></li>
                </ul>
            </nav>
            <div class="subscribe-col">
                <p class="subscribe-col__heading">Stay up to date</p>

                <div class="form">
                    <input class="form__input" type="text" placeholder="Your email address">
                    <button class="form__button"><img src="./assets/img/send.svg"></button>
                </div>

                <a href="#" class="product-hunt"><img src="./assets/img/product-hunt.svg" alt="product-hunt" class="hunt"></a>
            </div>
        </div>
    </footer>
@yield('script')

</body>
</html>
