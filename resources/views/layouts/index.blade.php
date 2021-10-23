<?php
/**
 * tribute
 * Olamiposi
 * 12/10/2020
 * 21:13
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


<!-- Mirrored from demo.themesuite.com/funeral/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Oct 2020 19:00:30 GMT -->
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>@yield('title')</title>

    @yield('description')
    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{asset('img/favi.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favi.png')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.html')}}">
    <!-- ICONS CSS -->
{{--    <link rel="stylesheet" href="{{asset('../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">--}}
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
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XBPDYJ17RL"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'G-XBPDYJ17RL');--}}
{{--    </script>--}}

    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"--}}
    {{--          integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />--}}
    <style>
        .modal{z-index:99999}.modal-body{padding:2.5em 3em}h4.modal-header-title{font-size:4em;text-align:center;margin:1rem 0 1em;font-weight:800}.btn.pop-login{border-radius:50px;padding:20px 0;background:#fd5332;border-color:#fd5332;margin-top:.6rem}.modal-divider{position:relative;margin:20px 0;text-align:center}.modal-divider:before{content:' ';position:absolute;top:50%;left:0;right:0;border-bottom:1px solid #E1E5F2}.modal-divider span{position:relative;background:#fff;padding:0 20px}.social-login ul{margin:0;width:100%;padding:0;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}.social-login ul li{display:inline-block;-ms-flex:0 0 33.333333%;flex:0 0 50%;width:50%;list-style:none;padding:0 10px}.social-login ul li a.btn{width:100%;border-radius:50px;padding:20px 0;color:#fff;background:#f4f5f7}.social-login ul li a.btn i{margin-right:7px}.social-login ul li a.btn.connect-fb{background:#3b5998}.social-login ul li a.btn.connect-google{background:#ec4514}.social-login ul li a.btn.connect-linkedin{background:#0073b0}.social-login ul li a.btn.connect-twitter{background:#20a4ea}.signup .modal-dialog{max-width:880px;z-index:999999}.signup .form-group{margin-bottom:1.5rem}span.mod-close{width:35px;height:35px;position:absolute;top:15px;right:15px;background:#fff;display:flex;flex-wrap:wrap;align-items:center;justify-content:center;border-radius:50%;font-size:13px;color:#fd5332;cursor:pointer;z-index:1;box-shadow:0 5px 24px rgba(31,37,59,0.15);-webkit-box-shadow:0 5px 24px rgba(31,37,59,0.15)}.modal-dialog{max-width:600px;margin:30px auto}.cta-sec h1,.cta-sec h2{font-size:38px;margin-bottom:12px}.input-with-icon{border:1px solid #dce3e8;border-radius:4px}</style>
    <style>
        @media only screen and (min-width: 992px) {
            .topbar3 {
                display: none;
            }
            header .navbar-brand {
                margin: 0;
                padding: 3px 0;
                /*margin-top: -10px;*/
                height: auto;
            }
        }
        @media only screen and (min-width: 320px) and (max-width: 480px) {

            header .navbar-brand {
                margin: 0;
                vertical-align: center;
                height: auto;
            }
            .collapse-icon {
                margin-top: -35px;
            }

            .footer-mine {
                padding-top: 10px;
            }
        }

        /*@media only screen and (max-width: 768px) {*/
        /*    header .navbar-brand {*/
        /*        margin: 0;*/
        /*        padding: 27px 0;*/
        /*        height: auto;*/
        /*    }*/
        /*}*/

        @media only screen and (width: 360px) {
            .collapse-icon {
                margin-top: -30px;
            }
        }

        @media only screen and (width: 411px) {
            .collapse-icon {
                margin-top: -24px;
            }
        }

        @media only screen and (width: 375px) {
            .collapse-icon {
                margin-top: -28px;
            }
        }

        @media only screen and (width: 414px) {
            .collapse-icon {
                margin-top: -24px;
            }
        }

        @media only screen and (min-width: 250px) and (max-width: 767px) {
           .header4 .navbar-nav{
               float: left;
           }
        }

    </style>
</head>

