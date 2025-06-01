<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Usuario;
use Carbon\Carbon;

class ReporteController extends Controller
{
    public function prestamos()
    {
        $prestamos = Prestamo::with(['libro', 'usuario'])
            ->latest()
            ->get()
            ->groupBy(function($prestamo) {
                return Carbon::parse($prestamo->fecha_prestamo)->format('Y-m');
            });

        return view('reportes.prestamos', compact('prestamos'));
    }

    public function usuarios()
    {
        $usuarios = Usuario::withCount(['prestamos'])
            ->orderBy('prestamos_count', 'desc')
            ->get();

        return view('reportes.usuarios', compact('usuarios'));
    }
} 