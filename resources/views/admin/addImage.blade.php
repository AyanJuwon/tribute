<?php
/**
 * tribute
 * Olamiposi
 * 03/11/2020
 * 08:00
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')

@section('title')
    Add Image
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Add Image</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Image</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h2 class="card-title mb-5" style="font-size: 30px;">Add Image</h2>
                            {{--                            <p class="text-muted card-sub-title">A form control with labels state.</p>--}}
                        </div>

                        @include('partials.list_error')
                        @include('partials.success')
                        @include('partials.error')
                        <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                            @csrf
                            @isset($data)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <p class="mg-b-10">Upload Image</p>

                                        <input name="image" type="file" class="form-control">

                                        {{--                            </div>--}}

                                    </div>
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
