<?php
/**
 * tribute
 * Olamiposi
 * 13/10/2020
 * 19:51
 * CREATED WITH PhpStorm
 **/
?>
<aside class="col-md-3 col-sm-5 wow fadeInUp">

    <div class="container margin-bottom-50" style="background-color: #eeeeee; border-radius: 7px; ">
        <h4 style="font-size: 17px;" class="padding-top-10 text-center">Invite {{ $detail->first_name }}'s Family and Friends: </h4>
        <div class="addthis_inline_share_toolbox_rxma text-center padding-top-20 padding-bottom-10"></div>

    </div>
    <div class="links margin-bottom-50">
        <a href="{{ route('tribute', $slug) }}">Tributes <i class="flaticon-arrows-1"></i></a>
        <a href="{{ route('stories', $slug) }}">Stories <i class="flaticon-arrows-1"></i></a>
        <a href="{{ route('life', $slug) }}">Life <i class="flaticon-arrows-1"></i></a>
        <a href="{{ route('gallery', $slug) }}">Gallery <i class="flaticon-arrows-1"></i></a>
    </div>

{{--    <marquee><h3>Play me if I don't play automatically</h3></marquee>--}}
    @if($detail->music != 'NULL')
        <div class="text-center">
            <audio id="myAudio" controls autoplay controlsList="nodownload">
                <source src="{{ asset('uploads/music/'.$detail->music) }}" type="audio/mpeg">
            </audio>
        </div>

        <div class="padding-bottom-20"></div>
        @endif

    <div class="container margin-bottom-50" style="background-color: #eeeeee; border-radius: 7px">
        <h3 style="text-decoration: underline; text-align: center" class="padding-top-10">Recent Activties</h3>
        @if(\App\ActiviesLog::countActivity($slug) == 0)
            <br>
            <h3 style="text-align: center; color: #c0a16b">Nothing to show Yet</h3>
            <div class="padding-bottom-20"></div>
        @else
        @foreach($activities as $act)
                @if($act->subject_type == 'App\Stories')
                    <p>{{ $act->users->name }}, <a href="{{ route('stories', $slug) }}" style="color: #c0a16b;"> {{ $act->description  }}</a>, {{$act->created_at->format('h:i A')}}</p>
                @elseif($act->subject_type == 'App\Tribute')
                    <p>{{ $act->users->name }}, <a href="{{ route('tribute', $slug) }}" style="color: #c0a16b;"> {{ $act->description  }}</a>, {{$act->created_at->format('h:i A')}}</p>
                    @else
                    <p>{{ $act->users->name }}, <a href="{{ route('gallery', $slug) }}" style="color: #c0a16b;"> {{ $act->description  }}</a>, {{$act->created_at->format('h:i A')}}</p>
                @endif

            <br>
        @endforeach
            @endif
    </div>

    <div class="container margin-bottom-50" style="background-color: #eeeeee; border-radius: 7px">
            <br>
            <h3 style="text-align: center; color: #c0a16b">{{ number_format($detail->page_views) }} View(s)</h3>
            <div class="padding-bottom-20"></div>
    </div>

    <div class="container margin-bottom-50" style="background-color: #eeeeee; border-radius: 7px">
        <br>
        <h3 style="text-align: center; color: #c0a16b;font-size: 22px">Created By {{ $detail->users->name }}</h3>
        <div class="padding-bottom-20"></div>
    </div>
</aside>
