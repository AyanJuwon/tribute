<?php
/**
 * tribute2
 * Olamiposi
 * 15/12/2020
 * 19:54
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.errors')
@section('title')
    403 Page :(
@endsection
@section('content')
    <div class="wrapper">

        <div class="error-content text-center padding-vertical-100 wow fadeInUpBig">
            <div class="container">
                <div class="error-head">
                    <span>4</span>
                    <span>0</span>
                    <span>3</span>
                </div>
                <h3 class="h2">Url not found.</h3>
                <p>Seems the website you are looking for has expired, contact the Creator</p>
                <a href="{{route('landing')}}" class="btn btn-primary btn-md" >Back to Homepage</a>
            </div>
        </div>


    </div>
@endsection
