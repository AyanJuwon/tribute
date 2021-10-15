<?php
/**
 * tribute2
 * Olamiposi
 * 04/01/2021
 * 16:38
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Transaction Detail
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaction Detail</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Row -->
        <div class="row">
{{--            <div class="col-lg-4 col-md-12">--}}
{{--                <div class="card custom-card">--}}
{{--                    <div class="card-body text-center">--}}
{{--                        <div class="main-profile-overview widget-user-image text-center">--}}
{{--                            <div class="main-img-user"><img alt="avatar" src="{{ asset('uploads/memorial/'.$mem->picture) }}"></div>--}}
{{--                        </div>--}}
{{--                        <div class="item-user pro-user">--}}
{{--                            <h4 class="pro-user-username text-dark mt-2 mb-0">{{ \App\Memorial::fullname($mem) }}</h4>--}}
{{--                            <p class="pro-user-desc text-muted mb-1">{{ \Carbon\Carbon::parse($mem->born_date)->year }} - {{ \Carbon\Carbon::parse($mem->passed_away_date)->year }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer p-0">--}}
{{--                        <div class="row text-center">--}}
{{--                            <div class="col-sm-12">--}}
{{--                                <div class="description-block">--}}
{{--                                    <h5 class="description-header mb-1" style="padding: 0">{{ number_format($mem->page_views) }}</h5>--}}
{{--                                    <span class="text-muted">Page Views</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card main-content-body-profile">
                    <nav class="nav main-nav-line">
                        <a class="nav-link active" data-toggle="tab" href="#tab1over">Overview</a>
                    </nav>
                    <div class="card-body tab-content h-100">
                        <div class="tab-pane active" id="tab1over">
                            <div class="main-content-label tx-13 mg-b-20">
                                Transaction Information
                            </div>
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <tr>
                                        <td><strong>Reference :</strong> {{ $trans->reference }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>IP Address :</strong> {{ $trans->ip_address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Location :</strong> {{ $trans->location }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
