<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $roles = Auth::user()->roles->pluck('name')->toArray();
                switch ($roles) {
                    case in_array('Admin', $roles):
                        return redirect('/admin');
                        break;
                    case in_array('User', $roles):
                        return redirect('/user');
                        break;

                    default:
                        return redirect('/home');
                        break;
                }
            }
        }

        return $next($request);
    }
}
