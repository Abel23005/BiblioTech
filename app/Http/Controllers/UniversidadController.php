<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;
use App\Models\User;

class UniversidadController extends Controller
{
    public function index()
    {
        $universidades = Universidad::latest()->paginate(10);
        return view('universidads.index', compact('universidades'));
    }

    public function create()
    {
        return view('universidads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:universidads',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:universidads',
        ], [
            'nombre.required' => 'El nombre de la universidad es obligatorio.',
            'nombre.unique' => 'Ya existe una universidad con este nombre.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'Ya existe una universidad con este correo electrónico.',
        ]);

        Universidad::create($request->all());

        return redirect()
            ->route('universidads.index')
            ->with('success', 'Universidad creada exitosamente.');
    }

    public function show(Universidad $universidad)
    {
        return view('universidads.show', compact('universidad'));
    }

    public function edit(Universidad $universidad)
    {
        return view('universidads.edit', compact('universidad'));
    }

    public function update(Request $request, Universidad $universidad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:universidads,nombre,' . $universidad->id,
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:universidads,email,' . $universidad->id,
        ], [
            'nombre.required' => 'El nombre de la universidad es obligatorio.',
            'nombre.unique' => 'Ya existe una universidad con este nombre.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'Ya existe una universidad con este correo electrónico.',
        ]);

        $universidad->update($request->all());

        return redirect()
            ->route('universidads.index')
            ->with('success', 'Universidad actualizada exitosamente.');
    }

    public function destroy(Universidad $universidad)
    {
        if ($universidad->estudiantes()->exists()) {
            return back()->with('error', 'No se puede eliminar la universidad porque tiene estudiantes asociados.');
        }

        try {
            $universidad->delete();
            return redirect()
                ->route('universidads.index')
                ->with('success', 'Universidad eliminada exitosamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo eliminar la universidad. Por favor, inténtalo de nuevo.');
        }
    }

    public function mostrarFormulario()
    {
        if (auth()->user()->universidad !== null) {
            return redirect()->route('alumno.dashboard');
        }
        return view('universidad.seleccionar');
    }

    public function guardarUniversidad(Request $request)
    {
        $request->validate([
            'universidad' => 'required|in:TECSUP,UTP,UPN,UPC'
        ]);

        $user = auth()->user();
        $user->universidad = $request->universidad;
        $user->save();

        return redirect()->route('alumno.dashboard')->with('status', 'Universidad seleccionada correctamente');
    }
} 