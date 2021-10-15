<?php
/**
 * tribute2
 * Olamiposi
 * 15/12/2020
 * 20:06
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')

@section('title')
    Upgrade Subscription
@endsection
@section('css')
    <script src="https://js.paystack.co/v1/inline.js"></script>
@endsection
@section('content')
    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li>Upgrade Subscription</li>
            </ul>
        </div>
    </div>
    <div class="pricing-content padding-top-100 padding-bottom-70">
        <div class="container">
            <form method="POST" action="{{ route('store.upgrade', $id) }}" id="form-id">
                @csrf

                <div class="pricing-content">
                    {{--                <div class="container">--}}
                    <div class="pricing-3">
                        <div class="row">
                            <div class="col-md-4 col-sm-4  margin-bottom-30 wow fadeInUp" data-wow-delay=".1s">
                                <div class="plan-alt">
                                    <div class="plan-alt-title">Monthly</div>
                                    <div class="plan-alt-price-wrap">
                                        <div class="plan-alt-price" style="font-size: 25px"><span style="font-size: 10px">₦</span>500</div>
                                        <div class="plan-period">monthly</div>
                                    </div>
                                    <ul>
                                        <li>Unlimited Tributes</li>
                                        <li>Unlimited Images</li>
                                        <li>Unlimited Stories</li>
                                        <li>Background Music</li>
                                        <li>Unlimited Storage</li>
                                        <li>No Ads</li>
                                        <li>One Month Duration</li>
                                        <li>ATM Card Charge(1.5% Fee)</li>
                                    </ul>
                                    <a onclick="payWithPaystack('monthly', '508', '{{ \Illuminate\Support\Str::random(32) }}')" class="btn btn-primary btn-md plan-btn">Choose Plan</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 margin-bottom-30 wow fadeInUp" data-wow-delay=".3s">
                                <div class="plan-alt">
                                    <div class="plan-alt-title">Yearly</div>
                                    <div class="plan-alt-price-wrap">
                                        <div class="plan-alt-price" style="font-size: 25px"><span style="font-size: 10px">₦</span>2,500</div>
                                        <div class="plan-period">yearly</div>
                                    </div>
                                    <ul>
                                        <li>Unlimited Tributes</li>
                                        <li>Unlimited Images</li>
                                        <li>Unlimited Stories</li>
                                        <li>Background Music</li>
                                        <li>Unlimited Storage</li>
                                        <li>No Ads</li>
                                        <li>One Year Duration</li>
                                        <li>ATM Card Charge(1.5% Fee)</li>
                                    </ul>
                                    <a onclick="payWithPaystack('yearly', '2538', '{{ \Illuminate\Support\Str::random(32) }}')" class="btn btn-primary btn-md plan-btn">Choose Plan</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 margin-bottom-30 wow fadeInUp" data-wow-delay=".7s">
                                <div class="plan-alt">
                                    <div class="plan-alt-title">Lifetime</div>
                                    <div class="plan-alt-price-wrap">
                                        <div class="plan-alt-price" style="font-size: 25px"><span style="font-size: 10px">₦</span>20,000</div>
                                        <div class="plan-period">Lifetime</div>
                                    </div>
                                    <ul>
                                        <li>Unlimited Tributes</li>
                                        <li>Unlimited Images</li>
                                        <li>Unlimited Stories</li>
                                        <li>Background Music</li>
                                        <li>Unlimited Storage</li>
                                        <li>No Ads</li>
                                        <li>Lifetime Duration</li>
                                        <li>ATM Card Charge(1.5% Fee)</li>
                                    </ul>
                                    <a onclick="payWithPaystack('lifetime', '20300', '{{ \Illuminate\Support\Str::random(32) }}')" class="btn btn-primary btn-md plan-btn">Choose Plan</a>
                                </div>
                            </div>
                            <div class="padding-bottom-20"></div>
                            <br>
                            <img src="{{asset('img/paystack.png')}}" width="250px" class="img-responsive center-block">
                        </div>
                    </div>
                    {{--                </div>--}}
                    <input type="hidden" name="plan_type" id="plan_type">
                    <input type="hidden" name="amount" id="amount" >
                    <input type="hidden" name="reference" id="reference" >
                </div>
            </form>


        </div>

    </div>
@endsection

@section('script')
    <script>
        function payWithPaystack(plan_type, amount, ref) {
            var amt = amount * 100;
            var plan_type = plan_type;
            var amt_save = amt / 100;

            var handler = PaystackPop.setup({
                key: 'pk_test_09abaa510b84686d8d0c199ce9531734a4c8d3d0', // Replace with your public key
                email:  '{{ auth()->user()->email }}',// document.getElementById("email").value,
                amount: amt,
                currency: "NGN",
                ref: ref,
                metadata: {
                    custom_fields: [
                        {
                            display_name: '{{ auth()->user()->name }}',
                            variable_name: "mobile_number",
                            value: "{{ auth()->user()->id }}"
                        }
                    ]
                },
                callback: function(response){
                    if(response.message === 'Approved'){
                        $('#reference').val(response.reference);
                        $('#amount').val(amt_save);
                        $('#plan_type').val(plan_type);
                        $('form#form-id').submit();
                    }
                }
            });
            handler.openIframe();
        }
    </script>
@endsection
