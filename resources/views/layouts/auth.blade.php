<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/js/authentication.js')}}" defer></script>
    <title>Tribute @yield('title')</title>
</head>
<body>
    <header class="header-center">
        <!-- <a href="/main/landing-page/index.html">
            <img src="/assets/img/logo.png" alt="Logo" class="header-center__logo">
        </a> -->

        <!-- <nav class="main-nav">
            <ul class="main-nav__list">
                <li><a href="/main/landing-page/index.html" class="main-nav__link link--active">Home</a></li>
                <li><a href="#" class="main-nav__link">Pricing</a></li>
                <li><a href="#" class="main-nav__link">FAQ</a></li>
                <li><a href="#" class="main-nav__link">Memorials</a></li>
            </ul>
            <ul class="main-nav__cta">
                <li><a href="/main/login-signup/login.html" class="nav-cta-light">Login</a></li>
                <li><a href="/main/login-signup/signup.html" class="nav-cta-dark">Sign up</a></li>
            </ul>
        </nav> -->
    </header>
    <main>
        <div class="sign-contain">
            <div class="sign-cover">
                <div class="box">
                    <img src="{{asset('assets/img/logo-2.svg')}}" alt="Logo" class="box__logo">
                    @yield('side-text')
                   
                </div>
                <!-- <img src="/assets/img/union-signup.svg" alt="" class="square"> -->
            </div>
            <div class="sign-form">
                <div >
                    <div class="top">
                        @yield('page-function')
                      
                    </div>
    
                    <div class="buttons">
                        <a href="{{route('socialLogin' , 'google')}}" class="continue-button">
                            <img src="/assets/img/google.svg" alt="Google" class="continue-button__img">
                            Continue with Google
                        </a>
                        <a href="{{route('socialLogin' , 'facebook')}}" class="continue-button">
                            <img src="/assets/img/facebook-form.svg" alt="Google" class="continue-button__img">
                            Continue with Facebook
                        </a>
                    </div>
                  
                    
                    <div class="form-contain">
                          @yield('auth-form')
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>