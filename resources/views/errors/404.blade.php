<?php
/**
 * tribute
 * Olamiposi
 * 12/10/2020
 * 21:13
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.errors')
@section('title')
    404 Page :(
@endsection
@section('content')

<div class="wrapper">

        <div class="error-content text-center padding-vertical-100 wow fadeInUpBig">
            <div class="container">
                <div class="error-head">
                    <span>4</span>
                    <span>0</span>
                    <span>4</span>
                </div>
                <h3 class="h2">Url not found.</h3>
                <p>Seems that the page you're looking for does not exist or has been removed :(</p>
                <a href={{route('landing')}}#" class="btn btn-primary btn-md">Back to Homepage</a>
            </div>
        </div>


</div>

@endsection

