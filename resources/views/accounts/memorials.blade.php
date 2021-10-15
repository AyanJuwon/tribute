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
@section('content')
     <div class="memorials">
            <div class="memorial-view-container">
                <div class="memorials-top">
                    <h3 class="memorials-heading">Memorials</h3>
                    <form action="#" class="memorials-search">
                        <img src="../../assets/img/search-icon.svg" class="memorials-search__icon">
                        <input type="text" class="memorials-search__input" placeholder="Search public memorials">
                    </form>
                    <a href="{{route('createMemorial')}}" class="memorials-button">
                        <img src="../../assets/img/plus-icon.svg">
                        <span>Create Memorial</span>
                    </a>
                </div>
    
                <div class="memorials-content">
                    <div class="memorials-content__left">
                         @if($count == 0)--}}
                       <div class="text-center">
                           <div class="padding-bottom-60"></div>
                           <h3>Nothing to show yet, <a href="{{ route('createMemorial') }}" style="color:#c0a16b;"> create a memorial</a></h3>
                       </div>
                   @else
                   @foreach($details as $detail)
                        <div class="tribute">
                            <div class="tribute__owner">
                                <p class="tribute__initials">GA</p>
                                <div class="tribute__poster">
                                    <h6 class="tribute__name">{{$detail->first_name. ' ' . $detail->last_name}}</h6>
                                    <div class="tribute__line">
                                        <p class="tribute__user">{{auth()->user()->name}}</p>
                                        <span class="dot-status"></span>
                                        <div class="tribute__date">{{$detail->created_at->toDateString()}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="tribute-details">
                                <div class="tribute-details__left">
                                    <div class="tribute-details__img-btn">
                                        <img src="../../assets/img/memorial-img-1.png" alt="Memorial Image" class="tribute-details__img">
                                        <a href="{{route('viewMemorial',$detail->slug)}}" class="tribute-details__btn">Visit Memorial</a>
                                    </div>
                                </div>
                                <div class="tribute-details__right">
                                    <div class="row-1">
                                        <h6 class="tribute-details__fullname">{{$detail->first_name. ' ' . $detail->last_name}}</h6>
                                        <p class="tribute-details__date-range">{{$detail->born_date->toDateString()}} - {{$detail->passed_away_date->toDateString()}}</p>
                                        <blockquote class="tribute-details__quote">
                                            "Let the Memory of Magbodi Johnson be with us forever"
                                            {{$detail->personal_phrase}}
                                        </blockquote>
                                    </div>
                                    <div class="row-2">
                                        <p class="tribute-details__text">
                                            This memorial website was created in memory of our loved one, Magbodi Johnson 80 years old , born on Sept 02, 1980 and passed away on Aug 19, 2021. We will remember him forever.
                                            {{$detail->main_section_text}}
                                        </p>
                                        <div class="tribute-details__info">
                                            <p class="tribute-details__views">{{$detail->page_views}} Views</p>
                                            <span class="dot-status"></span>
                                            <p class="tribute-details__tribute-number">{{\App\Tribute::getTributeBySlug($detail->slug)}} Tributes</p>
                                        </div>
                                    </div>
                                    <div class="row-3">
                                        <div class="tribute-details__socials">
                                            <a href="#" class="tribute-details__link"><img src="{{asset('assets/img/ig-memorial.svg')}}" alt="instagram" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="{{asset('assets/img/whatsapp-memorial.svg')}}" alt="whatsapp" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="{{asset('assets/img/whatsapp-memorial.svg')}}" alt="twitter" class="tribute-details__icon"></a>
                                            <a href="#" class="tribute-details__link"><img src="{{asset('assets/img/facebook-memorial.svg')}}" alt="facebook" class="tribute-details__icon"></a>
                                        </div>
    
                                        <div class="tribute-details__copy">
                                            <a href="{{route('viewMemorial',$detail->slug)}}" id="copy-content">{{$detail->slug}}/createtribute.com</a>
                                            <button id="btn-copy">
                                                <img src="{{asset('assets/img/copy-icon.svg')}}" alt="Copy Icon">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endforeach
@endif
                       
                    </div>
                    <aside class="memorials-content__right">
                        <h4 class="aside-heading">Most Viewed Tribute</h4>
                        <div class="top-tribute">
                            <div class="top-tribute__card-img">
                                <img src="../../assets/img/top-memorial-img.png" alt="Most Viewed Tribute" class="top-tribute__img">
                                <a href="#" class="top-tribute__btn">Visit Memorial</a>
                            </div>
                            <div class="top-tribute__content">
                                <div class="top-tribute__details">
                                    <div class="top-tribute__box">
                                        <p class="top-tribute__initials">MJ</p>
                                        <div class="top-tribute__poster">
                                            <h6 class="top-tribute__name">Kumar Dhaar</h6>
                                            <div class="top-tribute__line">
                                                <p class="top-tribute__user">Administrator</p>
                                                <span class="dot-status"></span>
                                                <div class="top-tribute__date">15 Oct 2021</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="top-tribute__top">
                                        <h6 class="top-tribute__fullname">Mary Olufemi</h6>
                                        <p class="top-tribute__date-range">02/09/1980 - 19/08/2021</p>
                                    </div>
                                    <div class="top-tribute__bottom">
                                        <p class="top-tribute__text">
                                            This memorial website was created in memory of our loved one, Magbodi Johnson 80 years old , born on Sept 02, 1980 and passed away on Aug 19, 2021. We will remember him forever.
                                        </p>
                                        <div class="top-tribute__info">
                                            <p class="top-tribute__views">1,289 Views</p>
                                            <span class="dot-status"></span>
                                            <p class="top-tribute__tribute-number">80 Tributes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

@endsection  