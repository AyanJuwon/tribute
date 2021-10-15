<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class CheckDate
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
        $check = \App\Memorial::where('slug',$slug)->firstOrFail();
        $date = $check->expiry_date;

        if (Carbon::now() >= $date){
            abort(403);
//            return view('errors.date');
        }

        return $next($request);
    }
}
