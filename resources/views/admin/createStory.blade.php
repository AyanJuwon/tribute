<?php
/**
 * tribute
 * Olamiposi
 * 27/10/2020
 * 20:24
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')

@section('title')
    Add Story
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{isset($data) ? 'Edit Story' : 'Add Story'}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{isset($data) ? 'Edit Story' : 'Add Story'}}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h2 class="card-title mb-5" style="font-size: 30px;">{{isset($data) ? 'Edit Story' : 'Add Story Here'}}</h2>
                            {{--                            <p class="text-muted card-sub-title">A form control with labels state.</p>--}}
                        </div>

                        @include('partials.list_error')
                        @include('partials.success')
                        @include('partials.error')
                        <form method="POST" action="{{ isset($data) ? route('stories.update', $data->id) : route('stories.save') }}" enctype="multipart/form-data">
                            @csrf
                            @isset($data)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group mb-3">
                                        {{--                                    <p class="mg-b-10">Story</p>--}}
                                        <textarea class="form-control" name="story" rows="12" placeholder="{{isset($data) ? 'Edit Story' : 'Type Story'}}">{{ isset($data) ? $data->story : old('story') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <p class="mg-b-10">Upload Image (Optional)</p>

                                        <input name="image" type="file" class="form-control">

                                        {{--                            </div>--}}

                                    </div>
{{--                                    <div class="form-group mb-3 mt-3">--}}
{{--                                        --}}{{--                                    <p class="mg-b-10">Story</p>--}}
{{--                                        <input class="form-control" name="from" placeholder="From?" value="{{isset($data) ? $data->from : ''}}">--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
