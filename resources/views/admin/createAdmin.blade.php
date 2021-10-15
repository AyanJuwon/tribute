<?php
/**
 * tribute
 * Olamiposi
 * 28/10/2020
 * 20:34
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
Add Admin
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Add Admin</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body justify-content-center text-center">
                    <div>
                        <h6 class="card-title mb-4">Admin Registration Form</h6>
{{--                        <p class="text-muted card-sub-title">A form control layout using basic layout.</p>--}}
                    </div>
                    <form method="POST" action="{{ route('admin.store') }}">
                        @csrf

                        <div class="">
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Name</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                @if(!empty($name))
                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $name }}" required autocomplete="name" autofocus placeholder="Enter Name" type="text">
                                @else
                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Name" type="text">
                                @endif

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Email</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                @if(!empty($email))
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email  }}" required autocomplete="email" placeholder="Enter email" type="email">
                                @else
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')  }}" required autocomplete="email" placeholder="Enter email" type="email">
                                @endif

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Password</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password" type="password">


                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0">Confirm Password</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter password" type="password">
                                </div>
                            </div>
                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5">Register</button>
                                <a href="{{ route('allAdmin') }}" class="btn ripple btn-secondary pd-x-30">Cancel</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
