<?php

namespace App\Http\Middleware;

use Closure;

class superAdmin
{
    use Auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'super_admin') {
            return $next($request);
        }
        
        return redirect()->back();
    }
}
