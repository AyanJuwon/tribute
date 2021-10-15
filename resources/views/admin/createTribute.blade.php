<?php
/**
 * tribute
 * Olamiposi
 * 27/10/2020
 * 20:49
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')

@section('title')
    Add tributes
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{isset($data) ? 'Edit Tribute' : 'Add Tribute'}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{isset($data) ? 'Edit Tribute' : 'Add Tribute'}}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h2 class="card-title mb-5" style="font-size: 30px;">{{isset($data) ? 'Edit Tribute' : 'Type Tribute Here'}}</h2>
                            {{--                            <p class="text-muted card-sub-title">A form control with labels state.</p>--}}
                        </div>

                        @include('partials.list_error')
                        @include('partials.success')
                        {{--                        @include('partials.error')--}}
                        <form method="POST" action="{{ isset($data) ? route('tribute.update', $data->id) : route('tributes.save') }}" enctype="multipart/form-data">
                            @csrf
                            @isset($data)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-md-12 ">

                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <p class="mg-b-10">Upload Images (Optional)</p>--}}
                                    {{--                                        <input name="image" type="file" class="form-control">--}}
                                    {{--                                    </div>--}}
                                    @if(isset($data))
                                        <div class="form-group mb-3">
                                            {{--                                    <p class="mg-b-10">Story</p>--}}
                                            <textarea class="form-control"
                                                      @if($data->tribute == NULL)
                                                      name="docs"
                                                      @else
                                                      name="tribute"
                                                      @endif
                                                      rows="12">@if(isset($data))@if($data->tribute == NULL){{ $data->docs }}@else{{$data->tribute}}
                                                @endif
                                                @endif</textarea>
                                        </div>

{{--                                        <div class="form-group mb-3 mt-3">--}}
{{--                                            --}}{{--                                    <p class="mg-b-10">Story</p>--}}
{{--                                            <input class="form-control" name="from" placeholder="From?" value="{{isset($data) ? $data->from : ''}}">--}}
{{--                                        </div>--}}
                                    @endif
                                    @if(!isset($data))
                                        <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                                            <div class="card">
                                                <div class="card-header" id="headingOne" role="tab">
                                                    <a aria-controls="collapseOne" aria-expanded="true" data-toggle="collapse" href="#collapseOne">{{isset($data) ? 'Edit Tribute' : 'Type Tribute Here'}}</a>
                                                </div>

                                                <div aria-labelledby="headingOne" class="collapse show" data-parent="#accordion" id="collapseOne" role="tabpanel">
                                                    <div class="card-body">
                                                        <div class="form-group mb-3">
                                                            {{--                                    <p class="mg-b-10">Story</p>--}}
                                                            <textarea class="form-control" name="tribute" rows="12" placeholder="Type Tribute"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo" role="tab">
                                                    <a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseTwo"> Or Upload Documents, Only (*.docx, *.doc, *.pdf, *.txt) formats</a>
                                                </div>
                                                <div aria-labelledby="headingTwo" class="collapse" data-parent="#accordion" id="collapseTwo" role="tabpanel">
                                                    <div class="card-body">
                                                        <input name="docs" type="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

{{--                                        <div class="form-group mb-3 mt-3">--}}
{{--                                            --}}{{--                                    <p class="mg-b-10">Story</p>--}}
{{--                                            <input class="form-control" name="from" placeholder="From?">--}}
{{--                                        </div>--}}
                                    @endif

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <div class="form-group">
                                        <button class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
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
