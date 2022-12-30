<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminLoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('role') !== 0){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
