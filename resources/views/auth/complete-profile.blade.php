@extends('layouts.dashboard')
@section('title')
   Complete Registeration
@endsection
@section('css')

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
@endsection
@section('content')
 <main>
            <section class="dashboard profile-edit-container">
                <div class="profile-top">
                    <h4 class="profile-heading">Edit Account</h4>
                </div>

                <div class="profile-edit">
                    <div class="profile-body__form">
                        <form class="edit-form form-grid" method="POST" action="{{route('user.completeProfile')}}">
                            <div class="edit-form__group">
                                <label for="firstname" class="edit-form__label">First Name</label>
                                <input type="text" name="first_name" value="{{}}" class="edit-form__input" id="firstname">
                            </div>
                            <div class="edit-form__group">
                                <label for="lastname" class="edit-form__label">Last Name</label>
                                <input type="text" name="last_name" class="edit-form__input" id="lastname">
                            </div>
                            <div class="edit-form__group">
                                <label for="phone" class="edit-form__label">Phone Number</label>
                                <input type="tel" name="phoneNumber" class="edit-form__input" id="phone">
                            </div>
                            <div class="edit-form__group">
                                <label for="email" class="edit-form__label">Email</label>
                                <input type="email" name="email" class="edit-form__input" id="email">
                            </div>
                            <div class="edit-form__group">
                                <label for="country" class="edit-form__label">Country</label>
                                <select name="country" class="edit-form__select">
                                    <option  selected disabled>Select Country</option>
                                    <option value="nigeria">Nigeria</option>
                                    <option value="nigeria">Australia</option>
                                </select>
                            </div>
                        
                    </div>
                </div>

                <div class="profile-save">
                    <input type="submit" class="save-changes-button" value="Save Changes">
                </div>
            </form>
            </section>
        </main>

                    @endsection
                  
                   
                   
                
           
    
