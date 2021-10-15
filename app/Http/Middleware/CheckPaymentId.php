<?php

namespace App\Http\Middleware;

use Closure;

class CheckPaymentId
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
        $memorial = $request->route()->parameter('memorial');
        $check = \App\Memorial::where('id',$memorial)->firstOrFail();

        if($check->created_by != auth()->user()->id){
            abort(404);
        }

        return $next($request);
    }
}
