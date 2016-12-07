<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BusinessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param \Closure                 $next    Next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isBusiness()) {
            return $next($request);
        }
        return redirect('business/login');
    }
}
