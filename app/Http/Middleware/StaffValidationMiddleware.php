<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffValidationMiddleware
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
        if (Auth::check()){
            if (Auth::user() -> id_role == 2 || Auth::user() -> id_role == 1){
                return $next($request);
            } else {
                return redirect('error');
            }
        } else {
            return redirect('error');
        }
    }
}
