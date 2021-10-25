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
    Manage Memorial
@endsection
@section('description')
    <meta name="description" content="Stories">
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
    <script type="module" src="{{asset('assets/js/manageMemorials.js')}}" defer></script>
{{--    <!-- Main Quill library -->--}}

    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endsection
@section('content')
 <main>
            
            <section class="dashboard profile-container profile-container--pages">
     {{-- <form > --}}
                <form method="POST" id="memorialForm" action="{{route('user.completeMemorial', $memorial->slug)}}" enctype="multipart/form-data" class="memorial-form">
                    @csrf
                    <div class="dashboard-top">
                        <h4 class="profile-heading">Memorial</h4>
                        <div class="memorial-form__buttons">
                            {{-- <input type="file" class="memorial-form__button memorial-form__button--save" value="post image" name="img"> --}}
                            <button type="button" onclick="submitForm()" class="memorial-form__button memorial-form__button--publish" value="Publish">Publish</button>
                        </div>
                    </div>

                    <div class="manage-memorial">
                        <div class="manage-memorial__left">
                            <div class="top-manage">
                                <div class="memorial-search">
                                    <input type="text" class="memorial-search__input" placeholder="Search memorial">
                                </div>
                                <div class="memorial-permalink">
                                    <p class="memorial-permalink__text">Permalink:</p>
                                    <a href="#" id="copy-content-2" class="copy-text">{{$memorial->slug}}/createtribute.com</a>
                                    <button id="btn-copy">
                                        <img src="/assets/img/copy-icon.svg" alt="Copy Icon">
                                    </button>
                                </div>
                            </div>

                            <div class="memorial-editor">
                                <h4 class="profile-heading">About</h4>
                                <p class="memorial-editor__sub">Create a short biography</p>
                                
                                        <input type="hidden" name ="about">
                                    <div id="editor-about" name="about">
        
                                </div>
                            </div>

                            <div class="memorial-editor">
                                <h4 class="profile-heading">Life History</h4>
                                <p class="memorial-editor__sub">Create detailed life history</p>
                                
                                        <input type="hidden" name ="life">
                                    <div id="editor-life" name="life">
                                            
        <p>{{$life->life}}</p>
                                       
                                    </div>
                            </div>

                            <div class="memorial-editor">
                                <h4 class="profile-heading">Gallery</h4>
                                <p class="memorial-editor__sub">Upload images</p>
                                <div class="upload-image">
                                    <div class="upload-image__button">
                                        <div class="upload-button">
                                            <div class="#">
{{--                                                <form method="POST" action="{{route('image.save', $memorial->slug)}}">--}}
                                                <input type="file" name="image[]" multiple hidden="hidden" id="files" >
                                                <button type="button" id="state">
                                                    <img src="/assets/img/add-image-icon.svg" class="btnImg">
                                                    <span>Add Image</span>
                                                </button>
{{--                                            </form>--}}
                                                <!-- <p id="state">Add an image</p> -->
                                                <div id="list"></div>
                                                <a href="#" id="deleteImgs">
                                                    <img src="/assets/img/delete-icon.svg">
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="upgrade">
                                        <p class="upgrade__text">
                                            You are currently subscribe to a free plan. Upgrade your subscription to add more images to gallery
                                        </p>
                                        <a href="#" class="upgrade__link">Upgrade Subscription</a>
                                    </div> -->
                                </div>
                            </div>

                            <div class="memorial-editor">
                                <h4 class="profile-heading">Stories</h4>
                                <p class="memorial-editor__sub">Upload image and add description</p>
                                <button class="add-story">
                                    <img src="/assets/img/add-image-icon.svg">
                                    <span>Add a story</span>
                                </button>
                                <div class="story-container hide">
                                        
                                        <input type="hidden" name ="story">
                                        <div id="editor-story" name="story"></div>
                                        <div class="story-attach">
                                            <input type="file" id="real-file" name="story_image" hidden="hidden" id="files" accept="image/png, image/jpg, image/jpeg"/>
                                            <button type="button" onclick="" id="custom-button">
                                                <img src="/assets/img/attach-icon.svg">
                                                <span>Attach Image</span>
                                                <span id="custom-text">No image attached yet.</span>
                                            </button>
                                        </div>
                                    
                                </div>

                                <div class="upgrade">
                                    <p class="upgrade__text">
                                        You are currently subscribe to a free plan. Upgrade your subscription to add more stories
                                    </p>
                                    <a href="#" class="upgrade__link">Upgrade Subscription</a>
                                </div>
                            </div>
                        </div>
                        <div class="manage-memorial__right">
                            <div class="preview-card">
                                <div class="preview-card__top">
                                    <a href="#" class="preview-card__preview-link">
                                        <img src="/assets/img/preview-icon.svg" class="preview-card__preview-icon">
                                        <span>Preview memorial</span>
                                    </a>
                                    <a href="#" class="preview-card__view-tributes">View Tributes</a>
                                </div>
                                <div class="preview-card__center">
                                    <div class="preview-card__contain">
                                        <p class="preview-card__text">Lifespan</p>
                                        <a href="#" class="preview-card__edit-details">Edit Details</a>
                                    </div>
                                    <p class="preview-card__date-created">Date created: {{$memorial->created_at->toDateString()}}</p>
                                    <p class="preview-card__expiring">Expiring: {{$memorial->expiry_date->todateString()}}</p>
                                </div>
                                <div class="preview-card__bottom">
                                    <p class="preview-card__text">Deceased Image</p>
                                </div>
                            </div>
                            <div class="share-card">
                                <div class="preview-card__top">
                                     <p class="preview-card__text">Share Memorial</p>
                                </div>
                                <div class="share-card__center">
                                    <div class="card-share-memorial__content">
                                        <p class="card-share-memorial__text text-center">
                                            Share memorial with {{$memorial->first_name}}’s family and friends
                                        </p>
                                        <div class="card-share-memorial__socials">
                                            <a href="#" class="tribute-details__link"><img src="/assets/img/ig-memorial.svg" alt="instagram" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="/assets/img/whatsapp-memorial.svg" alt="whatsapp" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="/assets/img/whatsapp-memorial.svg" alt="twitter" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="/assets/img/facebook-memorial.svg" alt="facebook" class="tribute-details__icon"></a>
                                        </div>
                                        <div class="card-share-memorial__copy">
                                            <a href="#" id="copy-content">{{$memorial->slug}}/createtribute.com</a>
                                            <button id="btn-copy">
                                                <img src="/assets/img/copy-icon.svg" alt="Copy Icon">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="share-card__bottom">
                                    <div class="card-check">
                                        <div class="card-check__check">
                                            <label class="check-container">Public
                                                <input checked type="radio" value=true  name="visibility">
                                                <span class="checkmark"></span>
                                            </label>
                                            <p class="card-check__text">
                                                Anyone can post a tribute and stories under this memorial
                                            </p>
                                        </div>
                                        <div class="card-check__check">
                                            <label class="check-container">Private
                                                <input type="radio" value=false name="visibility">
                                                <span class="checkmark"></span>
                                            </label>
                                            <p class="card-check__text">
                                                Only people with the link can post a tribute and stories under this memorial
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-activities">
                                <div class="recent-activities__top">
                                    <p class="recent-activities__heading">Recent Activities</p>
                                </div>
                                <div class="recent-activities__bottom">
                                    <ul class="recent-activities__activities">
                                        <li class="recent-activities__activity">
                                            <p class="recent-activities__activity-text">
                                                One new tribute for Ademolawa Johnson
                                            </p>
                                            <div class="recent-activities__activity-details">
                                                <p class="recent-activities__activity-date">
                                                    28 June 2021
                                                </p>
                                                <span class="recent-activities__activity-status">New</span>
                                            </div>
                                        </li>
                                        <li class="recent-activities__activity">
                                            <p class="recent-activities__activity-text">
                                                You updated Ademolawa Johnson tribute
                                            </p>
                                            <div class="recent-activities__activity-details">
                                                <p class="recent-activities__activity-date">
                                                    28 June 2021
                                                </p>
                                                <!-- <span class="recent-activities__activity-status">New</span> -->
                                            </div>
                                        </li>
                                        <li class="recent-activities__activity">
                                            <p class="recent-activities__activity-text">
                                                Two new tribute for Ademolawa Johnson
                                            </p>
                                            <div class="recent-activities__activity-details">
                                                <p class="recent-activities__activity-date">
                                                    28 June 2021
                                                </p>
                                                <!-- <span class="recent-activities__activity-status">New</span> -->
                                            </div>
                                        </li>
                                        <li class="recent-activities__activity">
                                            <p class="recent-activities__activity-text">
                                                Ademolawa Johnson memorial will expire in six days
                                            </p>
                                            <div class="recent-activities__activity-details">
                                                <p class="recent-activities__activity-date">
                                                    28 June 2021
                                                </p>
                                                <!-- <span class="recent-activities__activity-status">New</span> -->
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    @include('partials.error')
                  @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            </section>
        </main>
