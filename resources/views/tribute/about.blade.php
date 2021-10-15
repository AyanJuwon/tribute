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
    TributeToAloveOne.com - About Us
@endsection
@section('css')
    
@endsection
@section('content')
   <div class="about-top">
            <h2 class="about-heading">ABOUT US</h2>
        </div>

        <section class="section-what-we-do">
            <div class="container">
                <h2 class="section-heading">What We Do</h2>
                <p class="section-sub-heading">About Create Tribute</p>

                <div class="top-content grid grid--2-cols">
                    <div class="top-content__left">
                        <h3 class="content-heading">Preserving Legacies of Our Loved Ones</h3>
                        <p class="content-text">
                            Each online memorial comes with features that enable family, friends, and love ones to digitally celebrate the life of their loved ones, by sharing the memories, tributes, and stories of those that have passed away. Creators of each memorial have full control over the memorials they create, some of the features include; About the departed, the life history, birth and death dates, the image, other gallery images of the deceased with members of the family, and a tribute song.
                            <br><br>
                            Each memorial created comes with subscription packages of free, yearly, and lifetime plans, which ensures every memorial stays active for the duration selected by the user.
                            <br><br>
                            Create Tribute is a product of Codefixbug limited, a software company located in Nigeria, its goal is to provide simplified solutions that solve problems in Nigeria, Africa, and around the world. Create Tribute is an indigenous platform, created for the greater good of preserving the legacies of people around the world.
                            <br><br>
                            Amy Winehouse in her Back To Black song said "We only said goodbye with words", we got inspired by this to create the platform where people can come together to say goodbye to their loved ones in words, written and shared, which would bring smiles or tears to those who read the tributes and stories.
                        </p>
                    </div>
                    <div class="top-content__right">
                        <img src="{{asset('assets/img/about-img-1.png')}}" alt="About Image">
                    </div>
                </div>

                <div class="bottom-content grid grid--2-cols">
                    <div class="bottom-content__left">
                        <img src="{{asset('assets/img/about-img-2.png')}}" alt="About Image">
                    </div>
                    <div class="bottom-content__right">
                        <h3 class="content-heading">Our Mission Statement</h3>
                        <p class="content-text">
                            Our mission is to create an online memorial website where tributes, stories, and photos from families and friends are shared. We hope you get value using createtribute.com.
                            We consider it an honor, to serve you and your family, during a difficult time of losing a loved one
                            <br><br>
                            Thank you for trusting us to preserve the legacies of those you love
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
 

@endsection
