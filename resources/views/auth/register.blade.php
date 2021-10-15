@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('page-function')
  <h2 class="section-heading">Sign Up</h2>
                        <p class="section-sub-heading">Already have an account? <a href="{{route('login')}}">Sign In</a></p>
    
@endsection
           @section('side-text')
                <h1 class="box__text">Celebrate <br> the life of <br> loved ones.</h1>
           @endsection
                    @include('partials.list_error')
                    @section('auth-form')
                          <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-sign__group">
                                  
                            @if(!empty($first_name))
                            <input class="form-sign__input" @error('first_name') is-invalid @enderror" name="first_name" value="{{ $first_name }}" required autocomplete="name" autofocus placeholder="First name" type="text">
                            @else
                            <input class="form-sign__input" @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus placeholder="First name" type="text">
                            @endif

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="first_name" class="form-sign__label">First Name</label>
                            </div>


                            <div class="form-sign__group">         
                            @if(!empty($last_name))
                            <input class="form-sign__input" @error('last_name') is-invalid @enderror name="last_name" value="{{ $last_name }}" required autocomplete="last_name" autofocus placeholder="Last name" type="text">
                            @else
                            <input class="form-sign__input" @error('last_name') is-invalid @enderror name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last name" type="text">
                            @endif

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                <label for="last_name" class="form-sign__label">Last Name</label>
                            </div>



                            <div class="form-sign__group"> 
                                 @if(!empty($email))
                            <input class="form-sign__input @error('email') is-invalid @enderror" name="email" value="{{ $email  }}" required autocomplete="email" placeholder="Enter your email" type="text">
                            @else
                            <input class="form-sign__input @error('email') is-invalid @enderror" name="email" value="{{ old('email')  }}" required autocomplete="email" placeholder="Enter your email" type="text">
                            @endif

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                <label for="email" class="form-sign__label">Email Address</label>
                            </div>


                            <div class="form-sign__group"> 
                                @if(!empty($country))
                                <select id="country" name="country" class="form-sign__select @error('country') is-invalid @enderror">
                                    
										<option selected disabled>Select Country</option>
                                 <option value="nigeria">Nigeria</option>
                                    <option value="nigeria">Australia</option>
                                </select>
                            @else
                                        <select id="country" name="country" class="form-sign__select @error('country') is-invalid @enderror">
                                            
										<option selected disabled>Select Country</option>
                                           <option value="nigeria">Nigeria</option>
                                    <option value="nigeria">Australia</option>
                                        </select>
                            @endif

                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                            <div class="form-sign__group"> 
                                <input class="form-sign__input  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password" type="password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                <label for="password" class="form-sign__label">Password</label>
                                <span class="form-sign__iconPass">
                                    <img src="/assets/img/show-password.svg" id="show">
                                    <img src="/assets/img/hide-password.svg" id="hide">
                                </span>
                            </div>


                            <div class="form-sign__group">
                                <input name="password_confirmation" type="password" class="form-sign__input" id="confirmPassword" required placeholder="Confirm Password">
                                <label for="password" class="form-sign__label">Confirm Password</label>
                                <span class="form-sign__icon-confirmPass">
                                    <img src="/assets/img/show-password.svg" id="showConfirm">
                                    <img src="/assets/img/hide-password.svg" id="hideConfirm">
                                </span>
                            </div>

                            <input type="submit" value="sign up" class="form-sign__sign-up">
                        </form>



                           
                        
                        
                        

                
                    @endsection
                  
                   
                   
                
           
    
