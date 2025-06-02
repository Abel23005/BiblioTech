<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::latest()->paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:estudiantes,codigo',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:estudiantes,email',
            'telefono' => 'nullable|string|max:20',
            'carrera' => 'required|string',
            'semestre' => 'required|integer|min:1|max:10',
            'direccion' => 'nullable|string',
            'activo' => 'boolean'
        ], [
            'codigo.required' => 'El código de estudiante es obligatorio',
            'codigo.unique' => 'Este código de estudiante ya está registrado',
            'nombre.required' => 'El nombre es obligatorio',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico debe ser válido',
            'email.unique' => 'Este correo electrónico ya está registrado',
            'carrera.required' => 'La carrera es obligatoria',
            'semestre.required' => 'El semestre es obligatorio',
            'semestre.min' => 'El semestre debe ser mínimo 1',
            'semestre.max' => 'El semestre debe ser máximo 10'
        ]);

        $estudiante = Estudiante::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'carrera' => $request->carrera,
            'semestre' => $request->semestre,
            'direccion' => $request->direccion,
            'activo' => $request->has('activo')
        ]);

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante registrado exitosamente');
    }

    public function show(Estudiante $estudiante)
    {
        $estudiante->load('prestamos');
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'codigo' => 'required|string|unique:estudiantes,codigo,' . $estudiante->id,
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:estudiantes,email,' . $estudiante->id,
            'telefono' => 'nullable|string|max:20',
            'carrera' => 'required|string',
            'semestre' => 'required|integer|min:1|max:10',
            'direccion' => 'nullable|string',
            'activo' => 'boolean'
        ]);

        $estudiante->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'carrera' => $request->carrera,
            'semestre' => $request->semestre,
            'direccion' => $request->direccion,
            'activo' => $request->has('activo')
        ]);

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente');
    }

    public function destroy(Estudiante $estudiante)
    {
        if ($estudiante->prestamos()->where('estado', 'activo')->exists()) {
            return back()->with('error', 'No se puede eliminar un estudiante que tiene préstamos activos');
        }

        try {
            $estudiante->delete();
            return redirect()
                ->route('estudiantes.index')
                ->with('success', 'Estudiante eliminado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo eliminar el estudiante. Por favor, inténtalo de nuevo.');
        }
    }
} 