<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\User;
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
        $alumnos = User::where('rol', 'alumno')->get();
        $bibliotecarios = User::where('rol', 'bibliotecario')->get();

        $totalAlumnos = $alumnos->count();
        $totalBibliotecarios = $bibliotecarios->count();

        // Datos para el gráfico: Usuarios registrados por mes
        $registrosPorMes = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, count(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'period' => Carbon::create($item->year, $item->month)->format('Y-m'),
                    'total' => $item->total
                ];
            });

        return view('reportes.usuarios', compact('totalAlumnos', 'totalBibliotecarios', 'registrosPorMes', 'alumnos', 'bibliotecarios'));
    }

    public function alumnos()
    {
        $alumnos = User::where('rol', 'alumno')->get();
        return view('reportes.alumnos', compact('alumnos'));
    }

    public function bibliotecarios()
    {
        $bibliotecarios = User::where('rol', 'bibliotecario')->get();
        return view('reportes.bibliotecarios', compact('bibliotecarios'));
    }
} 