<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('seccion', [
            'titulo' => 'Gestión de Categorías',
            'descripcion' => 'Aquí se mostrará la lista de categorías utilizadas para clasificar los libros.'
        ]);
    }

    public function create()
    {
        return view('seccion', [
            'titulo' => 'Registrar Categoría',
            'descripcion' => 'Formulario para registrar una nueva categoría de libros.'
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->route('categorias.index');
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
        return view('seccion', [
            'titulo' => 'Editar Categoría',
            'descripcion' => "Formulario para editar la categoría con ID: $id"
        ]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        return redirect()->route('categorias.index');
    }
}
