<?php
/**
 * tribute
 * Olamiposi
 * 18/10/2020
 * 14:17
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.index')

@section('title')
    Gallery - Photos of {{ \App\Memorial::fullname($detail) }}
@endsection
@section('description')
    <meta name="description" content="The Online Memorial photos of Moses Chimereze Okpo">
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <style>
        .img-fluid{max-width:100%;height:auto}
        .no-gutters{margin-right:0;margin-left:0}.no-gutters>.col,.no-gutters>[class*=col-]{padding-right:0;padding-left:0}
        .gallery-block{
            padding-bottom: 60px;
            /*padding-top: 60px;*/
        }

        .gallery-block .heading{
            margin-bottom: 50px;
            text-align: center;
        }

        .gallery-block .heading h2{
            font-weight: bold;
            font-size: 1.4rem;
            text-transform: uppercase;
        }

        .gallery-block.compact-gallery .item{
            overflow: hidden;
            margin-bottom: 0;
            padding: 4px;
            background: none;
            opacity: 1;
        }

        .gallery-block.compact-gallery .item .image{
            transition: 0.8s ease;
        }

        .gallery-block.compact-gallery .item .info{
            position: relative;
            display: inline-block;
        }

        .gallery-block.compact-gallery .item .description{
            display: grid;
            position: absolute;
            bottom: 0;
            left: 0;
            color: #fff;
            padding: 10px;
            font-size: 17px;
            line-height: 18px;
            width: 100%;
            padding-top: 15px;
            padding-bottom: 15px;
            opacity: 1;
            color: #fff;
            transition: 0.8s ease;
            text-align: center;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.39));
        }

        .gallery-block.compact-gallery .item .description .description-heading{
            font-size: 1em;
            font-weight: bold;
        }

        .gallery-block.compact-gallery .item .description .description-body{
            font-size: 0.8em;
            margin-top: 10px;
            font-weight: 300;
        }

        @media (min-width: 576px) {

            .gallery-block.compact-gallery .item .description {
                opacity: 0;
            }

            .gallery-block.compact-gallery .item a:hover .description {
                opacity: 1;
            }

            .gallery-block .zoom-on-hover:hover .image {
                transform: scale(1.3);
                opacity: 0.7;
            }
        }

        @media only screen and (min-width: 250px) and (max-width: 767px) {
            .gallery-block.compact-gallery .item .description {
                opacity: 0;
            }

            .gallery-block.compact-gallery .item a:hover .description {
                opacity: 1;
            }

            .gallery-block .zoom-on-hover:hover .image {
                transform: scale(1.3);
                opacity: 0.7;
            }

        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #c8b69d;
        }

        .img-wrap {
            position: relative;
        }
        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            /*font-size: 100px;*/
        }

    </style>
@endsection

