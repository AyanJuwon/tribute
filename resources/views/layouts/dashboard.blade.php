<?php
/**
 * tribute
 * Olamiposi
 * 27/10/2020
 * 14:11
 * CREATED WITH PhpStorm
 **/
?>
    <!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favi.png')}}">

    <!-- Title -->
    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <script type="module" src="{{asset('assets/js/manageTributes.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

<!---Switcher css-->
    <link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet">
    <link href="{{asset('assets/switcher/demo.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body>

    <div class="sidenav">
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <img src="{{asset('assets/img/profile-logo.svg')}}" alt="Logo" class="nav__logo">

                    <div class="nav__list">
                        <div class="nav__nav-top">
                            <div class="nav__items">
                            <div class="nav__profile">
                                <h5 class="nav__user-initials">RA</h5>
                                <div class="nav__set">
                                <h5 class="nav__user-name">{{auth()->user()->name}}</h5>
                                <p class="nav__role">{{auth()->user()->role}}</p>
                                </div>
                            </div>

                            <div class="nav__links">
                                <div class="nav__links-top">
                                    <a href="{{route('user.dashboard')}}" class="nav__link">
                                        <img src="/assets/img/dashboard-icon.svg" class="nav__link-icon">
                                        <span class="nav__name">Dashboard</span>
                                    </a>
                                    <a href="{{route('memorials')}}" class="nav__link">
                                        <img src="/assets/img/memorials-icon.svg" class="nav__link-icon">
                                        <span class="nav__name">Memorials</span>
                                    </a>

                                    <div class="nav__dropdown">
                                        <a href="manage-memorials.html" class="nav__link">
                                            <img src="/assets/img/manage-memorials-icon.svg" class="nav__link-icon">
                                            <span class="nav__name">Manage Memorials</span>
                                            <img src="/assets/img/down-icon.svg" class="nav__dropdown-icon">
                                            <span class="nav__memorials">{{\App\Memorial::where('created_by',auth()->user()->id)->count()}}</span>
                                        </a>
                                        <div class="nav__dropdown-collapse">

                                            <div class="nav__dropdown-content">
                                            @if (\App\Memorial::where('created_by',auth()->user()->id)->count() == 0)
                                                 <div class="dash-memorials__empty-content">
                            <img src="{{route('assets/img/empty-memorial-icon.svg')}}" class="dash-memorials__empty-icon">
                            <p class="dash-memorials__empty-text">
                                Looks like you have not created any memorial
                            </p>
                            <a href="{{route('createMemorial')}}" class="profile-memorial-button">
                                <img src="/assets/img/add-icon.svg">
                                <span>Create Memorial</span>
                            </a>
                        </div>
                                            @else
                                                @foreach (\App\Memorial::where('created_by',auth()->user()->id)->get() as $memorial )


                                                <a href="{{route('manageMemorial', $memorial->slug)}}" class="nav__dropdown-item">
                                                    <img src="/assets/img/memorial-img-1.png" alt="Memorial Person" class="nav__dropdown-avatar">
                                                    <p class="nav__dropdown-fullname">{{$memorial->first_name.' '.$memorial->last_name}}</p>
                                                </a>
                                                @endforeach
                                               @endif
                                            </div>
                                        </div>
                                    </div>

                            <a href="{{route('myTributes')}}" class="nav__link">
                                        <img src="{{asset('assets/img/manage-tributes-icon.svg')}}" }}class="nav__link-icon">
                                        <span class="nav__name">Manage Tributes</span>
                                    </a>

                                    <a href="{{route('myStories')}}" class="nav__link">
                                        <img src="{{asset('assets/img/manage-stories-icon.svg')}}" class="nav__link-icon">
                                        <span class="nav__name">Manage Stories</span>
                                    </a>
                                    <a href="{{route('payment')}}" class="nav__link">
                                        <img src="{{asset('assets/img/payment-icon.svg')}}" class="nav__link-icon">
                                        <span class="nav__name">Payment</span>
                                    </a>
                                </div>
                                <div class="nav__links-bottom">
                                    <a href="{{route('createMemorial')}}" class="nav-button">
                                        <img src="{{asset('assets/img/plus-icon.svg')}}" alt="">
                                        <span>Create Memorial</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                         <div class="nav__nav-bottom">
                             <a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav__link">
                                 <img src="/assets/img/logout-icon.svg" class="nav__link-icon">
                                 <span class="nav__name">Logout</span>
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
        </div>

    </div>
        @yield('content')

@yield('script')


</body>

</html>

