<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        
        if ($user->rol === 'alumno') {
            if ($user->universidad_id === null) {
                return redirect()->route('seleccionar.universidad');
            }
            return redirect()->route('alumno.dashboard');
        }
        
        if ($user->rol === 'administrador') {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('home');
    }
}
