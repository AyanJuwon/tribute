<?php
/**
 * tribute2
 * Olamiposi
 * 23/11/2020
 * 22:31
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    Tribute - Home
@endsection
@section('css')
    
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/js/index.js')}}" defer></script>
@endsection
@section('content')
<main class="main">
      <section class="section-hero">
            <div class="hero-container">
                <div class="hero-container__left">
                    <h2 class="hero-header">Celebrate the<br>life of loved ones</h2>
                    <p class="hero-text">
                        Create beautiful memories of your loved ones, share stories, photos, send condolences and write tributes to preserve their legacies.
                    </p>
                    <a href="#" class="hero-btn">Create A Memorial</a>
                </div>
                <div class="hero-container__right">
                    <img src="{{asset('assets/img/hero-img.png')}}" alt="Hero" class="hero-img">
                </div>
            </div>
        </section>
    <section class="section-works">
            <h2 class="section-heading">How It Works</h2>
            <p class="section-sub-heading">
                Create an online memorial in few easy steps
            </p>

            <!-- <img src="./assets/img/arrow.svg" class="arrow--1">
            <img src="./assets/img/arrow.svg" class="arrow--2"> -->

            <div class="works-items grid grid--3-cols container">
                <div class="work-item">
                    <img src="./assets/img/works-1.svg" alt="Create Memorial" class="work-item__img">

                    <h4 class="work-item__heading">
                        Create A Memorial
                    </h4>
                    <p class="work-item__text">
                        By adding basic or detailed<br>information about your love one's
                    </p>
                </div>

                <div class="work-item">
                    <img src="./assets/img/works-2.svg" alt="Create Memorial" class="work-item__img">
                
                    <h4 class="work-item__heading">
                        Add Unlimited Content
                    </h4>
                    <p class="work-item__text">
                        Including photos, life history <br> and memorial song, etc                    
                    </p>
                </div>

                <div class="work-item">
                    <img src="./assets/img/works-3.svg" alt="Create Memorial" class="work-item__img">

                    <h4 class="work-item__heading">
                        Share Their Life Story
                    </h4>
                    <p class="work-item__text">
                        And allow friends and family members share
                        stories, images, and tribute messages
                    </p>
                </div>
            </div>

            <div class="legacy grid grid--2-cols container">
                <div class="legacy__left">
                    <img src="./assets/img/flowers.png" alt="Flowers" class="legacy__img">
                </div>
                <div class="legacy__right">
                    <h3 class="legacy__heading">
                        Preserving Legacies <br> of Our Loved Ones
                    </h3>
                    <p class="legacy__text">
                        Each online memorial comes with features that enable family, friends, and love ones to digitally celebrate the life of their loved ones, by sharing the memories, tributes, and stories of those that have passed away. Creators of each memorial have full control over the memorials they create, some of the features include; About the departed, the life history, birth and death dates, the image, other gallery images of the deceased with members of the family, and a tribute song.
                    </p>
                    <a href="#" class="legacy-btn">Learn More</a>
                </div>
            </div>
        </section>
        
         <section class="section-slider section-slider-container">
            <h3 class="section__header">Recent Memorials</h3>
    
            <div class="slides-container">
                <div class="slides slides--1">
                    <div class="slide">
                        <div class="memorial">
                            <div class="memorial__card">
                                <img src="./assets/img/pic.png" alt="" class="memorial__img">
                                <p class="memorial__text">Adewale Isreal</p>
                                <blockquote class="memorial__quote">
                                    Let the Memory of Adewale Isreal be with us forever
                                </blockquote>
                            </div>
                            <div class="memorial__details">
                                <p class="memorial__date">02/09/1980 - 19/08/2021</p>
                                <a href="#" class="memorial__link">Visit Memorial</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="slide">
                        <div class="memorial">
                            <div class="memorial__card">
                                <img src="./assets/img/pic.png" alt="" class="memorial__img">
                                <p class="memorial__text">Adewale Isreal</p>
                                <blockquote class="memorial__quote">
                                    Let the Memory of Adewale Isreal be with us forever
                                </blockquote>
                            </div>
                            <div class="memorial__details">
                                <p class="memorial__date">02/09/1980 - 19/08/2021</p>
                                <a href="#" class="memorial__link">Visit Memorial</a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="slides slides--2">
                    <div class="slide">
                        <div class="memorial">
                            <div class="memorial__card">
                                <img src="./assets/img/pic.png" alt="" class="memorial__img">
                                <p class="memorial__text">Adewale Isreal</p>
                                <blockquote class="memorial__quote">
                                    Let the Memory of Adewale Isreal be with us forever
                                </blockquote>
                            </div>
                            <div class="memorial__details">
                                <p class="memorial__date">02/09/1980 - 19/08/2021</p>
                                <a href="#" class="memorial__link">Visit Memorial</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="slide">
                        <div class="memorial">
                            <div class="memorial__card">
                                <img src="./assets/img/pic.png" alt="" class="memorial__img">
                                <p class="memorial__text">Adewale Isreal</p>
                                <blockquote class="memorial__quote">
                                    Let the Memory of Adewale Isreal be with us forever
                                </blockquote>
                            </div>
                            <div class="memorial__details">
                                <p class="memorial__date">02/09/1980 - 19/08/2021</p>
                                <a href="#" class="memorial__link">Visit Memorial</a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="slides slides--3">
                    <div class="slide">
                        <div class="memorial">
                            <div class="memorial__card">
                                <img src="./assets/img/pic.png" alt="" class="memorial__img">
                                <p class="memorial__text">Adewale Isreal</p>
                                <blockquote class="memorial__quote">
                                    Let the Memory of Adewale Isreal be with us forever
                                </blockquote>
                            </div>
                            <div class="memorial__details">
                                <p class="memorial__date">02/09/1980 - 19/08/2021</p>
                                <a href="#" class="memorial__link">Visit Memorial</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="slide">
                        <div class="memorial">
                            <div class="memorial__card">
                                <img src="./assets/img/pic.png" alt="" class="memorial__img">
                                <p class="memorial__text">Adewale Isreal</p>
                                <blockquote class="memorial__quote">
                                    Let the Memory of Adewale Isreal be with us forever
                                </blockquote>
                            </div>
                            <div class="memorial__details">
                                <p class="memorial__date">02/09/1980 - 19/08/2021</p>
                                <a href="#" class="memorial__link">Visit Memorial</a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="dots"></div>
            </div>
        </section>

        
<section class="section-pricing">
            <h2 class="section-heading">Pricing & Features</h2>
            <p class="section-sub-heading">Create an online memorial in few easy steps</p>

            <div class="pricing-cards pricing-container grid grid--3-cols">
                <div class="card card--light">
                    <h3 class="card__heading">Free</h3>
                    <h4 class="card__subheading">Freemium</h4>
                    <p class="card__text">
                        Create a free duration memorial, and enjoy limited benefits
                    </p>

                    <ul class="card__list">
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>One tribute</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>One Month</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>Three Images,One story</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>Tribute song</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>No ads</p>
                        </li>
                    </ul>

                    <a href="#" class="card-button-light">Choose plan</a>
                </div>

                <div class="card card--filled">
                    <p class="card__tag">MOST POPULAR</p>
                    <h3 class="card__heading--filled">&#8358;2,500</h3>
                    <h4 class="card__subheading--filled">Yearly</h4>
                    <p class="card__text card__text--filled">
                        Create a free duration memorial, and enjoy limited benefits
                    </p>

                    <ul class="card__list">
                        <li class="card__list-item">
                            <img src="./assets/img/check-filled.svg">
                            <p class="item-filled">One tribute</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-filled.svg">
                            <p class="item-filled">One Month</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-filled.svg">
                            <p class="item-filled">Three Images,One story</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-filled.svg">
                            <p class="item-filled">Tribute song</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-filled.svg">
                            <p class="item-filled">No ads</p>
                        </li>
                    </ul>

                    <a href="#" class="card-button-white">Choose plan</a>
                </div>
                
                <div class="card card--light">
                    <h3 class="card__heading">&#8358;20,000</h3>
                    <h4 class="card__subheading">Lifetime</h4>
                    <p class="card__text">
                        Create a lifetime memorial, and enjoy unlimited benefit
                    </p>

                    <ul class="card__list">
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>One tribute</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>Lifetime</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>Unlimited images & stories</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>Tribute song</p>
                        </li>
                        <li class="card__list-item">
                            <img src="./assets/img/check-light.svg">
                            <p>No ads</p>
                        </li>
                    </ul>

                    <a href="#" class="card-button-light">Choose plan</a>
                </div>
        </section>
<section class="section-safe container">
            <div class="section-safe__left">
                <h2 class="section-safe__heading">Safe and Secure</h2>
                <img src="./assets/img/safe.png" alt="Safe and secure" class="section-safe__img">
            </div>

            <div class="section-safe__right">
                <div class="security security--filled">
                    <img src="./assets/img/security-1.svg" alt="Data security" class="security__img">
                    <div class="security__contain">
                        <h6>Data Security</h6>
                        <p>
                            We prioritize protecting your data. Our secure servers ensure that no third-party is granted access to your personal information. We collect and use your personal data to constantly improve your user experience.
                        </p>
                    </div>
                </div>
                <div class="security security--light">
                    <img src="{{asset('assets/img/security-2.svg')}}" alt="Data security" class="security__img">
                    <div class="security__contain">
                        <h6>Bank Level Security</h6>
                        <p>
                            Our Payment processors are PCIDSS compliant to ensure optimum security of your data electronically and all payment transactions are encrypted and protected using 256-bit AES bank-level encryption.
                        </p>
                    </div>
                </div>
                <div class="security security--light">
                    <img src="./assets/img/security-3.svg" alt="Data security" class="security__img">
                    <div class="security__contain">
                        <h6>SSL Security</h6>
                        <p>
                            Create Tribute protects the security of your information with the latest encryption techniques and Secure Socket Layer(SSL) transmission protocol, this provides security between your devices and our servers ensuring your personal details are always kept private.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-cta">
            <h2 class="section-heading section-heading--white">
                Create A Memorial
            </h2>
            <p class="section-sub-heading section-sub-heading--white section-cta__text">
                Honor and remember those who have died, by creating an online memorial page, leave tributes, share stories, images and much more in few easy steps
            </p>
            <a href="#" class="cta-button">Create a Memorial</a>
        </section>

        <section class="section-faq">
            <h2 class="section-heading">Frequently Asked Questions?</h2>
            <p class="section-sub-heading">Have any question?</p>

            <div class="all-faq">
                <div class="all-faq__faq-tab faq">
                    <div class="all-faq__faq-contain">
                        <div class="all-faq__faq-question">How can I create an online memorial?</div>
                        <img src="./assets/img/arrow-down-sign.svg" class="all-faq__faq-icon">
                    </div>
                    <div class="all-faq__faq-answer">
                        <div class="all-faq__faq-content">
                            Click on the 'Sign Up' link at the top right of the page. You'll be asked to input some basic information about your loved one to get their memorial started. You will also have to fill out some information about yourself because you become the administrator of their memorial.
                        </div>
                    </div>
                </div>
                <div class="all-faq__faq-tab faq">
                    <div class="all-faq__faq-contain">
                        <div class="all-faq__faq-question">How much does an online memorial cost?</div>
                        <img src="./assets/img/arrow-down-sign.svg" class="all-faq__faq-icon">
                    </div>
                    <div class="all-faq__faq-answer">
                        <div class="all-faq__faq-content">
                            Click on the 'Sign Up' link at the top right of the page. You'll be asked to input some basic information about your loved one to get their memorial started. You will also have to fill out some information about yourself because you become the administrator of their memorial.
                        </div>
                    </div>
                </div>
                <div class="all-faq__faq-tab faq">
                    <div class="all-faq__faq-contain">
                        <div class="all-faq__faq-question">Can I make memorial private for family and friends?</div>
                        <img src="./assets/img/arrow-down-sign.svg" class="all-faq__faq-icon">
                    </div>
                    <div class="all-faq__faq-answer">
                        <div class="all-faq__faq-content">
                            Click on the 'Sign Up' link at the top right of the page. You'll be asked to input some basic information about your loved one to get their memorial started. You will also have to fill out some information about yourself because you become the administrator of their memorial.
                        </div>
                    </div>
                </div>    
                <div class="all-faq__faq-tab faq">
                    <div class="all-faq__faq-contain">
                        <div class="all-faq__faq-question">How can I share memorial via email</div>
                        <img src="./assets/img/arrow-down-sign.svg" class="all-faq__faq-icon">
                    </div>
                    <div class="all-faq__faq-answer">
                        <div class="all-faq__faq-content">
                            Click on the 'Sign Up' link at the top right of the page. You'll be asked to input some basic information about your loved one to get their memorial started. You will also have to fill out some information about yourself because you become the administrator of their memorial.
                        </div>
                    </div>
                </div>    
                <div class="all-faq__faq-tab faq">
                    <div class="all-faq__faq-contain">
                        <div class="all-faq__faq-question">How do I edit or remove memorial</div>
                        <img src="./assets/img/arrow-down-sign.svg" class="all-faq__faq-icon">
                    </div>
                    <div class="all-faq__faq-answer">
                        <div class="all-faq__faq-content">
                            Click on the 'Sign Up' link at the top right of the page. You'll be asked to input some basic information about your loved one to get their memorial started. You will also have to fill out some information about yourself because you become the administrator of their memorial.
                        </div>
                    </div>
                </div>    
                <div class="all-faq__faq-tab faq">
                    <div class="all-faq__faq-contain">
                        <div class="all-faq__faq-question">How do I customize or change memorial page URL or link</div>
                        <img src="./assets/img/arrow-down-sign.svg" class="all-faq__faq-icon">
                    </div>
                    <div class="all-faq__faq-answer">
                        <div class="all-faq__faq-content">
                            Click on the 'Sign Up' link at the top right of the page. You'll be asked to input some basic information about your loved one to get their memorial started. You will also have to fill out some information about yourself because you become the administrator of their memorial.
                        </div>
                    </div>
                </div>    
            </div>
        </section>  
   
 

@endsection
@section('script')
    <script>
        function showImage(src) {
            var img = document.getElementById("slider-1")
            img.src = src
        }

        // var myVar2;
        //
        // function loadSliders2() {
        //     myVar2 = setTimeout(showPage2, 1000);
        // }
        //
        // function showPage2() {
        //     document.getElementById("loader2").style.display = "none";
        //     document.getElementById("slider-home").style.display = "block";
        // }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script>
        var textWrapper = document.querySelector('.ml11 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
            .add({
                targets: '.ml11 .line',
                scaleY: [0,1],
                opacity: [0.5,1],
                easing: "easeOutExpo",
                duration: 700
            })
            .add({
                targets: '.ml11 .line',
                translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
                easing: "easeOutExpo",
                duration: 700,
                delay: 100
            }).add({
            targets: '.ml11 .letter',
            opacity: [0,1],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=775',
            delay: (el, i) => 34 * (i+1)
        }).add({
            targets: '.ml11',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
    </script>



@endsection
