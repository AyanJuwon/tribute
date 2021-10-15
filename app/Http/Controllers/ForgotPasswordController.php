<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function forgot(){
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return session()->flash('message', 'Reset Password link sent to your email address');
    }

    public function showLinkRequestForm(Request $request ,$token){
        return view('auth.passwords.reset')
            ->with('token', $token)
            ->with('email', $request->email);
    }
}
