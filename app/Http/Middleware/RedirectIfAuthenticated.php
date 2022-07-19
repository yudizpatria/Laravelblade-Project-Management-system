<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        if (Auth::guard($guard)->check()) {

            $user = auth()->user();

            if ($user->hasRole('admin')) {
                return redirect(route('directure.dashboard'));
            }
            if ($user->hasRole('employee')) {
                return redirect(route('employee.dashboard'));
            }
            if ($user->hasRole('client')) {
                return redirect(route('client.dashboard'));
            }
        }

        return $next($request);
    }
}
