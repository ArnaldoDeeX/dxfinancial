<?php

namespace App\Http\Middleware;

use App\Models\Auth;
use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::is_logged()){
            return redirect('login');
        }
        return $next($request);
    }
}
