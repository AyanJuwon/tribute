<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Vinkla\Hashids\Facades\Hashids;

class CheckId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route()->parameter('id');

        if ($id != auth()->user()->id){
            abort(404);
        }
        return $next($request);
    }
}
