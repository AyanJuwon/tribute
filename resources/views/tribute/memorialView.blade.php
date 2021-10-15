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
    Memorials
@endsection
@section('css')
    
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
                            <p class="tribute__initials">GA</p>
                            <div class="tribute__poster">
                                <h6 class="tribute__name">{{$detail->first_name. ' ' .$detail->last_name}}</h6>
                                <div class="tribute__line">
                                    <p class="tribute__user">{{auth()->user()->role}}</p>
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
                                            <i>"Let the Memory of {{$detail->last_name. ' ' .$detail->first_name}} be with us forever"</i>
                                        </blockquote>
                                        <p class="memorial-view__text">
                                            This memorial website was created in memory of our loved one, {{$detail->last_name. ' ' .$detail->first_name}} 80 years old , born on Sept 02, 1980 and passed away on Aug 19, 2021. We will remember him forever.
                                        </p>
                                    </div>
                                </div>
                                <div class="memorial-view__right">
                                    <div class="memorial-view-cards">
                                        <div class="card-share-memorial">
                                            <div class="card-share-memorial__top">
                                                <h6 class="card-heading">Share Memorial</h6>
                                            </div>
                                            <div class="card-share-memorial__content">
                                                <p class="card-share-memorial__text">
                                                    Share memorial with Johnson’s family and friends
                                                </p>
                                                <div class="card-share-memorial__socials">
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/ig-memorial.svg" alt="instagram" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="whatsapp" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="twitter" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/facebook-memorial.svg" alt="facebook" class="tribute-details__icon"></a>
                                                </div>
                                                <div class="card-share-memorial__copy">
                                                    <a href="#" id="copy-content">ademolawa-johnson/createtribute.com</a>
                                                    <button id="btn-copy">
                                                        <img src="../../assets/img/copy-icon.svg" alt="Copy Icon">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-small">
                                            <p class="card-small__views">{{$detail->page_views}} View<span>@if( $detail->page_views ==1)
                                            @else s @endif</span></p>
                                        </div>
                                        <div class="card-small">
                                            <p class="card-small__created-by">Created By</>
                                            </p>
                                            <h5 class="card-small__creator">Gharham Anali</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="memorial-view-bottom">
                            <h5 class="memorial-view-heading">Post a tribute</h5>
                            <p class="memorial-view-login">
                                <a href="#" class="memorial-view-link">Log in</a>
                                to post a tribute for Johnson Magbodi
                            </p>
                        </div>
                    </div>
                </div>

                <div id="life" data-tab-content>
                    <div class="memorial-view-content">
                        <div class="memorial-view-top">
                            <p class="tribute__initials">GA</p>
                            <div class="tribute__poster">
                                <h6 class="tribute__name">Gharham Anali</h6>
                                <div class="tribute__line">
                                    <p class="tribute__user">Administrator</p>
                                    <span class="dot-status"></span>
                                    <div class="tribute__date">15 Oct 2021</div>
                                </div>
                            </div>
                        </div>
    
                        <div class="about-content__main">
                            <div class="memorial-view">
                                <div class="memorial-view__left">
                                    <h5 class="memorial-view-heading">Life of Johnson Magbodo</h5>
                                    <div class="memorial-view__contain">
                                        <p class="memorial-view__text">
                                            Johnson Magbodo is one of the most outstanding minds of modern Asia. He is the foremost of the Telugu poets today who has turned poetry to the gigantic strides of human history and embellished literature with the thrills and triumphs of the 20th century. A revolutionary poet who spurned the pedestrian and pedantic poetry equally,
                                            a brilliant critic and a scholar of Sanskrit, this versatile poet has breathed a new vision of modernity to his vernacular. Such minds place Telugu on the world map of intellectualism. Readers conversant with names like Paul Valery, Gauguin, and Dag Hammarskjold will have to add the name of Seshendra Sharma the writer from
                                            India to that dynasty of intellectuals.
                                        </p>
                                    </div>
                                </div>
                                <div class="memorial-view__right">
                                    <div class="memorial-view-cards">
                                        <div class="card-share-memorial">
                                            <div class="card-share-memorial__top">
                                                <h6 class="card-heading">Share Memorial</h6>
                                            </div>
                                            <div class="card-share-memorial__content">
                                                <p class="card-share-memorial__text">
                                                    Share memorial with Johnson’s family and friends
                                                </p>
                                                <div class="card-share-memorial__socials">
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/ig-memorial.svg" alt="instagram" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="whatsapp" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="twitter" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/facebook-memorial.svg" alt="facebook" class="tribute-details__icon"></a>
                                                </div>
                                                <div class="card-share-memorial__copy">
                                                    <a href="#" id="copy-content">ademolawa-johnson/createtribute.com</a>
                                                    <button id="btn-copy">
                                                        <img src="../../assets/img/copy-icon.svg" alt="Copy Icon">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-small">
                                            <p class="card-small__views">{{$detail->page_views}} View<span>@if ( $detail->page_views ==1)
                                            @else s @endif</span></p>
                                        </div>
                                        <div class="card-small">
                                            <p class="card-small__created-by">Created By</>
                                            </p>
                                            <h5 class="card-small__creator">Gharham Anali</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="gallery" data-tab-content>
                    <div class="memorial-view-content">
                        <div class="memorial-view-top">
                            <p class="tribute__initials">GA</p>
                            <div class="tribute__poster">
                                <h6 class="tribute__name">Gharham Anali</h6>
                                <div class="tribute__line">
                                    <p class="tribute__user">Administrator</p>
                                    <span class="dot-status"></span>
                                    <div class="tribute__date">15 Oct 2021</div>
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
                                               <div class="gallery__item"><span><img src="../../assets/img/img-1.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-2.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-3.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-4.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-5.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-6.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-7.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-8.jpg" alt="Gallery Image" class="gallery__img"></span></div>
                                               <div class="gallery__item"><span><img src="../../assets/img/img-9.jpg" alt="Gallery Image" class="gallery__img"></span></div>
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
                                <div class="memorial-view__right">
                                    <div class="memorial-view-cards">
                                        <div class="card-share-memorial">
                                            <div class="card-share-memorial__top">
                                                <h6 class="card-heading">Share Memorial</h6>
                                            </div>
                                        <div class="card-share-memorial__content">
                                            <p class="card-share-memorial__text">
                                                Share memorial with Johnson’s family and friends
                                            </p>
                                            <div class="card-share-memorial__socials">
                                                <a href="#" class="tribute-details__link"><img src="../../assets/img/ig-memorial.svg" alt="instagram" class="tribute-details__icon"></a>
                                                <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="whatsapp" class="tribute-details__icon"></a>
                                                <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="twitter" class="tribute-details__icon"></a>
                                                <a href="#" class="tribute-details__link"><img src="../../assets/img/facebook-memorial.svg" alt="facebook" class="tribute-details__icon"></a>
                                            </div>
                                            <div class="card-share-memorial__copy">
                                                <a href="#" id="copy-content">ademolawa-johnson/createtribute.com</a>
                                                <button id="btn-copy">
                                                    <img src="../../assets/img/copy-icon.svg" alt="Copy Icon">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-small">
                                        <p class="card-small__views">{{$detail->page_views}} View<span>@if ( $detail->page_views ==1)
                                            @else s @endif</span></p>
                                    </div>
                                    <div class="card-small">
                                        <p class="card-small__created-by">Created By</>
                                        </p>
                                        <h5 class="card-small__creator">Gharham Anali</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="story" data-tab-content>
                <div class="memorial-view-content">
                    <div class="memorial-view-top">
                        <p class="tribute__initials">GA</p>
                        <div class="tribute__poster post-link">
                            <h6 class="tribute__name">Gharham Anali</h6>
                            <div class="tribute__line">
                                <p class="tribute__user">Administrator</p>
                                <span class="dot-status"></span>
                                <div class="tribute__date">15 Oct 2021</div>
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
                                    <div class="story-card">
                                        <!-- <div class="story-card__memory-contain">
                                            <div class="story-card__memory">
                                                <p class="story-card__memory-of">In memory of</p>
                                                <img src="../../assets/img/memorial-img-1.png" class="story-card__memory-img">
                                                <p class="story-card__memory-name">Olufemi Samson</p>
                                            </div>
                                        </div> -->
                                        <div class="story-card__body-story">
                                            <div class="story-card__body-left">
                                                <img src="../../assets/img/story-image.png" alt="Story Image" class="story-card__story-img">
                                            </div>
                                            <div class="story-card__body-right">
                                                <div class="story-card__header">
                                                    <p class="story-card__initials">NJ</p>
                                                    <div class="story-card__info">
                                                        <p class="story-card__from">From</p>
                                                        <h6 class="story-card__fullname">Nana Johnson</h6>
                                                    </div>
                                                    <p class="story-card__date">15 Oct 2021</p>
                                                    <!-- <img src="../../assets/img/more-icon.svg" class="story-card__more-icon">
                                                    <div class="story-card__more-menu-img hide">
                                                        <p class="story-card__more-menu-option">Edit</p>
                                                        <p class="story-card__more-menu-option">Delete</p>
                                                        <p class="story-card__more-menu-option">Hide from public</p>
                                                    </div> -->
                                                </div>
                                                <div class="story-card__post">
                                                    <p class="memorial-card-content">
                                                        A revolutionary poet who spurned the pedestrian and pedantic poetry equally, a brilliant critic and a scholar of Sanskrit, this versatile poet has breathed a new vision of modernity to his vernacular.Such minds place Telugu on the world map of intellectualism. Readers conversant with names like Paul Valery, Gauguin, and Dag Hammarskjold will have to add the name of Seshendra Sharma the writer from, Johnson Magbodo is one of the most outstanding minds of modern Asia. He is the  foremost of the Telugu poets today who has turned poetry to the gigantic strides of human history and embellished literature with the thrills and triumphs of the 20th Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat non tenetur eaque possimus sit sed, quam quo error. Consequuntur facilis in porro quis molestiae ab dolorum ratione expedita veritatis corporis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, dolore incidunt quas deleniti minima animi accusamus optio velit modi hic? Pariatur excepturi maiores consequatur praesentium odio alias reiciendis sint asperiores quisquam? Tempora officiis soluta explicabo sint tempore fugiat rerum atque ipsa sapiente. Reiciendis veniam expedita praesentium assumenda, est atque numquam magnam nisi impedit eveniet, laborum optio. Amet laboriosam reprehenderit alias natus vitae est error. A, quisquam? Nostrum at quasi, ducimus, laudantium amet repudiandae molestiae porro suscipit delectus, doloremque non minus sequi ullam? Ducimus minima nobis, doloribus ipsum praesentium minus ut numquam cupiditate, natus vitae perspiciatis cum impedit sapiente culpa dolore harum necessitatibus.
                                                    </p>
                                                    <button class="memorial-card-button">Read More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="story-card">
                                        <div class="story-card__memory-contain">
                                            <div class="story-card__memory">
                                                <p class="story-card__memory-of">In memory of</p>
                                                <img src="../../assets/img/memorial-img-2.png" class="story-card__memory-img">
                                                <p class="story-card__memory-name">Olufemi Samson</p>
                                            </div>
                                        </div>
                                        <div class="story-card__body-story">
                                            <div class="story-card__body-left">
                                                <img src="../../assets/img/story-image2.png" alt="Story Image" class="story-card__story-img">
                                            </div>
                                            <div class="story-card__body-right">
                                                <div class="story-card__header">
                                                    <p class="story-card__initials">NJ</p>
                                                    <div class="story-card__info">
                                                        <p class="story-card__from">From</p>
                                                        <h6 class="story-card__fullname">Nana Johnson</h6>
                                                    </div>
                                                    <p class="story-card__date">15 Oct 2021</p>
                                                    <img src="../../assets/img/more-icon.svg" class="story-card__more-icon">
                                                    <div class="story-card__more-menu-img hide">
                                                        <p class="story-card__more-menu-option">Edit</p>
                                                        <p class="story-card__more-menu-option">Delete</p>
                                                        <p class="story-card__more-menu-option">Hide from public</p>
                                                    </div>
                                                </div>
                                                <div class="story-card__post">
                                                    <p class="memorial-card-content">
                                                        A revolutionary poet who spurned the pedestrian and pedantic poetry equally, a brilliant critic and a scholar of Sanskrit, this versatile poet has breathed a new vision of modernity to his vernacular.Such minds place Telugu on the world map of intellectualism. Readers conversant with names like Paul Valery, Gauguin, and Dag Hammarskjold will have to add the name of Seshendra Sharma the writer from, Johnson Magbodo is one of the most outstanding minds of modern Asia.
                                                    </p>
                                                    <button class="memorial-card-button">Read More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="story-card">
                                        <!-- <div class="story-card__memory-contain">
                                            <div class="story-card__memory">
                                                <p class="story-card__memory-of">In memory of</p>
                                                <img src="../../assets/img/memorial-img-1.png" class="story-card__memory-img">
                                                <p class="story-card__memory-name">Olufemi Samson</p>
                                            </div>
                                        </div> -->
                                        <div class="story-card__body-story">
                                            <div class="story-card__body-no-image">
                                                <div class="story-card__header">
                                                    <p class="story-card__initials">NJ</p>
                                                    <div class="story-card__info">
                                                        <p class="story-card__from">From</p>
                                                        <h6 class="story-card__fullname">Nana Johnson</h6>
                                                    </div>
                                                    <p class="story-card__date">15 Oct 2021</p>
                                                    <div class="test">
                                                        
                                                    </div>
                                                    <!-- <img src="../../assets/img/more-icon.svg" class="story-card__more-icon-noImg">
                                                    <div class="story-card__more-no-img hide">
                                                        <p class="story-card__more-menu-option-2">Edit</p>
                                                        <p class="story-card__more-menu-option-2">Delete</p>
                                                        <p class="story-card__more-menu-option-2">Hide from public</p>
                                                    </div> -->
                                                </div>
                                                <div class="story-card__post">
                                                    <p class="memorial-card-content">
                                                        A revolutionary poet who spurned the pedestrian and pedantic poetry equally, a brilliant critic and a scholar of Sanskrit, this versatile poet has breathed a new vision of modernity to his vernacular.Such minds place Telugu on the world map of intellectualism. Readers conversant with names like Paul Valery, Gauguin, and Dag Hammarskjold will have to add the name of Seshendra Sharma the writer from, Johnson Magbodo is one of the most outstanding minds of modern Asia.
                                                    </p>
                                                    <button class="memorial-card-button">Read More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="load-tributes-button">Load More Tributes...</a>
                                </div>
                            </div>
                            <div class="memorial-view__right">
                                <div class="memorial-view-cards">
                                    <div class="card-share-memorial">
                                        <div class="card-share-memorial__top">
                                            <h6 class="card-heading">Share Memorial</h6>
                                        </div>
                                    <div class="card-share-memorial__content">
                                        <p class="card-share-memorial__text">
                                            Share memorial with Johnson’s family and friends
                                        </p>
                                        <div class="card-share-memorial__socials">
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/ig-memorial.svg" alt="instagram" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="whatsapp" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="twitter" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/facebook-memorial.svg" alt="facebook" class="tribute-details__icon"></a>
                                        </div>
                                        <div class="card-share-memorial__copy">
                                            <a href="#" id="copy-content">ademolawa-johnson/createtribute.com</a>
                                            <button id="btn-copy">
                                                <img src="../../assets/img/copy-icon.svg" alt="Copy Icon">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-small">
                                    <p class="card-small__views">{{$detail->page_views}} View<span>@if ( $detail->page_views ==1)
                                            @else s @endif</span></p>
                                </div>
                                <div class="card-small">
                                    <p class="card-small__created-by">Created By</>
                                    </p>
                                    <h5 class="card-small__creator">Gharham Anali</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="memorial-view-bottom">
                    <h5 class="memorial-view-heading">Post a tribute</h5>
                    <p class="memorial-view-login">
                        <a href="#" class="memorial-view-link">Log in</a>
                        to post a tribute for Johnson Magbodi
                    </p>
                </div>
            </div>
            </div>
            <div id="tribute" data-tab-content>
                <div class="memorial-view-content">
                    <div class="memorial-view-top">
                        <p class="tribute__initials">GA</p>
                        <div class="tribute__poster post-link">
                            <h6 class="tribute__name">Gharham Anali</h6>
                            <div class="tribute__line">
                                <p class="tribute__user">Administrator</p>
                                <span class="dot-status"></span>
                                <div class="tribute__date">15 Oct 2021</div>
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
                                                    <p class="tribute-view-card__initials">NJ</p>
                                                    <div class="tribute-view-card__info">
                                                        <p class="tribute-view-card__from">From</p>
                                                        <h6 class="tribute-view-card__fullname">Nana Johnson</h6>
                                                    </div>
                                                    <p class="tribute-view-card__date">15 Oct 2021</p>
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
                                                        A revolutionary poet who spurned the pedestrian and pedantic poetry equally, a brilliant critic and a scholar of Sanskrit, this versatile poet has breathed a new vision of modernity to his vernacular.Such minds place Telugu on the world map of intellectualism. Readers conversant with names like Paul Valery, Gauguin, and Dag Hammarskjold will have to add the name of Seshendra Sharma the writer from, Johnson Magbodo is one of the most outstanding minds of modern Asia.
                                                    </p>
                                                    <button class="memorial-card-button">Read More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <p class="tribute-view-card__initials">NJ</p>
                                                    <div class="tribute-view-card__info">
                                                        <p class="tribute-view-card__from">From</p>
                                                        <h6 class="tribute-view-card__fullname">Nana Johnson</h6>
                                                    </div>
                                                    <p class="tribute-view-card__date">15 Oct 2021</p>
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
                                                        A revolutionary poet who spurned the pedestrian and pedantic poetry equally, a brilliant critic and a scholar of Sanskrit, this versatile poet has breathed a new vision of modernity to his vernacular.Such minds place Telugu on the world map of intellectualism. Readers conversant with names like Paul Valery, Gauguin, and Dag Hammarskjold will have to add the name of Seshendra Sharma the writer from, Johnson Magbodo is one of the most outstanding minds of modern Asia. A revolutionary poet who spurned the pedestrian and pedantic poetry equally, a brilliant critic and a scholar of Sanskrit, this versatile poet has breathed a new vision of modernity to his vernacular.Such minds place Telugu on the world map of intellectualism. Readers conversant with names like Paul Valery, Gauguin, and Dag Hammarskjold will have to add the name of Seshendra Sharma the writer from, Johnson Magbodo is one of the most outstanding minds of modern Asia.
                                                    </p>
                                                    <button class="memorial-card-button">Read More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="load-tributes-button">Load More Tributes...</a>
                                </div>
                            </div>
                            <div class="memorial-view__right">
                                <div class="memorial-view-cards">
                                    <div class="card-share-memorial">
                                        <div class="card-share-memorial__top">
                                            <h6 class="card-heading">Share Memorial</h6>
                                        </div>
                                    <div class="card-share-memorial__content">
                                        <p class="card-share-memorial__text">
                                            Share memorial with Johnson’s family and friends
                                        </p>
                                        <div class="card-share-memorial__socials">
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/ig-memorial.svg" alt="instagram" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="whatsapp" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="twitter" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="../../assets/img/facebook-memorial.svg" alt="facebook" class="tribute-details__icon"></a>
                                        </div>
                                        <div class="card-share-memorial__copy">
                                            <a href="#" id="copy-content">ademolawa-johnson/createtribute.com</a>
                                            <button id="btn-copy">
                                                <img src="../../assets/img/copy-icon.svg" alt="Copy Icon">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-small">
                                    <p class="card-small__views">{{$detail->page_views}} View<span>@if ( $detail->page_views ==1)
                                            @else s @endif</span></p>
                                </div>
                                <div class="card-small">
                                    <p class="card-small__created-by">Created By</>
                                    </p>
                                    <h5 class="card-small__creator">Gharham Anali</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="memorial-view-bottom">
                    <h5 class="memorial-view-heading">Post a tribute</h5>
                    <p class="memorial-view-login">
                        <a href="#" class="memorial-view-link">Log in</a>
                        to post a tribute for Johnson Magbodi
                    </p>
                </div>
            </div>
        </div>





@endsection