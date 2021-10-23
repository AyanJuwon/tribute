<?php
/**
 * tribute2
 * Olamiposi
 * 21/11/2020
 * 16:22
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    Create Memorial
@endsection
@section('description')
    <meta name="description" content="Create Memorial">
@endsection
@section('css')
   
    <script type="module" src="{{asset('assets/js/createMemorial.js')}}" defer></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
    //   DATE OF DEATH
  $( function() {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
      changeYear: true});
      
    $( "#anim" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
    });


    $( "#format" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  } );
//   DATE OF DEATH
  $( function() {
    $( "#datepicker2" ).datepicker({changeMonth: true,
      changeYear: true});
      $( "#anim" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
    });
    $( "#format" ).on( "change", function() {
      $( "#datepicker2" ).datepicker( "option", "dateFormat", $( this ).val() );
    });

  } );
  </script>
@endsection
@section('content')
   <div class="create-memorial">
        <div class="memorial-step memorial-step-active">
            <div class="create-memorial-container container-col-3">
                <div class="steps">
                    <h6 class="steps__text">
                        SETUP MEMORIAL FOR YOUR LOVED ONE
                    </h6>
                    <div class="steps__progress-bar">
                        <div class="steps__progress">
                            <div class="steps__progress-fill"></div>
                        </div>
                        <p class="steps__step">1 of 2</p>
                    </div>
                    <div class="steps__details">
                        <div class="steps__details-box">
                            <img src="../../assets/img/create-memorial-icon1.svg" class="steps__details-icon">
                            <p class="steps__details-text steps__details-text--1">DECEASED DETAILS</p>
                            <span class="steps__line"></span>
                        </div>
                        <div class="steps__details-box">
                            <img src="../../assets/img/create-memorial-icon2.svg" class="steps__details-icon">
                            <p class="steps__details-text steps__details-text--2">PAYMENT PLAN</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('store.memorial')}}" method="POST" class="memorial-form" enctype="multipart/form-data" id="regForm">
                    @csrf
                    <p class="memorial-form__text">
                        Create beautiful memories of your loved ones share stories, photos and write tributes to preserve their legacies.
                    </p>
                    <div class="memorial-form__form-fields">
                        <div class="memorial-form__form-group">
                            <input type="text" name="name" class="memorial-form__input" placeholder="Full Name">
                        </div>
                        <div class="memorial-form__form-group">
                            <select class="memorial-form__select" name="gender">
                                <option selected disabled>Gender</option>
                                <option value="male">Male</option>
                                <option value="male">Female</option>
                            </select>
                        </div>
                        <div class="memorial-form__form-group">
                            <select class="memorial-form__select" name="relationship">
                                <option selected disabled>Relationship</option>
                                  <option value="Aunt">Aunt</option>
                        <option value="Brother">Brother</option>
                        <option value="Boyfriend">Boyfriend</option>
                        <option value="Colleague">Colleague</option>
                        <option value="Cousin">Cousin</option>
                        <option value="Daughter">Daughter</option>
                        <option value="Father">Father</option>
                        <option value="Friend">Friend</option>
                        <option value="Girlfriend">Girlfriend</option>
                        <option value="Granddaughter">Granddaughter</option>
                        <option value="Grandfather">Grandfather</option>
                        <option value="Grandmother">Grandmother</option>
                        <option value="Grandson">Grandson</option>
                        <option value="Inlaw">Inlaw</option>
                        <option value="Husband">Husband</option>
                        <option value="Mother">Mother</option>
                        <option value="Nephew">Nephew</option>
                        <option value="Niece">Niece</option>
                        <option value="Girlfriend">Sister</option>
                        <option value="Son">Son</option>
                                <option value="male">Single</option>
                                <option value="male">Married</option>
                                <option value="male">Divorced</option>
                            </select>
                        </div>
                        <div class="memorial-form__form-group">
                            <input type="text" id="datepicker" class="memorial-form__input" placeholder="Date of Birth" name = "born_date"  >
                            <select id="format" hidden>
    <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
  </select>
   <select hidden id="anim">
    <option value="blind">Blind (UI Effect)</option>
  </select>
                        </div>
                        <div class="memorial-form__form-group">
                            <input type="text" id="datepicker2" class="memorial-form__input" placeholder="Date of Death" name = "death_date"  >         <select id="format" hidden>
    <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
  </select>
   <select hidden id="anim">
    <option value="blind">Blind (UI Effect)</option>
  </select>
                        </div>
                        <div class="memorial-form__form-group">
                            <div class="upload-contain">
                                <input type="file" id="real-file-2" name="picture" hidden="hidden" accept="image/png, image/jpg, image/jpeg"/>
                                <button type="button" id="custom-button-2">Upload Image</button>
                                <span id="custom-text-2">No file chosen, yet.</span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="next-page">
                    <input type="submit" class="next-btn" value="Next Step">
                </div>
            </div>
        </div>

        <div class="memorial-step">
            <div class="create-memorial-container container-col-2">
                <div class="steps">
                    <h6 class="steps__text">
                        SETUP MEMORIAL FOR YOUR LOVED ONE
                    </h6>
                    <div class="steps__progress-bar">
                        <div class="steps__progress">
                            <div class="steps__progress-fill steps__progress-fill--2"></div>
                        </div>
                        <p class="steps__step">2 of 2</p>
                    </div>
                    <div class="steps__details">
                        <div class="steps__details-box">
                            <img src="../../assets/img/create-memorial-icon3.svg" class="steps__details-icon">
                            <p class="steps__details-text steps__details-text--2">DECEASED DETAILS</p>
                            <span class="steps__line"></span>
                        </div>
                        <div class="steps__details-box">
                            <img src="../../assets/img/create-memorial-icon4.svg" class="steps__details-icon">
                            <p class="steps__details-text steps__details-text--1">PAYMENT PLAN</p>
                        </div>
                    </div>
                </div>

                <div class="steps-card">
                    <p class="memorial-form__text">
                        Create beautiful memories of your loved ones share stories, photos and write tributes to preserve their legacies.
                    </p>

                    {{-- Free --}}
                    <div class="pricing-cards pricing-container grid grid--3-cols">
                        <div class="card card--light card--create">
                            <h3 class="card__heading card__heading--create">Free</h3>
                            <h4 class="card__subheading card__subheading--create">Freemium</h4>
                            <p class="card__text card__text--create">
                                Create a free duration memorial, and enjoy limited benefits
                            </p>

                            <ul class="card__list">
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>One tribute</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>One Month</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>Three Images,One story</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>Tribute song</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>No ads</p>
                                </li>
                            </ul>

                            <a href="#" onclick="payWithPaystack('free', '0', '{{ \Illuminate\Support\Str::random(32) }}')" class="card-button-light-create">Choose plan</a>
                        </div>
{{-- end Free --}}

{{-- Start Yearly --}}
                        <div class="card card--filled card--create">
                            <p class="card__tag card__tag--create">MOST POPULAR</p>
                            <h3 class="card__heading--filled card__heading--create">&#8358;2,500</h3>
                            <h4 class="card__subheading--filled card__subheading--create">Yearly</h4>
                            <p class="card__text card__text--filled card__text--create">
                                Create a free duration memorial, and enjoy limited benefits
                            </p>

                            <ul class="card__list">
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p class="item-filled">One tribute</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p class="item-filled">One Month</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p class="item-filled">Three Images,One story</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p class="item-filled">Tribute song</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p class="item-filled">No ads</p>
                                </li>
                            </ul>

                            <a  onclick="payWithPaystack('yearly', '2500', '{{ \Illuminate\Support\Str::random(32) }}')" class="card-button-white-create">Choose plan</a>
                        </div>
                        

{{-- ENd Yearly --}}


{{-- Start Lifetime --}}
                        <div class="card card--light card--create">
                            <h3 class="card__heading card__heading--create">&#8358;20,000</h3>
                            <h4 class="card__subheading card__subheading--create">Lifetime</h4>
                            <p class="card__text card__text--create">
                                Create a lifetime memorial, and enjoy unlimited benefit
                            </p>

                            <ul class="card__list">
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>One tribute</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>Lifetime</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>Unlimited images & stories</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>Tribute song</p>
                                </li>
                                <li class="card__list-item">
                                    <img src="{{asset('assets/img/check-light.svg')}}">
                                    <p>No ads</p>
                                </li>
                            </ul>
                        <a  onclick="payWithPaystack('lifetime', '20000', '{{ \Illuminate\Support\Str::random(32) }}')" class="card-button-light-create">Choose plan</a>
                    </div>


                    {{-- ENd Lifetime --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{-- Use a paypal payment api for austrailian users, or whatever payment gateway the country uses --}}
{{-- Paystacks for nigeria, paypal for other countries --}}
    <script>
        function getText() {
            var first = document.getElementById('firststone').value
            var first1 = first.toLowerCase()
            var last = document.getElementById('laststone').value
            var last1 = last.toLowerCase()
            var domain = document.querySelector('#domain')
            domain.defaultValue = `${first1}-${last1}`
        }
    </script>
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script>
    function payWithPaystack(plan_type,amount, ref) {
        var amt = amount * 100;
        var plan_type = plan_type;
        var amt_save = amt / 100;

        if (plan_type === 'free') {
            $('#reference').val(ref);
            $('#amount').val(amt_save);
            $('#plan_type').val(plan_type);
            $('form#regForm').submit();
        } else {
            var handler = PaystackPop.setup({
                key: 'pk_test_09abaa510b84686d8d0c199ce9531734a4c8d3d0', // Replace with your public key
                email: '{{ auth()->user()->email }}',// document.getElementById("email").value,
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
                callback: function (response) {
                    if (response.message === 'Approved') {
                        $('#reference').val(response.reference);
                        $('#amount').val(amt_save);
                        $('#plan_type').val(plan_type);
                        $('form#regForm').submit();
                    }
                }
            });
            handler.openIframe();
        }
    }

//     </script>

@endsection

{{--pk_live_ff3cd9123388bf5c4ccfe3c2aa36140125f3f048--}}
