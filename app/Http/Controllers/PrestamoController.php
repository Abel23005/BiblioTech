<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['libro', 'estudiante'])
            ->latest()
            ->paginate(10);
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $libros = Libro::where('disponible', true)->get();
        $estudiantes = Estudiante::where('activo', true)->get();
        return view('prestamos.create', compact('libros', 'estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'estudiante_id' => 'required|exists:estudiantes,id',
            'fecha_prestamo' => 'required|date|before_or_equal:today',
            'fecha_devolucion' => 'required|date|after:fecha_prestamo'
        ], [
            'libro_id.required' => 'Debe seleccionar un libro',
            'estudiante_id.required' => 'Debe seleccionar un estudiante',
            'fecha_prestamo.required' => 'La fecha de préstamo es obligatoria',
            'fecha_prestamo.before_or_equal' => 'La fecha de préstamo no puede ser futura',
            'fecha_devolucion.required' => 'La fecha de devolución es obligatoria',
            'fecha_devolucion.after' => 'La fecha de devolución debe ser posterior a la fecha de préstamo'
        ]);

        $libro = Libro::findOrFail($request->libro_id);
        
        if (!$libro->disponible) {
            return back()
                ->withInput()
                ->with('error', 'El libro seleccionado no está disponible');
        }

        $estudiante = Estudiante::findOrFail($request->estudiante_id);
        $prestamosActivos = $estudiante->prestamos()
            ->where('estado', 'activo')
            ->count();

        if ($prestamosActivos >= config('biblioteca.max_libros', 3)) {
            return back()
                ->withInput()
                ->with('error', 'El estudiante ha alcanzado el límite máximo de préstamos activos');
        }

        $prestamo = Prestamo::create([
            'libro_id' => $request->libro_id,
            'estudiante_id' => $request->estudiante_id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
            'estado' => 'activo'
        ]);

        $libro->update(['disponible' => false]);

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'Préstamo registrado exitosamente');
    }

    public function show(Prestamo $prestamo)
    {
        $prestamo->load(['libro', 'estudiante']);
        return view('prestamos.show', compact('prestamo'));
    }

    public function edit(Prestamo $prestamo)
    {
        $libros = Libro::all();
        $estudiantes = Estudiante::where('activo', true)->get();
        return view('prestamos.edit', compact('prestamo', 'libros', 'estudiantes'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'fecha_devolucion' => 'required|date|after:fecha_prestamo',
            'estado' => 'required|in:activo,devuelto,vencido'
        ]);

        $oldEstado = $prestamo->estado;
        $prestamo->update($request->all());

        // Si el préstamo pasa a estado devuelto, actualizamos la disponibilidad del libro
        if ($request->estado === 'devuelto' && $oldEstado !== 'devuelto') {
            $prestamo->libro->update(['disponible' => true]);
        }
        // Si el préstamo vuelve a estado activo, el libro no está disponible
        elseif ($request->estado === 'activo' && $oldEstado === 'devuelto') {
            $prestamo->libro->update(['disponible' => false]);
        }

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'Préstamo actualizado exitosamente');
    }

    public function destroy(Prestamo $prestamo)
    {
        if ($prestamo->estado === 'activo') {
            $prestamo->libro->update(['disponible' => true]);
        }
        
        $prestamo->delete();

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'Préstamo eliminado exitosamente');
    }
}
