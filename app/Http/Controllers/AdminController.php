<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Reserva;
use App\Models\Universidad;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->esAdministrador()) {
                return redirect()->route('home')->with('error', 'Acceso no autorizado.');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $total_libros = Libro::count();
        $prestamos_activos = Prestamo::where('estado', 'activo')->count();
        $reservas_pendientes = Reserva::where('estado', 'pendiente')->count();
        $total_usuarios = User::where('rol', 'alumno')->count();

        $ultimos_prestamos = Prestamo::with(['libro', 'usuario'])
                                   ->orderBy('created_at', 'desc')
                                   ->take(5)
                                   ->get();

        $ultimas_reservas = Reserva::with(['libro', 'usuario'])
                                 ->orderBy('created_at', 'desc')
                                 ->take(5)
                                 ->get();

        return view('admin.dashboard', compact(
            'total_libros',
            'prestamos_activos',
            'reservas_pendientes',
            'total_usuarios',
            'ultimos_prestamos',
            'ultimas_reservas'
        ));
    }

    public function showCodes()
    {
        $universidades = Universidad::all();
        return view('admin.codigos', compact('universidades'));
    }
} 