<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

use App\User;
use App\SocialAccount;
class SocialController extends Controller
{

    public function redirectToProvider(String $provider){
        return Socialite::driver($provider)->redirect();
    }

    public function providerCallback(String $provider){
        try{
            $social_user = Socialite::driver($provider)->user();

            // First Find Social Account
            $account = SocialAccount::where([
                'provider_name'=>$provider,
                'provider_id'=>$social_user->getId()
            ])->first();

            // If Social Account Exist then Find User and Login
            if($account){
                auth()->login($account->user);
                return redirect()->back();
            }

            // Find User
            $user = User::where([
                'email'=>$social_user->getEmail()
            ])->first();

            // If User not get then create new user
            if(!$user){
                $user = User::create([
                    'email'=> $social_user->getEmail(),
                    'name'=> $social_user->getName(),
                    'password'=> Hash::make('password'),
                    'role' => 'user',
                    'ip_address' => null,
                    'location' => "Nigeria",
                    'country' => 'Nigeria',
                    'provider_id'=> $social_user->getId(),
                    'provider_name'=>$provider,
                ]);
//                dd($user);
            }

            // Create Social Accounts
            $user->socialAccounts()->create([
                'provider_id'=>$social_user->getId(),
                'provider_name'=>$provider
            ]);

            // Login
            auth()->login($user);
            // complete profile here redirect to complete profile page
            // completeProfilePage($user);
            return redirect()->route('user.CompleteProfileForm');
            // return redirect()->route('landing');

        }catch(\Exception $e){
            Log::info($e->getMessage());
            return redirect()->route('login');
        }
    }

   
}