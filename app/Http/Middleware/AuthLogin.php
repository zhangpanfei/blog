<?php

namespace App\Http\Middleware;

use Closure;

class AuthLogin
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
        if(empty(session('admin'))){
            return redirect('admin/login');
        }
        return $next($request);
    }
}
