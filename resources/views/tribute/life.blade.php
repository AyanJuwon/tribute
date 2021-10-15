<?php
/**
 * tribute2
 * Olamiposi
 * 12/11/2020
 * 10:10
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.index')

@section('title')
    Life - Life of {{ \App\Memorial::fullname($detail) }}
@endsection
@section('description')
    <meta name="description" content="The Life of {{ \App\Memorial::fullname($detail) }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

@endsection

@section('content')
    @include('partials.foraudio')

    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('welcome', $slug) }}">About</a></li>
                <li>Life</li>
            </ul>
        </div>
    </div>

    <div class="single-content funeral-planning padding-top-100 padding-bottom-60">
        <div class="container">
            <div class="section-head text-center margin-bottom-60 wow fadeInUpBig">
                <h3 class="h2" style="text-transform: capitalize">Life of {{ \App\Memorial::fullname($detail) }} ({{ \Carbon\Carbon::parse($detail->born_date)->year }} - {{ \Carbon\Carbon::parse($detail->passed_away_date)->year }})</h3>
{{--                                <p>To everything, there is a season and a time to every purpose under the heavens. A time to be born and a time to die.  Eccl 3:1-2</p>--}}
            </div>

            <div class="row">
                <div class="col-md-9 col-sm-7 margin-bottom-30 fc-info wow slideInLeft">
                    <div class="margin-bottom-15"></div>
                    <h2>{{ $detail->gender == 'Male' ? 'His' : 'Her' }} Life</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('partials.list_error')
                    @include('partials.success')
                    <div class="margin-bottom-15"></div>
{{--                    @foreach($life as $lives)--}}
                    <p class="last">@if($detail->life == NULL)In this section, you can create a chapter by chapter biography of your loved one's life.
                        You can help others to get to know {{ $detail->first_name }} more intimately and for a moment experience the world through {{ $detail->gender == 'Male' ? 'his' : 'her' }} eyes.

                        Describe memorable dates and events from {{ $detail->gender == 'Male' ? 'his' : 'her' }} childhood, youth, and adult life. Collaborate with other members of your family to build a complete and rich life story. @else {!! $detail->life !!} @endif</p>
                    <div class="padding-bottom-20"></div>

                @if(auth()->user())
                        @if(auth()->user()->id == $detail->created_by)
                            <a href="#" data-toggle="modal" data-target="#life" class="btn btn-default btn-md"><i class="fa fa-edit"></i> Edit Life Section</a>
                        @endif
                    @endif

                </div>


            @include('layouts.sidebar')
        </div>
    </div>

        <div class="modal fade" id="life">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 20px;">
                            <i class="fa fa-edit"></i> Edit Life Section
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <form  method="POST" action="{{ route('life.save', $detail->slug) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <h3 style="padding-bottom: 6px;text-decoration: underline">Life</h3>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-name">
{{--                                        <label for="contact-name" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Life</label>--}}
                                        <textarea name="life" id="main" cols="30" class="form-control" rows="5">@if($detail->life == NULL)In this section, you can create a chapter by chapter biography of your loved one's life.
                                            You can help others to get to know {{ $detail->first_name }} more intimately and for a moment experience the world through {{ $detail->gender == 'Male' ? 'his' : 'her' }} eyes.

                                            Describe memorable dates and events from {{ $detail->gender == 'Male' ? 'his' : 'her' }} childhood, youth, and adult life. Collaborate with other members of your family to build a complete and rich life story. @else {!! $detail->life !!} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" style="background-color: #c8b69d; color: white" class="btn btn-primary add-todo">Cancel</button>
                            <button type="submit" class="btn btn-primary add-todo">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection

@section('script')
            <script>
                ClassicEditor
                    .create( document.querySelector( '#main' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
    @endsection
