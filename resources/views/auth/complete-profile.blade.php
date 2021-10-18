@extends('layouts.auth')
@section('title')
   Complete Registeration
@endsection

           @section('side-text')
                <h1 class="box__text">Celebrate <br> the life of <br> loved ones.</h1>
           @endsection
                    @section('auth-form')
                          <form method="POST" action="{{ route('completeProfile') }}">
                        @csrf
                            <h2>Welcome, {{auth()->user>->name}}</h2>


                            


                            

                            <div class="form-sign__group"> 
                                @if(!empty($country))
                                <select id="country" name="country" class="form-sign__select @error('country') is-invalid @enderror">
                                    
										<option selected disabled>Select Country</option>
                                 <option value="Nigeria">Nigeria</option>
                                    <option value="Australia">Australia</option>
                                </select>
                            @else
                                        <select id="country" name="country" class="form-sign__select @error('country') is-invalid @enderror">
                                            
										<option selected disabled>Select Country</option>
                                           <option value="Nigeria">Nigeria</option>
                                    <option value="Australia">Australia</option>
                                        </select>
                            @endif

                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                          


                           

                            <input type="submit" value="Complete Registration" class="form-sign__sign-up">
                        </form>



                           
                        
                        
                        

                
                    @endsection
                  
                   
                   
                
           
    