<body>
<div class="wrapper">

    <header class="header4 header5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-8">
                    <a href="{{ route('welcome', $slug) }}" class="navbar-brand"><img src="{{asset('img/logo2.png')}}" class="img-responsive" alt=""></a>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-4">
                    <div class="clearfix"></div>
                    <nav class="navbar navbar-default">
                        <button type="button" class="navbar-toggle collapsed collapse-icon" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span>
                <em></em>
                <em></em>
                <em></em>
            </span>
                        </button>
                        <div id="navbar" class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav don">
                                <li class="active"><a href="{{ route('welcome', $slug) }}">About</a></li>
                                <li><a href="{{ route('life', $slug) }}">Life</a></li>
                                <li><a href="{{ route('gallery', $slug) }}">Gallery</a></li>
                                <li><a href="{{ route('stories', $slug) }}">Stories</a></li>
                                <li><a href="{{ route('tribute', $slug) }}">Tributes</a></li>
                                @if(auth()->user())
                                    <li class="dropdown dropdown-normal">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="fa fa-angle-down"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-v3">
                                            <li><a href="{{ route('memorials') }}">My Memorials</a></li>
                                            <li><a href="{{ route('myaccount', auth()->user()->id) }}">Account Details</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if(!auth()->user())
                                    <li>
                                        <a href="{{ route('login') }}">
                                            <i class="fa fa-user-circle mr-1"></i> Sign In</a>
                                    </li>
                                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                                @endif

                                @if(auth()->user())
                                    <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out mr-1"></i> Logout
                                        </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endif


                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                        <!--/.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="clearfix"></div>

    @yield('content')

{{--    <audio src="{{ assets('audio/1.mp3') }}" id="myAudio" muted></audio>--}}

</div>
<footer class="wow fadeInUpBig">
    <div class="container padding-top-40">
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-contact margin-bottom-40">
                <h4 style="font-weight: lighter">Tribute Page</h4>
                <a href="{{ route('welcome', $slug) }}" style="color: white;">About</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('life', $slug) }}" style="color: white;">Life</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('gallery', $slug) }}" style="color: white;">Gallery</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('stories', $slug) }}" style="color: white;">Stories</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('tribute', $slug) }}" style="color: white;">Tributes</a>
            </div>
            <div class="col-md-4 col-push-3 col-sm-6 footer-contact margin-bottom-40">
                <h4 style="font-weight: lighter">Quick Links</h4>
                <a href="{{ route('landing') }}" style="color: white;">Home</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('about') }}" style="color: white;">About Us</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('contact') }}" style="color: white;">Contact Us</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('howitworks') }}" style="color: white;">How it works</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('pricing') }}" style="color: white;">Plans & Features</a>
            </div>

            <div class="col-md-4 col-push-3 col-sm-6 footer-contact margin-bottom-40">
                <h4 style="font-weight: lighter">Legal</h4>
                <a href="{{ route('terms') }}" style="color: white">Terms & Conditions</a>
                <br>
                <div class="padding-bottom-20"></div>
{{--                <a href="{{ route('pandp') }}" style="color: white">Privacy Policy</a>--}}
                <br>
                <div class="padding-bottom-20"></div>
                <a href="https://codefixbug.com" target="_blank" style="color: white">About Parent Company</a>
                <br>
                <div class="padding-bottom-20"></div>
                <a href="{{ route('faq') }}" style="color: white">FAQ's</a>
        </div>
    </div>

    <div class="container">
        <div class="footer-bottom text-center">
            Copyright &copy; {{ \Carbon\Carbon::now()->year }} <a style="color: #c0a16b" href="https://tributetoaloveone.com">Tributetoaloveone.com</a> - Powered by <a href="https://codefixbug.com" target="_blank" style="color: #c0a16b"> Codefixbug Limited</a>
        </div>
    </div>
    </div>
</footer>
{{--</div>--}}
<!-- JAVASCRIPT -->
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vendor/slick/slick.min.js')}}"></script>
{{--<script src="{{asset('../../../s3-us-west-2.amazonaws.com/s.cdpn.io/3/froogaloop.js')}}"></script>--}}
<script src="{{asset('js/vendor/lity/lity.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/mc/jquery.ketchup.all.min.js')}}"></script>
<script src="{{asset('js/mc/main.js')}}"></script>
@yield('script')
<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
{{--<script type="text/javascript">--}}
{{--    function googleTranslateElementInit() {--}}
{{--        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');--}}
{{--    }--}}
{{--</script>--}}
{{--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>--}}
<!-- Sign Up Modal -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f4fda9e8e67d5cd"></script>

</body>


</html>

