<?php
/**
 * tribute2
 * Olamiposi
 * 26/11/2020
 * 19:40
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    Tribute - Memorial
@endsection
@section('css')
    
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
    <script type="module" src="{{asset('assets/js/memorialUser.js')}}" defer></script>
    <script type="module" src="{{asset('assets/js/memorialView.js')}}" defer></script>
@endsection
@section('content')
<div class="memorial-view-panel">
            <div class="panel-container">
                <div class="panel-box">
                    <div class="panel-box__left">
                        <img src="{{asset('assets/img/panel-img.png')}}" alt="Tribute" class="panel-box__img">
                    </div>
                    <div class="panel-box__right">
                        <h4 class="panel-box__fullname">{{$detail->first_name. ' ' .$detail->last_name}}</h4>
                        <p class="panel-box__date">{{$detail->born_date->toDateString()}} - {{$detail->passed_away_date->toDateString()}}</p>
                    </div>
                    <div class="panel-box__tab">
                        <ul class="panel-box__tab-container">
                            <li class="panel-box__tab-name active" data-tab-target="#about">About</li>
                            <li class="panel-box__tab-name" data-tab-target="#life">Life</li>
                            <li class="panel-box__tab-name" data-tab-target="#gallery">Gallery</li>
                            <li class="panel-box__tab-name" data-tab-target="#story">Story</li>
                            <li class="panel-box__tab-name" data-tab-target="#tribute">Tribute</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="memorial-view-container">
                <div id="about" data-tab-content class="active">
                    <div class="memorial-view-content">
                        <div class="memorial-view-top">
                            <p class="tribute__initials">{{App\Memorial::getInitials($detail->users->name)}}</p>
                            <div class="tribute__poster">
                                <h6 class="tribute__name">{{$detail->users->name}}</h6>
                                <div class="tribute__line">
                                    <p class="tribute__user">{{$detail->users->role}}</p>
                                    <span class="dot-status"></span>
                                    <div class="tribute__date">{{$detail->created_at->toDateString()}}</div>
                                </div>
                            </div>
                        </div>
    
                        <div class="about-content__main">
                            <div class="memorial-view">
                                <div class="memorial-view__left">
                                    <h5 class="memorial-view-heading">In Memory of {{$detail->first_name. ' ' .$detail->last_name}}</h5>
                                    <div class="memorial-view__contain">
                                        <blockquote class="memorial-view__quote">
                                            <i>" {{$detail->personal_phrase}}"</i>
                                        </blockquote>
                                        <p class="memorial-view__text">
                                            {!! $detail->main_section_text !!}
                                        </p>
                                    </div>
                                </div>
                              @include('partials.memorial')
                            </div>
                        </div>

                        <div class="memorial-view-bottom">
                            <h5 class="memorial-view-heading">Post a tribute</h5>
                            @if (auth()->user())
                                 <form method="POST" action="{{ route('tributes.save', $detail->slug) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-group accordion" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="accordion-heading">
                                                        <h4 class="accordion-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                                Type your Tribute
                                                                <i class="indicator fa fa-chevron-down"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" cols="30" rows="10" placeholder="Type your Tribute......" name="tribute"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="accordion-heading">
                                                        <h4 class="accordion-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                Or Upload Documents, Only (*.docx, *.doc, *.pdf, *.txt) formats
                                                                <i class="indicator fa fa-chevron-right"></i></a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Upload your tribute (document) </label>
                                                                    <br><br>
                                                                    <input name="docs" type="file" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @else
                            <p class="memorial-view-login">
                                <a href="#" class="memorial-view-link">Log in</a>
                                to post a tribute for {{$detail->first_name. ' ' .$detail->last_name}}
                            </p>@endif
                        </div>
                    </div>
                </div>

                <div id="life" data-tab-content>
                    <div class="memorial-view-content">
                        <div class="memorial-view-top">
                            <p class="tribute__initials">{{App\Memorial::getInitials($detail->users->name)}}</p>
                            <div class="tribute__poster">
                                <h6 class="tribute__name">{{$detail->users->name}}</h6>
                                <div class="tribute__line">
                                    <p class="tribute__user">{{$detail->users->role}}</p>
                                    <span class="dot-status"></span>
                                    <div class="tribute__date">{{$detail->created_at->toDateString() }}</div>
                                </div>
                            </div>  
                        </div>
    
                        <div class="about-content__main">
                            <div class="memorial-view">
                                <div class="memorial-view__left">
                                    <h5 class="memorial-view-heading">Life of {{$detail->first_name. ' ' .$detail->last_name}}</h5>
                                    <div class="memorial-view__contain">
                                        <p class="memorial-view__text">
                                            {!! $life->life !!} 
                                        </p>
                                    </div>
                                </div>
                                @include('partials.memorial')
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="gallery" data-tab-content>
                    <div class="memorial-view-content">
                        <div class="memorial-view-top">
                            <p class="tribute__initials">{{App\Memorial::getInitials($detail->users->name)}}</p>
                            <div class="tribute__poster">
                                <h6 class="tribute__name">{{$detail->users->name}}</h6>
                                <div class="tribute__line">
                                    <p class="tribute__user">{{$detail->users->role}}</p>
                                    <span class="dot-status"></span>
                                    <div class="tribute__date">{{$detail->created_at->toDateString()}}</div>
                                </div>
                            </div>
                        </div>
    
                        <div class="about-content__main">
                            <div class="memorial-view">
                                <div class="memorial-view__left">
                                    <h5 class="memorial-view-heading">Gallery</h5>
                                    <div class="memorial-view__contain">
                                       <div class="gallery-wrapper">
                                           <div class="gallery">
                                               @foreach($images as $image)

                                                <div class="gallery__item">
                                                    <a href="{{$image->image}}}" data-lightbox="tribute-imgs">
                                                        <img src="{{$image->image}}" alt="Tribute Image">
                                                    </a>
                                               </div>
                                               @endforeach
                                               
                                           </div>
                                           <!-- <div class="preview-box">
                                               <div class="preview-box__details">
                                                   <span class="preview-box__title">Gallery</span>
                                               </div>
                                               <div class="preview-box__img-box">
                                                   <div class="preview-box__slides">
                                                    <div class="preview-box__prev">
                                                        <img class="preview-box__icon" src="../../assets/img/prev.svg">
                                                    </div>
                                                    <div class="preview-box__next">
                                                        <img class="preview-box__icon" src="../../assets/img/next.svg">
                                                    </div>
                                                   </div>
                                                   <img class="preview-box__image" src="../../assets/img/img-3.jpg" alt="">
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                               @include('partials.memorial')
                        </div>
                        <div class="memorial-view-bottom">

                            
                            <h5 class="memorial-view-heading">Post an Image</h5>
                            @if (!auth()->user())
                            <p class="memorial-view-login">
                                <a href="{{route('login')}}" class="memorial-view-link">Log in</a>
                                to post a tribute for {{$detail->first_name. ' ' .$detail->last_name}}
                            </p>
                            @else
                            <form method="POST" action="{{ route('image.save', $detail->slug) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="panel-group accordion" id="accordion">
                                                                    <div class="panel panel-default">
                                                                        <div class="accordion-heading">
                                                                            <h4 class="accordion-title">
                                                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                                                    Image
                                                                                    <i class="indicator fa fa-chevron-down"></i>
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                                                            <div class="panel-body">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <div class="form-group">
                                                                                        <input type="file" name="image" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                            
                        
                            @endif
</div>
                    </div>
                </div>
            </div>

            <div id="story" data-tab-content>
                <div class="memorial-view-content">
                    <div class="memorial-view-top">
                        <p class="tribute__initials">{{$detail->getInitials($detail->users->name)}}</p>
                        <div class="tribute__poster post-link">
                            <h6 class="tribute__name">{{$detail->users->name}}</h6>
                            <div class="tribute__line">
                                <p class="tribute__user">{{$detail->users->role}}</p>
                                <span class="dot-status"></span>
                                <div class="tribute__date">{{$detail->created_at->toDateString()}}</div>
                            </div>
                        </div>
                        <div class="top-link">
                            <a href="#" class="post-tribute">Post Tribute</a>
                        </div>
                    </div>

                    <div class="about-content__main">
                        <div class="memorial-view">
                            <div class="memorial-view__left">
                                <h5 class="memorial-view-heading">Stories</h5>
                                <div class="memorial-view__contain">
                             
                                        @foreach($stories as $story)       
                                    <div class="story-card">
                                        <!-- <div class="story-card__memory-contain">
                                            <div class="story-card__memory">
                                                <p class="story-card__memory-of">In memory of</p>
                                                <img src="../../assets/img/memorial-img-1.png" class="story-card__memory-img">
                                                <p class="story-card__memory-name">Olufemi Samson</p>
                                            </div>
                                        </div> -->
                                        <div class="story-card__body-story">
                                            @if ($story->image)
                                              <div class="story-card__body-left">
                                                <img src="{{asset('uploads/story/'.$story->image)}}" alt="Story Image" class="story-card__story-img">
                                            </div>   
                                            @endif
                                           
                                            <div class="story-card__body-right">
                                                <div class="story-card__header">
                                                    <p class="story-card__initials">{{App\Memorial::getInitials($story->user->name)}}</p>
                                                    <div class="story-card__info">
                                                        <p class="story-card__from">From: 
                                                        <h6 class="story-card__fullname">{{$story->user->name}}</h6></p>
                                                    </div>
                                                    <p class="story-card__date">{{$story->created_at->toDateString()}}</p>
                                                    <!-- <img src="../../assets/img/more-icon.svg" class="story-card__more-icon">
                                                    <div class="story-card__more-menu-img hide">
                                                        <p class="story-card__more-menu-option">Edit</p>
                                                        <p class="story-card__more-menu-option">Delete</p>
                                                        <p class="story-card__more-menu-option">Hide from public</p>
                                                    </div> -->
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
                                <div class="btn-box">
                                    <a href="#" class="load-tributes-button">Load More Tributes...</a>
                                </div>
                            </div>
                         @include('partials.memorial')
                    </div>
                </div>
                <div class="memorial-view-bottom">
                    
                            <h5 class="memorial-view-heading">Post a Story</h5>
                            @if (!auth()->user())
                            <p class="memorial-view-login">
                                <a href="{{route('login')}}" class="memorial-view-link">Log in</a>
                                to post a tribute for {{$detail->first_name. ' ' .$detail->last_name}}
                            </p>
                            @else
                           <form method="POST" action="{{ route('stories.save', $detail->slug) }}" class="post-form" enctype="multipart/form-data">
                                    @csrf

                                      <div class="post-field">
                            <textarea name="story" cols="30" rows="10" class="post-text" placeholder="Tell a story.."></textarea>
                            <div class="post-group">
                                <div class="post-attach">
                                    <input type="file" id="post-file" name="image" hidden="hidden" id="files" accept="image/png, image/jpg, image/jpeg"/>
                                    <button type="button" id="post-button">
                                        <img src="/assets/img/attach-icon.svg">
                                        <span>Attach Image</span>
                                        <span id="post-text">No image attached yet.</span>
                                    </button>
                                </div>
                                <input type="submit" class="post-submit" value="Post">
                            </div>
                        </div>
                                </form>
                            @endif
                </div>
            </div>
            </div>
            <div id="tribute" data-tab-content>
                <div class="memorial-view-content">
                    <div class="memorial-view-top">
                        <p class="tribute__initials">{{App\Memorial::getInitials($detail->users->name)}}</p>
                        <div class="tribute__poster post-link">
                            <h6 class="tribute__name">{{$detail->users->name}}</h6>
                            <div class="tribute__line">
                                <p class="tribute__user">{{$detail->users->role}}</p>
                                <span class="dot-status"></span>
                                <div class="tribute__date">{{$detail->created_at->toDateString()}}</div>
                            </div>
                        </div>
                        <div class="top-link">
                            <a href="#" class="post-tribute">Post Tribute</a>
                        </div>
                    </div>

                    <div class="about-content__main">
                        <div class="memorial-view">
                            <div class="memorial-view__left">
                                <h5 class="memorial-view-heading">Tributes</h5>
                                <div class="memorial-view__contain">
                                    @foreach ($tributes as $tribute )
                                        
                                  
                                    <div class="tribute-view-card">
                                        <!-- <div class="tribute-view-card__memory-contain">
                                            <div class="tribute-view-card__memory">
                                                <p class="tribute-view-card__memory-of">In memory of</p>
                                                <img src="../../assets/img/memorial-img-1.png" class="tribute-view-card__memory-img">
                                                <p class="tribute-view-card__memory-name">Olufemi Samson</p>
                                            </div>
                                        </div> -->
                                        <div class="tribute-view-card__body-tribute-view">
                                            <div class="tribute-view-card__body-no-image">
                                                <div class="tribute-view-card__header">
                                                    <p class="tribute-view-card__initials">{{App\Memorial::getInitials($tribute->users->name)}}</p>
                                                    <div class="tribute-view-card__info">
                                                        <p class="tribute-view-card__from">From</p>
                                                        <h6 class="tribute-view-card__fullname">{{$tribute->user->name}}</h6>
                                                    </div>
                                                    <p class="tribute-view-card__date">{{$tribute->created_at->toDateSTring()}}</p>
                                                    <div class="test">
                                                        
                                                    </div>
                                                    <!-- <img src="../../assets/img/more-icon.svg" class="tribute-view-card__more-icon-noImg">
                                                    <div class="tribute-view-card__more-no-img hide">
                                                        <p class="tribute-view-card__more-menu-option-2">Edit</p>
                                                        <p class="tribute-view-card__more-menu-option-2">Delete</p>
                                                        <p class="tribute-view-card__more-menu-option-2">Hide from public</p>
                                                    </div> -->
                                                </div>
                                                <div class="tribute-view-card__post">
                                                    <p class="memorial-card-content">
                                                        {{$tribute->tribute}}
                                                    </p>
                                                    <button class="memorial-card-button">Read More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  @endforeach
                                   
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="load-tributes-button">Load More Tributes...</a>
                                </div>
                            </div>
                         @include('partials.memorial')
                    </div>
                </div>
                <div class="memorial-view-bottom">
                            <h5 class="memorial-view-heading">Post a tribute</h5>
                            @if (auth()->user())
                                 <form method="POST" action="{{ route('tributes.save', $detail->slug) }}" class= "postf-orm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-group accordion" id="accordion">
                                                 <div class="post-field">
                            <textarea name="tribute" cols="30" rows="10" class="post-text" placeholder="Tell a story.."></textarea>
                            <div class="post-group">
                                <input type="submit" class="post-submit" value="Post">
                            </div>
                        </div>
                                                <div class="panel panel-default">
                                                    <div class="accordion-heading">
                                                        <h4 class="accordion-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                Or Upload Documents, Only (*.docx, *.doc, *.pdf, *.txt) formats
                                                                <i class="indicator fa fa-chevron-right"></i></a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Upload your tribute (document) </label>
                                                                    <br><br>
                                                                    <input class="post-submit" name="docs" type="file" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @else
                            <p class="memorial-view-login">
                                <a href="#" class="memorial-view-link">Log in</a>
                                to post a tribute for {{$detail->first_name. ' ' .$detail->last_name}}
                            </p>@endif
                        </div> 
                
            </div>
        </div>





@endsection
