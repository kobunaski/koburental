<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminValidationMiddleware
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
            $role = Auth::user();
            if ($role -> id_role == 1){
                return $next($request);
            } else {
                return redirect('error');
            }
        } else {
            return redirect('error');
        }
    }
}
