<?php
/**
 * tribute2
 * Olamiposi
 * 21/12/2020
 * 22:12
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Memorial Detail
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{ \App\Memorial::fullname($mem) }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Memorial Detail</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-4 col-md-12">
                @include('partials.success')
                @include('partials.list_error')
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="main-profile-overview widget-user-image text-center">
                            <div class="main-img-user"><img alt="avatar" src="{{ asset('uploads/memorial/'.$mem->picture) }}"></div>
                        </div>
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">{{ \App\Memorial::fullname($mem) }}</h4>
                            <p class="pro-user-desc text-muted mb-1">{{ \Carbon\Carbon::parse($mem->born_date)->year }} - {{ \Carbon\Carbon::parse($mem->passed_away_date)->year }}</p>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="row text-center">
                            <div class="col-sm-12">
                                <div class="description-block">
                                    <h5 class="description-header mb-1" style="padding: 0">{{ number_format($mem->page_views) }}</h5>
                                    <span class="text-muted">Page Views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card custom-card main-content-body-profile">
                    <nav class="nav main-nav-line">
                        <a class="nav-link active" data-toggle="tab" href="#tab1over">Overview</a>
                    </nav>
                    <div class="card-body tab-content h-100">
                        <div class="tab-pane active" id="tab1over">
                            <div class="main-content-label tx-13 mg-b-20">
                                Website Information
                            </div>
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <tr>
                                        <td><strong>Full Name :</strong> {{ \App\Memorial::fullname($mem) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date of Birth :</strong> {{ $mem->born_date->format('M d, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date of Death :</strong> {{ $mem->passed_away_date->format('M d, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Relationship :</strong> {{ $mem->relationship  }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($mem->active == true)
                                            <div class="btn-group btn-hspace text-center" style="text-align: center">
                                                <a onclick="handleDeletee({{$mem->id}})" class="btn btn-secondary dropdown-toggle" style="background-color: #65594d;color:white;text-align: center;" type="button">Suspend</a>

                                            </div>
                                                @else
                                                <div class="btn-group btn-hspace text-center" style="text-align: center">
                                                    <a onclick="handleDelete({{$mem->id}})" class="btn btn-secondary dropdown-toggle" style="background-color: #65594d;color:white;text-align: center;" type="button">Activate</a>

                                                </div>
                                                @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <tr>
                                        <td><strong>Website :</strong> <a href="{{ 'http://tributetoaloveone.com/'.$mem->slug }}">{{ $mem->slug  }}.tributetoaloveone.com</a></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Created By :</strong> {{ $mem->users->name  }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Plan :</strong> {{ ucwords($mem->plan_type) }}</td>
                                    </tr>
                                    @if($mem->plan_type == 'lifetime')
                                    <tr>
                                        <td><strong>Expiring Date :</strong> NULL </td>
                                    </tr>
                                        @else
                                        <tr>
                                            <td><strong>Expiring Date :</strong> {{ $mem->expiry_date->format('M, d Y') }}</td>
                                        </tr>
                                        @endif

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
@section('script')
    @include('partials.modal')
    <script>
        function handleDelete(id){
            $('#activateMemorialModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('activateMemorialForm');
            var url = '{{ route('memorial.activate', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
    <script>
        function handleDeletee(id){
            $('#deactivateMemorialModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deactivateMemorialForm');
            var url = '{{ route('suspend', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
@endsection
