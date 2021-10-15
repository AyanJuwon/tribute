<?php
/**
 * tribute2
 * Olamiposi
 * 14/12/2020
 * 21:12
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')

@section('title')
    Plans & Features
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('mediaqueries.css')}}">

@endsection
@section('content')
    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li>Plans & Features</li>
            </ul>
        </div>
    </div>
    <div class="pricing-content padding-top-100 padding-bottom-70" >
        <div class="container">
            <div class="section-head text-center margin-bottom-40 wow fadeInUpBig">
                <h3 class="h2">Plans & Features</h3>
                <p>See & Compare Plans.</p>
            </div>
            <div class="pricing-3" >
                <div class="row">
                    <div class="col-md-3 col-sm-3  margin-bottom-30 wow fadeInUp" data-wow-delay=".1s">
                        <div class="plan-alt" style="border-radius: 20px;background-color: #fff;border: 2px solid #4d5965">
                            <div class="plan-alt-title" style="float: left;text-align: left;padding-bottom: 20px">
                                Freemium
                                <div class="padding-bottom-5"></div>
                                <p style="float: left;text-align: left;font-size: 14px;line-height: 1.2">
                                    Create a one month free duration memorial, and enjoy unlimited benefits.
                                </p>
                            </div>
                            <br><br><br>
                            <div class="plan-alt-price">
                                {{--                            <div class="padding-bottom-30">--}}
                                <p style="font-size: 36px; text-align: left;font-weight: 400;margin-top: 100px;color: #4d5965">Free</p>
                            </div>
                            <div class="padding-bottom-60"></div>
                            <ul >
                                <li style="text-align: left;padding: 0;"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Tributes</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i><span style="margin-left: 10px"> Unlimited Images</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Stories</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Background Music</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Storage</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">No Ads</span></li>
                            </ul>
                            <br>
                            <a href="{{route('register')}}" class="btn btn-primary btn-md padding-top-15 center-block plan-button" style="height: 50px;background-color: #4d5965;color: white">Get Started</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  margin-bottom-30 wow fadeInUp" data-wow-delay=".1s">
                        <div class="plan-alt" style="border-radius: 20px;background-color: #fff;border: 2px solid #4d5965">
                            <div class="plan-alt-title" style="float: left;text-align: left;padding-bottom: 20px">
                                Monthly
                                <div class="padding-bottom-5"></div>
                                <p style="float: left;text-align: left;font-size: 14px;line-height: 1.2">
                                    Create a one month duration memorial, and enjoy unlimited benefits.
                                </p>
                            </div>
                            <br><br><br>
                            <div class="plan-alt-price">
                                {{--                            <div class="padding-bottom-30">--}}
                                <p style="font-size: 36px; text-align: left;font-weight: 400;margin-top: 100px;color: #4d5965">₦500</p>
                            </div>
                            <div class="padding-bottom-60"></div>
                            <ul >
                                <li style="text-align: left;padding: 0;"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Tributes</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i><span style="margin-left: 10px"> Unlimited Images</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Stories</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Background Music</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Storage</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">No Ads</span></li>
                            </ul>
                            <br>
                            <a href="{{route('register')}}" class="btn btn-primary btn-md padding-top-15 center-block plan-button" style="height: 50px;background-color: #4d5965;color: white">Get Started</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  margin-bottom-30 wow fadeInUp" data-wow-delay=".3s">
                        <div class="plan-alt" style="border-radius: 20px;background-color: #fff;border: 2px solid #4d5965">
                            <div class="plan-alt-title" style="float: left;text-align: left;padding-bottom: 20px">
                                Yearly
                                <div class="padding-bottom-5"></div>
                                <p style="float: left;text-align: left;font-size: 14px;line-height: 1.2">
                                    Create a one year duration memorial, and enjoy unlimited benefits.
                                </p>
                            </div>
                            <br><br><br>
                            <div class="plan-alt-price">
                                {{--                            <div class="padding-bottom-30">--}}
                                <p style="font-size: 36px; text-align: left;font-weight: 400;margin-top: 100px;color: #4d5965">₦2,500</p>
                            </div>
                            <div class="padding-bottom-60"></div>
                            <ul >
                                <li style="text-align: left;padding: 0;"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Tributes</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i><span style="margin-left: 10px"> Unlimited Images</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Stories</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Background Music</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Storage</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">No Ads</span></li>
                            </ul>
                            <br>
                            <a href="{{route('register')}}" class="btn btn-primary btn-md padding-top-15 center-block plan-button" style="height: 50px;background-color: #4d5965;color: white">Get Started</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  margin-bottom-30 wow fadeInUp" data-wow-delay=".7s">
                        <div class="plan-alt" style="border-radius: 20px;background-color: #fff;border: 2px solid #4d5965">
                            <div class="plan-alt-title" style="float: left;text-align: left;padding-bottom: 20px">
                                Lifetime
                                <div class="padding-bottom-5"></div>
                                <p style="float: left;text-align: left;font-size: 14px;line-height: 1.2">
                                    Create a lifetime memorial , and enjoy unlimited benefit
                                </p>
                            </div>
                            <br><br><br>
                            <div class="plan-alt-price">
                                {{--                            <div class="padding-bottom-30">--}}
                                <p style="font-size: 36px; text-align: left;font-weight: 400;margin-top: 100px;color: #4d5965">₦20,000</p>
                            </div>
                            <div class="padding-bottom-60"></div>
                            <ul >
                                <li style="text-align: left;padding: 0;"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Tributes</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i><span style="margin-left: 10px"> Unlimited Images</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Stories</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Background Music</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">Unlimited Storage</span></li>
                                <li style="text-align: left;margin-top: -19px"><i class="fa fa-check" style="color: #4d5965"></i> <span style="margin-left: 10px">No Ads</span></li>
                            </ul>
                            <br>
                            <a href="{{route('register')}}" class="btn btn-primary btn-md padding-top-15 center-block plan-button" style="height: 50px;background-color: #4d5965;color: white">Get Started</a>
                        </div>
                    </div>
                    {{--                <div class="col-md-4 col-sm-4 margin-bottom-30 wow fadeInUp" data-wow-delay=".3s">--}}
                    {{--                    <div class="plan-alt">--}}
                    {{--                        <div class="plan-alt-title">Yearly</div>--}}
                    {{--                        <div class="plan-alt-price-wrap">--}}
                    {{--                            <div class="plan-alt-price"><span>₦</span>10,000</div>--}}
                    {{--                            <div class="plan-period">yearly</div>--}}
                    {{--                        </div>--}}
                    {{--                        <ul>--}}
                    {{--                            <li>Unlimited Tributes</li>--}}
                    {{--                            <li>Unlimited Images</li>--}}
                    {{--                            <li>Unlimited Stories</li>--}}
                    {{--                            <li>Background Music</li>--}}
                    {{--                            <li>Unlimited Storage</li>--}}
                    {{--                            <li>No Advertising</li>--}}
                    {{--                            <li>One Month Duration</li>--}}
                    {{--                        </ul>--}}
                    {{--                        <a onclick="payWithPaystack('yearly', '10000', '{{ \Illuminate\Support\Str::random(32) }}')" class="btn btn-primary btn-md plan-btn">Choose Plan</a>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-md-4 col-sm-4 margin-bottom-30 wow fadeInUp" data-wow-delay=".7s">--}}
                    {{--                    <div class="plan-alt">--}}
                    {{--                        <div class="plan-alt-title">Lifetime</div>--}}
                    {{--                        <div class="plan-alt-price-wrap">--}}
                    {{--                            <div class="plan-alt-price"><span>₦</span>40,000</div>--}}
                    {{--                            <div class="plan-period">Lifetime</div>--}}
                    {{--                        </div>--}}
                    {{--                        <ul>--}}
                    {{--                            <li>Unlimited Tributes</li>--}}
                    {{--                            <li>Unlimited Images</li>--}}
                    {{--                            <li>Unlimited Stories</li>--}}
                    {{--                            <li>Background Music</li>--}}
                    {{--                            <li>Unlimited Storage</li>--}}
                    {{--                            <li>No Advertising</li>--}}
                    {{--                            <li>Lifetime Duration</li>--}}
                    {{--                        </ul>--}}
                    {{--                        <a onclick="payWithPaystack('lifetime', '40000', '{{ \Illuminate\Support\Str::random(32) }}')" class="btn btn-primary btn-md plan-btn">Choose Plan</a>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </div>

            {{--                </div>--}}
            <input type="hidden" name="plan_type" id="plan_type">
            <input type="hidden" name="amount" id="amount" >
            <input type="hidden" name="reference" id="reference" >
        </div>
    </div>
    <div class="clients ">
        <div class="container text-center">
            <div class="row bg-g">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="img/paystack.png" class="img-responsive bg-gray center-block" width="250px"  alt="" />
                </div>
{{--                <div class="col-md-2 col-sm-2 col-xs-6">--}}
{{--                    <img src="img/clients/2.png" class="img-responsive center-block" alt="" />--}}
{{--                </div>--}}
{{--                <div class="col-md-2 col-sm-2 col-xs-6">--}}
{{--                    <img src="img/clients/3.png" class="img-responsive center-block" alt="" />--}}
{{--                </div>--}}
{{--                <div class="col-md-2 col-sm-2 col-xs-6">--}}
{{--                    <img src="img/clients/4.png" class="img-responsive center-block" alt="" />--}}
{{--                </div>--}}
{{--                <div class="col-md-2 col-sm-2 col-xs-6">--}}
{{--                    <img src="img/clients/5.png" class="img-responsive center-block" alt="" />--}}
{{--                </div>--}}
{{--                <div class="col-md-2 col-sm-2 col-xs-6">--}}
{{--                    <img src="img/clients/6.png" class="img-responsive center-block" alt="" />--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    @include('partials.faq')
    <div class="padding-bottom-50"></div>
    @include('partials.memorial')


@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
