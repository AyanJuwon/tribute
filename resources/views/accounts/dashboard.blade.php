<?php
/**
 * tribute2
 * Olamiposi
 * 02/06/2021
 * 14:42
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Memorials

@endsection
@section('content')
     <main>
            <section class="dashboard profile-container">
                <div class="dashboard-top">
                    <h4 class="profile-heading">Hello {{auth()->user()->name}}</h4>
                    <a href="{{('createMemorial')}}" class="profile-memorial-button">
                        <img src="/assets/img/add-icon.svg">
                        <span>Create Memorial</span>
                    </a>
                </div>
    
                <div class="dashboard-cards">
                    <div class="dash-card dash-card--1">
                        <h5 class="dash-card__title">Total Memorials</h5>
                        <div class="dash-card__bottom">
                            <p class="dash-card__number dash-card__number--1">{{\App\Memorial::userMemorialCount()}}</p>
                            <img src="/assets/img/dashboard-icon-total.svg" class="dash-card__icon">
                        </div>
                    </div>
                    <div class="dash-card dash-card--2">
                        <h5 class="dash-card__title">Active Memorials</h5>
                        <div class="dash-card__bottom">
                            <p class="dash-card__number dash-card__number--2">{{\App\Memorial::activeUserMemorialCount()}}</p>
                            <img src="/assets/img/dashboard-icon-active.svg" class="dash-card__icon">
                        </div>
                    </div>
                    <div class="dash-card dash-card--3">
                        <h5 class="dash-card__title">Expiring Soon</h5>
                        <div class="dash-card__bottom">
                            <p class="dash-card__number dash-card__number--3">{{\App\Memorial::expiringSoon()}}</p>
                            <img src="/assets/img/dashboard-icon-expiring.svg" class="dash-card__icon">
                        </div>
                    </div>
                    <div class="dash-card dash-card--4">
                        <h5 class="dash-card__title">Expired Memorials</h5>
                        <div class="dash-card__bottom">
                            <p class="dash-card__number dash-card__number--4">{{\App\Memorial::expired()}}</p>
                            <img src="/assets/img/dashboard-icon-expired.svg" class="dash-card__icon">
                        </div>
                    </div>
                </div>
    
                <div class="dash-memorials">
                    <div class="dash-memorials__top">
                        <h5 class="dash-memorials__heading">Memorials</h5>
                        <p class="dash-memorials__subheading">
                            Here are memorials you have created
                        </p>
                    </div>
                    <div class="dash-memorials__content">
                        @if (\App\Memorial::userMemorialCount() == 0)
                              <div class="dash-memorials__empty-content">
                            <img src="/assets/img/empty-memorial-icon.svg" class="dash-memorials__empty-icon">
                            <p class="dash-memorials__empty-text">
                                Looks like you have not created any memorial
                            </p>
                            <a href="{{route('createMemorial')}}" class="profile-memorial-button">
                                <img src="/assets/img/add-icon.svg">
                                <span>Create Memorial</span>
                            </a>
                        </div> 
                        @else
                            
                       
                       
                        <div class="dash-memorials__existing-memorials">
                            @foreach ($memorials as $memorial )
        
                            <div class="memorial-card">
                                <div class="memorial-card__details">
                                    <img src="/assets/img/memorial-img-1.png" alt="Memorial Image" class="memorial-card__img">
                                    <div class="memorial-card__subdetails">
                                        <div class="top">
                                            @if ($memorial->activeUserMemorial()==1)
                                            <div class="memorial-card__status memorial-card__status--1">Active</div>
                                                
                                            @else
                                            @if ($memorial->expiredMemorial()==2)
                                            <div class="memorial-card__status memorial-card__status--1">Expired</div>
                                                
                                            @else
                                            @if ($memorial->expiringSoonMemorial()==3)
                                            <div class="memorial-card__status memorial-card__status--1">Expiring Soon</div>
                                                
                                            @endif

                                            @endif
                                                
                                            @endif
                                        </div>
                                        <div class="center">
                                            <h6 class="memorial-card__name">{{$memorial->first_name. ' '.$memorial->last_name}}</h6>
                                            <p class="memorial-card__date-range">{{$memorial->born_date->toDateString() .' - ' .$memorial->passed_away_date->toDateString()}}</p>
                                        </div>
                                        <div class="bottom">
                                            <p class="memorial-card__plan">Monthly Plan</p>
                                            <p class="memorial-card__created">Created: 13/09/2021</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="memorial-card__bottom">
                                    <a href="{{route('viewMemorial', $memorial->slug)}}" class="memorial-card__link">
                                        <span>Visit Memorial</span>
                                        <img src="/assets/img/arrow-right-icon.svg">
                                    </a>
                                </div>
                            </div>
                         @endforeach
                        </div>
                         @endif
                    </div>
                </div>
            </section>
        </main>

    
@endsection
