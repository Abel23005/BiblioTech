<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministradorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->rol !== 'administrador') {
            return redirect()->route('home')->with('error', 'Acceso no autorizado.');
        }

        return $next($request);
    }
} 