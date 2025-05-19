<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        return view('seccion', [
            'titulo' => 'Gestión de Libros',
            'descripcion' => 'Aquí se mostrará la lista de libros disponibles en la biblioteca.'
        ]);
    }

    public function create()
    {
        return view('seccion', [
            'titulo' => 'Registrar Libro',
            'descripcion' => 'Formulario para registrar un nuevo libro en el sistema.'
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->route('libros.index');
    }

    public function show($id)
    {
        return view('seccion', [
            'titulo' => 'Detalle del Libro',
            'descripcion' => "Aquí se mostrará la información del libro con ID: $id"
        ]);
    }

    public function edit($id)
    {
        return view('seccion', [
            'titulo' => 'Editar Libro',
            'descripcion' => "Formulario para editar el libro con ID: $id"
        ]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('libros.index');
    }

    public function destroy($id)
    {
        return redirect()->route('libros.index');
    }
}
