<?php
/**
 * tribute2
 * Olamiposi
 * 26/11/2020
 * 20:59
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    Change Password
@endsection
@section('content')
    {{--    <div class="clearfix"></div>--}}
    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="#">Home</a></li>
                <li><a href="#">My Account </a> </li>
                <li>Change Password</li>
            </ul>
        </div>
    </div>
    <div class="contact single-content padding-vertical-70 wow fadeInUpBig">
        <div class="container">
            <div class="row">
                <div class="col-md-1 hidden-sm"></div>
                <div class="col-md-4 col-sm-6">
                    <div class="cinfo margin-bottom-30">
                        <h3 class="h2 margin-top-30">Hello, {{$user->name}}</h3>
                        {{--                        <p>Get it touch with us.</p>--}}
                        <p>Update Your Password Here</p>
                        <aside class="wow fadeInUp">
                            @include('partials.user')
                        </aside>

                    </div>
                </div>
                <div class="col-md-6 col-sm-6">

                    <form class="contact-form margin-bottom-30" id="contactForm" action="{{ route('change.password') }}" method="post">
                        @csrf

                        <div class="text-center">
                            <i class="flaticon-write"></i>
                            <h3 class="h2">My Account</h3>
                        </div>

                        @include('partials.list_error')
                        @include('partials.success')
                        <input type="password" name="password" id="senderEmail" placeholder="Current Password" required="required" />
                        <input type="password" name="new-password" id="senderEmail" placeholder="New Password"  required="required" />
                        <input type="password" name="new-password-confirmation" id="senderEmail" placeholder="Confirm New Password" required="required" />
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-md">Save</button>
                        </div>
                    </form>
                    <div id="sendingMessage" class="statusMessage">
                        <p><i class="fa fa-spin fa-spinner"></i> Sending your message. Please wait...</p>
                    </div>
                    <div id="successMessage" class="successmessage">
                        <p><i class="fa fa-check"></i> Thanks for sending your message! We'll get back to you shortly.</p>
                    </div>
                    <div id="failureMessage" class="errormessage">
                        <p><i class="fa fa-close"></i> There was a problem sending your message. Please try again.</p>
                    </div>
                    <div id="incompleteMessage" class="statusMessage">
                        <p><i class="fa fa-warning"></i> Please complete all the fields in the form before sending.</p>
                    </div>
                </div>
                <div class="col-md-1 hidden-sm"></div>
            </div>
        </div>
    </div>
@endsection
