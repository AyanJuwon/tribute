@extends('layouts.errors')
@section('title')
    419 Page
@endsection
@section('content')
<div class="wrapper">

    <div class="error-content text-center padding-vertical-100 wow fadeInUpBig">
        <div class="container">
            <div class="error-head">
                <span>4</span>
                <span>1</span>
                <span>9</span>
            </div>
            <h3 class="h2">Sorry, Session Has Expired :(</h3>
            <p>Don't panic Solution is to Reload :)</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-md">Reload</a>
        </div>
    </div>
</div>
@endsection
