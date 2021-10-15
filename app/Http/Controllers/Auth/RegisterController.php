<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        Session::put('backUrl', URL::previous());

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255' ],
            'last_name' => ['required', 'string', 'max:255' ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
            'country' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        $position = Location::get(\request()->ip());
//        $location = $position->cityName . '/' . $position->countryName;

        $name = $data['first_name'] . ' ' . $data['last_name'];

//        dd($name);

        $user = User::create([
            'name' => $name,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ip_address' => \request()->ip(),
            'location' => 'Abuja/Nigeria',
            'role' => 'user',
            'country' => $data['country'],
        ]);

        Mail::to($user)->send(new RegistrationMail($user));

        return $user;

    }

    protected function registered(Request $request, $user)
    {
        $request->session()->flash('flash_notification.success', 'Registration Successful!');
        return redirect()->intended($this->redirectPath());
    }

    public function redirectTo(){
//        $role = Auth::user()->role;
//        switch ($role){
//            case 'admin':
//                return '/login';
//                break;
//            default:
//                return '/about';
//                break;
//        }
        return '/creatememorial';
    }
}
