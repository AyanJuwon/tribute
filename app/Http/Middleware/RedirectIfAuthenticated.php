<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;
            switch ($role){
                case 'admin':
                    return redirect('/home');
                    break;
                default:
                    return redirect(Session::get('backUrl'));
                    break;
            }
        }

        return $next($request);
    }
}
//    public function handle($request, Closure $next, $guard = null) {
//        if (Auth::guard($guard)->check()) {
//            $role = Auth::user()->role;
//
//            switch ($role) {
//                case 'admin':
//                    return redirect('/home');
//                    break;
//
//                default:
//                    return redirect('/about');
//                    break;
//            }
//        }
//        if ($this->auth->check()) {
//            return redirect('/home');
//        }

//        return $next($request);
//    }
//}
