<?php
/**
 * tribute2
 * Olamiposi
 * 07/01/2021
 * 19:09
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    TributeToAloveOne.com - Contact Us
@endsection
@section('content')
    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
    <div class="contact padding-vertical-10 wow fadeInUpBig">
        <div class="container">
            <div class="row">
                <div class="col-md-1 hidden-sm"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="cinfo margin-bottom-30 text-center">
                        <h3 class="h2 margin-top-30">Contact Us</h3>
                        <p>Get it touch with us.</p>
                        <p>We look forward to helping you with problems you encounter while using our platform,<br> kindly call us or send us an email, we will respond immediately.</p>
                        <h3>
                            <p style="font-size: 25px;" class="abbr">
                                <i class="flaticon-black" style="font-size: 20px;padding-right: 30px;"></i> <a href="mailto:info@tributetoaloveone.com">info@tributetoaloveone.com</a>
                            <br><br>
                            <i class="flaticon-technology"></i><a href="tel:081 5785 - 3156">(081) 5785 - 3136</a>
                    </p>
                        </h3>
                    </div>
                    <div class="footer-social text-center ">
                        <a style="font-size: 20px;"  target="_blank" href="https://www.facebook.com/OurLovedOne"><i class="flaticon-social padding-left-10"></i></a>
                        <a style="font-size: 20px;" target="_blank" href="https://twitter.com/ourlovedone"><i class="flaticon-social-1 padding-left-10"></i></a>
                        <a style="font-size: 20px;"  target="_blank" href="https://wa.me/2348157853136"><i class="fa fa-whatsapp padding-left-10"></i></a>
                    </div>
                    <div class="padding-bottom-20"></div>
                </div>

                <div class="col-md-1 hidden-sm"></div>

            </div>
        </div>
    </div>
    @include('partials.memorial')


@endsection
