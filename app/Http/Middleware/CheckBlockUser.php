<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class CheckBlockUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request [value input]
     * @param \Closure                 $next    [description]
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id != config('constants.BLOCK_USER')) {
            return $next($request);
        }
        Session::flash('msg', trans('message.your_account_is_block'));
        return redirect('/');
    }
}
