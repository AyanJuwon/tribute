<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

use App\Models\User;
use App\Models\SocialAccount;
class SocialController extends Controller
{
 public function redirectToProvider(String $provider){
        return \Socialite::driver($provider)->redirect();
    }

    public function providerCallback(String $provider){
        try{
            $social_user = \Socialite::driver($provider)->user();

            // First Find Social Account
            $account = SocialAccount::where([
                'provider_name'=>$provider,
                'provider_id'=>$social_user->getId()
            ])->first();

            // If Social Account Exist then Find User and Login
            if($account){
                auth()->login($account->user);
                return redirect()->route('landing');
            }

            // Find User
            $user = User::where([
                'email'=>$social_user->getEmail()
            ])->first();

            // If User not get then create new user
            if(!$user){
                $user = User::create([
                    'email'=>$social_user->getEmail(),
                    'name'=>$social_user->getName(),
                    'password'=>Hash::make('password'),
                    'role' => 'user',
            'ip_address' => null,
            'location' => null,
            'country' => null,
            
                'provider_id'=>$social_user->getId(),
                'provider_name'=>$provider,
                ]);
                dd($user);
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
            return redirect()->route('user.dashboard');
            // return redirect()->route('landing');

        }catch(\Exception $e){

            dd($e->getMessage());
            return redirect()->route('login');
        }
    }   
    
    public function completeProfilePage($user){
        
        $user = User::where('id', auth()->user()->id)->firstOrFail();
        return view('auth.complete-profile');
    }

    
       public function completeProfile(Request $request,$id){
        $user = User::where('id', $id)->where('role','user')->firstOrFail();
        $user->update([
            'ip_address' => \request()->ip(),
            'location' => $request->country,
            'country' => $request->country,
        ]);
    session()->flash('message','Account creates successfully');
 return redirect()->route('landing');
}
}