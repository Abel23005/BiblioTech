<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Reserva;

class BibliotecarioController extends Controller
{
    public function dashboard()
    {
        $totalLibros = Libro::count();
        $prestamosActivos = Prestamo::where('estado', 'activo')->count();
        $reservasPendientes = Reserva::where('estado', 'pendiente')->count();

        return view('bibliotecario.dashboard', compact('totalLibros', 'prestamosActivos', 'reservasPendientes'));
    }
}
