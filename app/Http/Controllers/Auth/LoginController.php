<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/about';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->redirectTo = '/';
        $this->middleware('guest')->except('logout');
        Session::put('backUrl', URL::previous());
    }

    public function socialLogin($social){
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social){
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if($user){
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }else {
            return view('auth.register', ['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        }
    }

    protected function authenticated(Request $request, $user)
    {
            $request->session()->flash('flash_notification.success', 'Sign In Successful');
            return redirect()->intended($this->redirectPath());
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        return Arr::add($credentials, 'isBan', 0);
    }

    public function logout(Request $request) {
        $role = Auth::user()->role;
        switch ($role){
            case 'admin':
                Auth::logout();
                return redirect('/login');
                break;
            default:
                Auth::logout();
                return redirect(Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo);
                break;
        }
    }

    public function redirectTo(){
        $role = Auth::user()->role;
        switch ($role){
            case 'admin':
                return '/home';
                break;
            default:
                return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
                break;
            }
        }
}
