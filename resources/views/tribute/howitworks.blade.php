<?php
/**
 * tribute2
 * Olamiposi
 * 01/02/2021
 * 17:51
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    TributeToAloveOne.com - How it Works
@endsection
@section('content')
    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li>How it works</li>
            </ul>
        </div>
    </div>

    <div  class="services padding-top-100 wow fadeInUpBig">
        <div class="container">
            <div class="section-head text-center margin-bottom-60">
                <h3 class="h2" style="font-size: 30px">How to create an online memorial</h3>
                {{--                <p>See everything we do.</p>--}}
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 service-item text-center margin-bottom-60">
                    {{--                    <i class="flaticon-people"></i>--}}
                    <div>
                        <img src="{{asset('img/1.svg')}}" height="100px" width="100px" class="img-responsive icon-image center-block">
                    </div>
                    <h4>CREATE A MEMORIAL</h4>
                    <p>By adding basic or detailed information about your love one's</p>
                </div>
                <div class="col-md-4 col-sm-4 service-item text-center margin-bottom-60">
                    <img src="{{asset('img/2.svg')}}" height="100px" width="100px" class="img-responsive icon-image center-block">
                    <h4>ADD UNLIMITED CONTENT</h4>
                    <p>Including photos, life history and memorial song, etc</p>
                </div>
                <div class="col-md-4 col-sm-4 service-item text-center margin-bottom-60">
                    <img src="{{asset('img/3.svg')}}" height="100px" width="100px" class="img-responsive icon-image center-block">
                    <h4>SHARE THEIR LIFE STORY</h4>
                    <p>And allow friends and family members share stories, images, and tribute messages</p>
                </div>
            </div>
        </div>
    </div>

    @include('partials.memorial')

@endsection
