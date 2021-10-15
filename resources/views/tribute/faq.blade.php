<?php
/**
 * tribute2
 * Olamiposi
 * 22/04/2021
 * 13:19
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    FAQ's
@endsection
@section('content')
    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li>FAQ</li>
            </ul>
        </div>
    </div>
    <div class="faq-content padding-vertical-100 wow fadeInUpBig">
        <div class="container">
            <div class="section-head text-center margin-bottom-40">
                <h3 class="h2">FAQ's</h3>
                <p>Frequently Asked Questions</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group accordion" id="accordion">
                        <div class="panel panel-default">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        What is Tributetoaloveone.com?
                                        <i class="indicator fa fa-chevron-down"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>Tribute to a love one is An online memorial website where people can create an online memorial of their loved ones that have passed away.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        How do I get started?
                                        <i class="indicator fa fa-chevron-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>To get started, click here <a style="text-decoration: underline;color: #9a6e3a" href="https://tributetoaloveone.com/register">https://tributetoaloveone.com/register to sign up now</a>. After you have logged in, click on Create A Memorial, to setup a personalized memorial. </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        What are the features?
                                        <i class="indicator fa fa-chevron-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Each memorials has Unlimited Tributes, Unlimited Images, Unlimited Stories, A Background Music, Unlimited Storage and No Ads.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                        What are the various plans?
                                        <i class="indicator fa fa-chevron-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>We have four pricing plans which includes; Freemium, Monthly, Yearly, Lifetime.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                        How much are the various prices for each plans?
                                        <i class="indicator fa fa-chevron-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Freemium - ₦0, Monthly - ₦1,000, Yearly - ₦5,000, Lifetime - ₦25,000.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                        Does the price covers all memorials created?
                                        <i class="indicator fa fa-chevron-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>No, each memerial created would be active based on the subscription plan selected for that particualr memorial.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                        Are your payment processors PCIDSS compliant?
                                        <i class="indicator fa fa-chevron-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Yes, Paystack (A technology company solving payments problems for ambitious businesses.)</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default last">
                            <div class="accordion-heading">
                                <h4 class="accordion-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                                        Who owns the platform?
                                        <i class="indicator fa fa-chevron-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapseEight" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>TributeToAloveOne.com is an indigenous product of Codefixbug limited, a software company located in Nigeria, its goal is to provide simplified solutions that solve problems in Nigeria, Africa, and around the world.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
   <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
