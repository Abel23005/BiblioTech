<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categorias = Categoria::where('universidad_id', $user->universidad_id)->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
        $user = Auth::user();
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'universidad_id' => $user->universidad_id,
        ]);
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function show($id)
    {
        return view('seccion', [
            'titulo' => 'Detalle de la Categoría',
            'descripcion' => "Aquí se mostrará la información de la categoría con ID: $id"
        ]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $categoria = Categoria::where('id', $id)->where('universidad_id', $user->universidad_id)->firstOrFail();
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
        $user = Auth::user();
        $categoria = Categoria::where('id', $id)->where('universidad_id', $user->universidad_id)->firstOrFail();
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $categoria = Categoria::where('id', $id)->where('universidad_id', $user->universidad_id)->firstOrFail();
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
