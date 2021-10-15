<?php
/**
 * tribute2
 * Olamiposi
 * 26/11/2020
 * 19:58
 * CREATED WITH PhpStorm
 **/
?>

<div class="side-widget margin-bottom-50">
    <div class="links margin-bottom-50">
{{--        <a href="{{ route('user.dashboard') }}">Dashboard <i class="flaticon-arrows-1"></i></a>--}}
        <a href="{{ route('memorials') }}">My Memorials <i class="flaticon-arrows-1"></i></a>
        <a href="{{route('myaccount', auth()->user()->id)}}">Manage Account <i class="flaticon-arrows-1"></i></a>
        <a href="{{ route('payment') }}">Manage Payment <i class="flaticon-arrows-1"></i></a>
        <a href="{{ route('forPassword', auth()->user()->id) }}">Change Password <i class="flaticon-arrows-1"></i></a>
    </div>
</div>
