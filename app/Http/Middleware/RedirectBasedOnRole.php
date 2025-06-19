<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->rol === 'alumno') {
                if ($user->universidad === null) {
                    return redirect()->route('seleccionar.universidad');
                }
                return redirect()->route('alumno.dashboard');
            }
            
            if ($user->rol === 'administrador') {
                return redirect()->route('admin.dashboard');
            }
            
            if ($user->rol === 'bibliotecario') {
                return redirect()->route('bibliotecario.dashboard');
            }
        }

        return $next($request);
    }
} 