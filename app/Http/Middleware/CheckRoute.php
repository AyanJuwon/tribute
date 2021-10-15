<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoute
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
        $slug = $request->route()->parameter('slug');
        $check = \App\Memorial::where('slug',$slug)->where('active',true)->exists();

        if (!$check){
            abort(404);
        }

        return $next($request);
    }
}
