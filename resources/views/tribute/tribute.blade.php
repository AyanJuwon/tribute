@extends('layouts.dashboard')
@section('title')
    Tribute - My Tributes
@endsection
@section('description')
    <meta name="description" content="Tribute to ">
@endsection
@section('css')
  
@endsection
@section('content')
 
        <main>
            <section class="dashboard profile-container">
                <div class="manage-tribute-top">
                    <h4 class="profile-heading">Tributes</h4>
                    <p class="manage-tribute-top__subheading">
                        Tributes you have written for other memorials
                    </p>
                </div>

                <div class="sub-container">
                    <div class="tribute-cards">
                        @foreach ($tributes as $tribute )
                            
                        
                        <div class="tribute-view-card">
                            <div class="tribute-view-card__memory-contain">
                                <div class="tribute-view-card__memory">
                                    <p class="tribute-view-card__memory-of">In memory of</p>
                                    <img src="/assets/img/memorial-img-1.png" class="tribute-view-card__memory-img">
                                    <p class="tribute-view-card__memory-name">{{ $tribute->getmemorialDetailsBySlug($story->slug)->first_name}} 
                                    {{ $tribute->getmemorialDetailsBySlug($story->slug)->last_name}}</p>
                                </div>
                            </div>
                            <div class="tribute-view-card__body-tribute-view">
                                <div class="tribute-view-card__body-no-image">
                                    <div class="tribute-view-card__header">
                                        <p class="tribute-view-card__initials">NJ</p>
                                        <div class="tribute-view-card__info">
                                            <p class="tribute-view-card__from">From</p>
                                            <h6 class="tribute-view-card__fullname">{{auth()->user()->name}}</h6>
                                        </div>
                                        <p class="tribute-view-card__date">{{$tribute->created_at->toDateString()}}</p>
                                        <div class="test">
                                            
                                        </div>
                                        <img src="/assets/img/more-icon.svg" class="tribute-view-card__more-icon-noImg">
                                        <div class="tribute-view-card__more-no-img hide">
                                            <p class="tribute-view-card__more-menu-option-2">Edit</p>
                                            <p class="tribute-view-card__more-menu-option-2">Delete</p>
                                            <p class="tribute-view-card__more-menu-option-2">Hide from public</p>
                                        </div>
                                    </div>
                                    <div class="tribute-view-card__post">
                                        <p class="memorial-card-content">{{$tribute->tribute}}
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
