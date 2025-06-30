<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->esEstudiante()) {
                return redirect()->route('home')->with('error', 'Acceso no autorizado.');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $user = auth()->user();
        $prestamos = Prestamo::where('usuario_id', $user->id)
                           ->where('estado', 'activo')
                           ->with('libro')
                           ->get();
        
        $reservas = Reserva::where('usuario_id', $user->id)
                          ->where('estado', 'pendiente')
                          ->with('libro')
                          ->get();
        
        $libros_recomendados = Libro::inRandomOrder()
                                   ->take(4)
                                   ->get();
        
        $universidades = \App\Models\Universidad::all();

        return view('alumno.dashboard', compact('prestamos', 'reservas', 'libros_recomendados', 'universidades'));
    }

    public function perfil()
    {
        $user = auth()->user();
        return view('alumno.perfil', ['estudiante' => $user]);
    }

    public function actualizarPerfil(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['nombre', 'email']));

        return redirect()->route('alumno.perfil')->with('status', 'Perfil actualizado correctamente');
    }

    public function prestamos()
    {
        $prestamos = Prestamo::where('usuario_id', auth()->id())
            ->with('libro')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('alumno.prestamos', compact('prestamos'));
    }

    public function misReservas()
    {
        $reservas = Reserva::where('usuario_id', auth()->id())
                         ->with('libro')
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);

        return view('alumno.reservas', compact('reservas'));
    }

    public function buscarLibros(Request $request)
    {
        $query = $request->get('q');
        
        $libros = Libro::when($query, function($q) use ($query) {
                        return $q->where('titulo', 'like', "%{$query}%")
                                ->orWhere('autor', 'like', "%{$query}%");
                    })
                    ->paginate(12);

        return view('alumno.buscar-libros', compact('libros', 'query'));
    }

    public function reservarLibro(Libro $libro)
    {
        // Verificar si ya tiene una reserva activa para este libro
        $reservaExistente = Reserva::where('usuario_id', auth()->id())
                                 ->where('libro_id', $libro->id)
                                 ->where('estado', 'pendiente')
                                 ->exists();

        if ($reservaExistente) {
            return back()->with('error', 'Ya tienes una reserva activa para este libro.');
        }

        Reserva::create([
            'usuario_id' => auth()->id(),
            'libro_id' => $libro->id,
            'fecha_reserva' => now(),
            'estado' => 'pendiente'
        ]);

        return back()->with('status', 'Libro reservado correctamente.');
    }

    public function cancelarReserva(Reserva $reserva)
    {
        if ($reserva->usuario_id !== auth()->id()) {
            abort(403);
        }

        $reserva->update(['estado' => 'cancelada']);

        return back()->with('status', 'Reserva cancelada correctamente.');
    }
} 