<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::latest()->paginate(10);
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|unique:libros,isbn',
            'categoria' => 'required|string',
            'descripcion' => 'nullable|string',
            'ubicacion' => 'nullable|string|max:50',
            'estado' => 'required|in:nuevo,bueno,regular,deteriorado'
        ], [
            'titulo.required' => 'El título es obligatorio',
            'autor.required' => 'El autor es obligatorio',
            'isbn.required' => 'El ISBN es obligatorio',
            'isbn.unique' => 'Este ISBN ya está registrado',
            'categoria.required' => 'La categoría es obligatoria',
            'estado.required' => 'El estado es obligatorio',
            'estado.in' => 'El estado seleccionado no es válido'
        ]);

        $libro = Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'isbn' => $request->isbn,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'estado' => $request->estado,
            'disponible' => true
        ]);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro registrado exitosamente');
    }

    public function show(Libro $libro)
    {
        $libro->load('prestamos');
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|unique:libros,isbn,' . $libro->id,
            'categoria' => 'required|string',
            'descripcion' => 'nullable|string',
            'ubicacion' => 'nullable|string|max:50',
            'estado' => 'required|in:nuevo,bueno,regular,deteriorado',
            'disponible' => 'boolean'
        ]);

        $libro->update($request->all());

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Libro $libro)
    {
        if ($libro->prestamos()->where('estado', 'activo')->exists()) {
            return back()->with('error', 'No se puede eliminar un libro que tiene préstamos activos');
        }

        $libro->delete();

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro eliminado exitosamente');
    }
}
