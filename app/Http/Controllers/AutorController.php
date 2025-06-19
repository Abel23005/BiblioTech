<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::latest()->paginate(10);
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:autors',
            'biografia' => 'nullable|string',
        ], [
            'nombre.required' => 'El nombre del autor es obligatorio.',
            'nombre.unique' => 'Ya existe un autor con este nombre.',
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor creado exitosamente.');
    }

    public function show(Autor $autor)
    {
        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:autors,nombre,' . $autor->id,
            'biografia' => 'nullable|string',
        ], [
            'nombre.required' => 'El nombre del autor es obligatorio.',
            'nombre.unique' => 'Ya existe un autor con este nombre.',
        ]);

        $autor->update($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor actualizado exitosamente.');
    }

    public function destroy(Autor $autor)
    {
        if ($autor->libros()->exists()) {
            return back()->with('error', 'No se puede eliminar el autor porque tiene libros asociados.');
        }

        try {
            $autor->delete();
            return redirect()->route('autores.index')->with('success', 'Autor eliminado exitosamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo eliminar el autor. Por favor, inténtalo de nuevo.');
        }
    }
}
