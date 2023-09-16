<?php

namespace App\Http\Middleware;

use Closure;
use Auth, Redirect;

class VerifyBannedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		if(Auth::guard($guard)->check() && Auth::guard($guard)->user()->banned)
		{
			Auth::guard($guard)->logout();
			return Redirect::route('login')->withErrors([trans('frontend/global.app_banned')]);
		}
        return $next($request);
    }
}
