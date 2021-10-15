<?php
/**
 * tribute2
 * Olamiposi
 * 03/06/2021
 * 07:21
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    User Detail
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{ $user->name }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Detail</li>
                </ol>
            </div>
        </div>
        <div class="row">

        <div class="col-lg-8 col-md-12">
            <div class="card custom-card main-content-body-profile">
                <nav class="nav main-nav-line">
                    <a class="nav-link active" data-toggle="tab" href="#tab1over">Overview</a>
                </nav>
                <div class="card-body tab-content h-100">
                    <div class="tab-pane active" id="tab1over">
                        <div class="main-content-label tx-13 mg-b-20">
                            User Information
                        </div>
                        <div class="table-responsive ">
                            <table class="table row table-borderless">
                                <tbody class="col-lg-12 col-xl-6 p-0">
                                <tr>
                                    <td><strong>Location : </strong> {{ $user->location }}</td>
                                </tr>
                                <tr>
                                    <td><strong>IP Address : </strong> {{ $user->ip_address }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Registered Date : </strong> {{ $user->created_at->format('M d, Y') }}</td>
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
