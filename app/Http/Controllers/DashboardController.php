<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Visita;
use App\Models\Mensaje;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'libros' => [
                'total' => Libro::count() ?? 0,
                'disponibles' => Libro::where('disponible', true)->count() ?? 0
            ],
            'estudiantes' => [
                'total' => Usuario::count() ?? 0,
                'activos' => Usuario::where('rol', 'lector')->count() ?? 0
            ],
            'visitas' => [
                'hoy' => 0,
                'mes' => 0
            ],
            'mensajes' => [
                'total' => 0,
                'no_leidos' => 0
            ]
        ];

        return view('dashboard', compact('stats'));
    }
}
