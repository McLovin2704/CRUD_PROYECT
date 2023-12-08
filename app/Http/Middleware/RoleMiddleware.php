<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        // Verificar si el usuario tiene el rol adecuado
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::check() && Auth::user()->role === 'client') {
            return redirect()->route('client.dashboard');
        } else {
            return redirect('/'); // Cambia esto según tus necesidades
        }
    }
}
