@extends('layouts.auth')

@section('title')
    Login
@endsection
@section('side-text')
    
                    <h1 class="box__text">Create <br> beautiful <br> memories.</h1>
@endsection
@section('page-function')
      <h2 class="section-heading">Sign In</h2>
                        <p class="section-sub-heading">Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></p>
@endsection

@section('auth-form')

                    <form method="POST" class="form-sign" action="{{ route('login') }}">
                        @csrf

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

                        <div class="form-sign__group">
                            <label class="form-sign__label" for="email">Email</label>
                            <input id="email" class="form-sign__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email" type="email" >

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                      

                        <div class="form-sign__group">
                            <label class="form-sign__label" for="password">Password</label>
                            <input id="password" class="form-sign__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" type="password">
                            <span class="form-sign__iconPass">
                                    <img src="/assets/img/show-password.svg" id="show">
                                    <img src="/assets/img/hide-password.svg" id="hide">
                                </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                         <input type="submit" value="sign in" class="form-sign__sign-up">
                    
                
                    </form>


@endsection
