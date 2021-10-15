<?php
/**
 * tribute
 * Olamiposi
 * 13/10/2020
 * 20:45
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.index')
@section('title')
    Stories - {{ \App\Memorial::fullname($detail) }}
@endsection
@section('description')
    <meta name="description" content="Stories About {{ \App\Memorial::fullname($detail) }}">
@endsection
@section('css')
    <style type="text/css">
        .read-more-show{
            cursor:pointer;
            color: #c0a16b;
        }
        .read-more-hide{
            cursor:pointer;
            color: #c0a16b;
        }

        .hide_content{
            display: none;
        }
    </style>
@endsection
@section('content')
    @include('partials.foraudio')
    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('welcome', $slug) }}">About</a></li>
                <li>Stories</li>
            </ul>
        </div>
    </div>
    <div class="single-content padding-vertical-100">
        <div class="container">
{{--            <div class="section-head text-center margin-bottom-60 wow fadeInUpBig">--}}
{{--                <h3 class="h2">All Stories</h3>--}}
{{--                --}}{{--                <p>Request a book of memories.</p>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-9 col-sm-7 single-info wow fadeInUp">
                    <h5>Stories | @if(auth()->user())<a href="#tribute" style="text-decoration: underline;">Tell a Story >@else <a href="#" data-toggle="modal" data-target="#login"><b>Sign in to Tell a Story</b> </a>    @endif</a> </h5>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(\App\Stories::getStoriesbySlug($slug) == 0)
                        <h3>Nothing to show yet</h3>
                        <div class="padding-bottom-20"></div>
                        @else
                    @foreach($stories as $story)
                        @if($story->image == '')
                            <div class="condolence-item margin-bottom-30">
                            <span class="meta">
                        <b>From:</b> @if($story->from != '')
                                    {{ $story->from }}
                                @else
                                    {{ $story->user->name }}
                                @endif
                        <span><i class="fa fa-calendar"></i> {{ $story->created_at->format('M d , Y') }}</span>
                                 @if(auth()->user())
                                    @if($user->created_by == auth()->user()->id)
                                        <a onclick="handleDelete('{{ $story->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                    @endif
                                    @if($user->created_by != auth()->user()->id)
                                        @if($story->user_id == auth()->user()->id)
                                            <a onclick="handleDelete('{{ $story->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                        @endif
                                    @endif
                                @endif
                            </span>
                                <p><em>
                                        @if(strlen($story->story) > 400)
                                            {{ substr($story->story,0,400) }}
                                            <span class="read-more-show hide_content">Read More <i class="fa fa-angle-down"></i></span>
                                            <span class="read-more-content"> {{substr($story->story,400,strlen($story->story))}}
            <span class="read-more-hide hide_content">Read Less <i class="fa fa-angle-up"></i></span> </span>
                                        @else
                                            {{$story->story}}
                                        @endif
                                    </em></p>
                                <div class="addthis_inline_share_toolbox_rxma text-center"></div>

                                {{--                        <cite>-Love Rosanne</cite>--}}
                            </div>
                        @else
                            <div class="condolence-item margin-bottom-30">
                            <span class="meta">
                        <b>From:</b> @if($story->from != '')
                                    {{ $story->from }}
                                @else
                                    {{ $story->user->name }}
                                @endif
                        <span><i class="fa fa-calendar"></i> {{ $story->created_at->format('M d , Y') }}</span>
                                @if(auth()->user())
                                    @if($user->created_by == auth()->user()->id)
                                        <a onclick="handleDelete('{{ $story->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                    @endif
                                    @if($user->created_by != auth()->user()->id)
                                        @if($story->user_id == auth()->user()->id)
                                            <a onclick="handleDelete('{{ $story->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                        @endif
                                    @endif
                                @endif
{{--                            <a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>--}}
                            </span>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ asset('uploads/story/'.$story->image) }}" class="img-responsive" style="padding-bottom: 20px;" data-holder-rendered="true">

                                    </div>
                                    <div class="col-sm-9">
                                        <p><em> @if(strlen($story->story) > 400)
                                                    {{ substr($story->story,0,400) }}
                                                    <span class="read-more-show hide_content">Read More <i class="fa fa-angle-down"></i></span>
                                                    <span class="read-more-content"> {{substr($story->story,400,strlen($story->story))}}
            <span class="read-more-hide hide_content">Read Less <i class="fa fa-angle-up"></i></span> </span>
                                                @else
                                                    {{$story->story}}
                                                @endif</em></p>

                                    </div>
                                    <div class="addthis_inline_share_toolbox_rxma text-center"></div>

                                </div>
                                {{--                        <cite>-Love Rosanne</cite>--}}
                            </div>
                        @endif

                    @endforeach
                    @endif
                    <div class="page-nav text-center">
                        <ul class="list-inline">
                            {{ $stories->links() }}
                        </ul>
                    </div>
                    <br>
                    <br>
                    @if(auth()->user())
                        <div class="comment-box submit-form" id="tribute">
                            <h3 class="reply-title">Tell a story</h3>
                            <br>
                            <div class="comment-form">

                                @include('partials.list_error')
                                @include('partials.success')
                                {{--                            @include('partials.error')--}}
                                <form method="POST" action="{{ route('stories.save', $slug) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <textarea name="story" class="form-control" cols="30" rows="10" placeholder="Tell a story....."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Image(Optional)</label>
                                                <br><br>
                                                <input name="image" type="file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                @include('layouts.sidebar')
            </div>


        </div>
    </div>
@endsection

@section('script')
    @include('partials.modal')
    <script>
        function handleDelete(id){
            $('#deleteModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deleteForm');
            var url = '{{ route('stories.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>

    <script type="text/javascript">
        // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
        $('.read-more-content').addClass('hide_content')
        $('.read-more-show, .read-more-hide').removeClass('hide_content')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function(e) {
            $(this).next('.read-more-content').removeClass('hide_content');
            $(this).addClass('hide_content');
            e.preventDefault();
        });

        // Changes contributed by @diego-rzg
        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
        });
    </script>
@endsection
