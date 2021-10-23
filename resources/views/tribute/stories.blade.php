<?php
/**
 * tribute
 * Olamiposi
 * 13/10/2020
 * 20:45
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Stories
@endsection
@section('description')
    <meta name="description" content="Stories">
@endsection
@section('css')
 
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <script type="module" src="{{asset('assets/js/memorialView.js')}}" defer></script>
@endsection
@section('content')
 <main>
            <section class="dashboard profile-container">
                <div class="manage-story-top">
                    <h4 class="profile-heading">Stories</h4>
                    <p class="manage-tribute-top__subheading">
                        Stories you have written for other memorials
                    </p>
                </div>

                <div class="sub-container">
                    <div class="tribute-cards">

                        @foreach ($stories as $story )
                            
                        
                        <div class="story-card">
                            <div class="story-card__memory-contain">
                                <div class="story-card__memory">
                                    <p class="story-card__memory-of">In memory of</p>
                                    <img src="/assets/img/memorial-img-1.png" class="story-card__memory-img">
                                    <p class="story-card__memory-name">
                                    {{ $story->getmemorialDetailsBySlug($story->slug)->first_name}} 
                                    {{ $story->getmemorialDetailsBySlug($story->slug)->last_name}}</p>
                                </div>
                            </div>
                            <div class="story-card__body-story">
                                @if ($story->image)

                                    <div class="story-card__body-left">
                                    <img src="/assets/img/story-image.png" alt="Story Image" class="story-card__story-img">
                                </div>
                                @endif
                                
                                <div class="story-card__body-right">
                                    <div class="story-card__header">
                                        <p class="story-card__initials">NJ</p>
                                        <div class="story-card__info">
                                            <p class="story-card__from">From</p>
                                            <h6 class="story-card__fullname">{{auth()->user()->name}}</h6>
                                        </div>
                                        <p class="story-card__date">{{$story->created_at}}</p>
                                        <img src="/assets/img/more-icon.svg" class="story-card__more-icon">
                                        <div class="story-card__more-menu-img hide">
                                            <p class="story-card__more-menu-option">Edit</p>
                                            <p class="story-card__more-menu-option">Delete</p>
                                            <p class="story-card__more-menu-option">Hide from public</p>
                                        </div>
                                    </div>
                                    <div class="story-card__post">
                                        <p class="memorial-card-content">
                                           {{$story->story}}
                                        </p>
                                        <button class="memorial-card-button">Read More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      @endforeach
                        
                        
                    </div>
                </div>
            </section>
        </main>
@endsection

@section('script')
                
@endsection
