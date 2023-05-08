<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, String $role)
    {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
            return redirect('/home');

        $roles = Auth::user()->roles->pluck('name')->toArray();

        if (in_array($role, $roles))
            return $next($request);

        return redirect('/home');
    }
}