@endsection

@section('script')
    <script type="module" src="{{asset('assets/js/manageMemorials.js')}}">
    </script>
    
    <script>
var quill_about = new Quill('#editor-about', {
  modules: {
    toolbar: [
      ['bold', 'italic'],
      ['link', 'blockquote', 'code-block', 'image'],
      [{ list: 'ordered' }, { list: 'bullet' }]
    ]
  },
  placeholder: '{{$memorial->main_section_text}}',
  theme: 'snow'
});


        var quill_life = new Quill('#editor-life', {modules: {
    toolbar: [
      ['bold', 'italic'],
      ['link', 'blockquote', 'code-block', 'image'],
      [{ list: 'ordered' }, { list: 'bullet' }]
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'
});
var quill_story= new Quill('#editor-story', {
  modules: {
    toolbar: [
      ['bold', 'italic'],
      ['link', 'blockquote', 'code-block', 'image'],
      [{ list: 'ordered' }, { list: 'bullet' }]
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'
});
  console.log('i dey work');
var form = document.querySelector('#memorialForm');
function submitForm() {
  // Populate hidden form on submit
  
  var image = document.querySelector('input[name=image]');
  var story_image = document.querySelector('input[name=story_image]');
  var about = document.querySelector('input[name=about]');
  var story = document.querySelector('input[name=story]');
  var life = document.querySelector('input[name=life]');
  about.value = quill_about.container.children[0].innerHTML;
  story.value =quill_story.container.innerText;
  life.value = quill_life.container.children[0].innerHTML;
  
  form.submit();
};
    </script>
@endsection