@section('content')

    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('welcome', $slug) }}">About</a></li>
                <li> Gallery </li>
            </ul>
        </div>
    </div>
    @include('partials.foraudio')


    <div class="single-content padding-vertical-100">
        <div class="container">
{{--            <div class="section-head text-center margin-bottom-60 wow fadeInUpBig">--}}
{{--                <h3 class="h2">Gallery</h3>--}}
{{--                --}}{{--                <p>Request a book of memories.</p>--}}
{{--            </div>--}}
            <div class="col-md-9 col-sm-7" style="border-radius: 5px;">
                <div class="text-center padding-bottom-15 padding-top-10">
                    <h3 style="text-decoration: underline;text-align: left">PHOTOS</h3>
                    <p style="text-align: left">Click on photos to enlarge</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('partials.list_error')
                    @include('partials.success')
                    <hr>
                </div>
                @if(\App\AddImages::imagecountUI($slug) == 0)
                    <h1 class="h3">Nothing to show yet</h1>
                    @else
                <section class="gallery-block compact-gallery">
                    <div class="">
                <div class="row no-gutters">
                    @foreach($images as $image)
                    <div class="col-md-6 col-lg-4 col-xs-4 item zoom-on-hover">
                        <a class="lightbox" href="{{ asset('uploads/images/'.$image->image) }}"
                           data-caption="by {{ ucfirst($image->user->name) }}
                       @if(auth()->user())
                        @if($detail->created_by == auth()->user()->id)
                            <br>  <a href='{{ route('testimage', [$slug, $image->id]) }}'>Delete Image</a>
                        @endif
                               @if($detail->created_by != auth()->user()->id)
                               @if($image->user_id == auth()->user()->id)
                               <br>  <a href='{{ route('testimage', [$slug, $image->id]) }}'>Delete Image</a>
                               @endif
                               @endif
                        @endif">
                            <div class="img-wrap">
                            <img class="img-fluid image" src="{{ asset('uploads/images/'.$image->image) }}">
                                @if(auth()->user())
                                    @if($detail->created_by == auth()->user()->id)
                                        <span class="close"><a class="close fa fa-close" onclick="handleDelete('{{ $image->id }}')"></a></span>
                                    @endif
                                        @if($detail->created_by != auth()->user()->id)
                                            @if($image->user_id == auth()->user()->id)
                                                <span class="close"><a class="close fa fa-close" onclick="handleDelete('{{ $image->id }}')"></a></span>
                                            @endif
                                        @endif
                                    @endif
                            <span class="description">
                            <span class="description-heading">Posted By:</span>
                            <span class="description-body">{{ $image->user->name }}</span>
                        </span>
                            </div>
                        </a>
                            <h3 style="font-size: 15px;">by {{ $image->user->name }}</h3>
                    </div>
                        @endforeach
                </div>
                    </div>
                </section>
                @endif
{{--                @foreach($images as $image)--}}
{{--                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-4 filter gfg padding-bottom-10" style="padding: 0 0 0 7px">--}}
{{--                    <a class="example-image-link" href="{{ asset('uploads/images/'.$image->image) }}" data-lightbox="example-set"><img class="example-image img-responsive" src="{{ asset('uploads/images/'.$image->image) }}" alt=""/></a>--}}
{{--                    --}}{{--                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--                <br>--}}

{{--                <h3 class="text-center padding-top-25">Share Photos</h3>--}}
{{--                <div class="addthis_inline_share_toolbox_rxma text-center padding-bottom-15"></div>--}}
{{--                <h3 class="text-center" style="padding-top: -20px;">Share Photos</h3>--}}
                <div class="padding-bottom-50"></div>
                @if(auth()->user())
                    <div class="comment-box submit-form" id="tribute">
                        <h3 class="reply-title">Post an Image</h3>
                        <br>
                        <div class="comment-form">
{{--                            @include('partials.list_error')--}}
{{--                            @include('partials.success')--}}
                            {{--                                @include('partials.error')--}}
                            <form method="POST" action="{{ route('image.save', $slug) }}" enctype="multipart/form-data">
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
                        </div>
                    </div>
                @endif
            </div>
            {{--                        </div>--}}

            <div class="padding-bottom-50"></div>


            @include('layouts.sidebar')
        </div>
    </div>
@endsection

@section('script')
    @include('partials.modal')
    <script>
        function handleDelete(id){
            $('#deleteModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deleteForm');
            var url = '{{ route('image.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>

    <script>
        $(document).ready(function(){

            $(".filter-button").click(function(){
                var value = $(this).attr('data-filter');

                if(value == "all")
                {
                    //$('.filter').removeClass('hidden');
                    $('.filter').show('1000');
                }
                else
                {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                    $(".filter").not('.'+value).hide('3000');
                    $('.filter').filter('.'+value).show('3000');

                }
            });

            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
            }
            $(this).addClass("active");

        });

</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.compact-gallery', {
            captions:true,
            animation: 'slideIn',
        });
    </script>
    </script>


@endsection
