<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        return view('seccion', [
            'titulo' => 'Gestión de Autores',
            'descripcion' => 'Aquí se mostrará la lista de autores registrados en la biblioteca.'
        ]);
    }

    public function create()
    {
        return view('seccion', [
            'titulo' => 'Registrar Autor',
            'descripcion' => 'Formulario para registrar un nuevo autor en el sistema.'
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->route('autores.index');
    }

    public function show($id)
    {
        return view('seccion', [
            'titulo' => 'Detalle del Autor',
            'descripcion' => "Aquí se mostrará la información del autor con ID: $id"
        ]);
    }

    public function edit($id)
    {
        return view('seccion', [
            'titulo' => 'Editar Autor',
            'descripcion' => "Formulario para editar el autor con ID: $id"
        ]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('autores.index');
    }

    public function destroy($id)
    {
        return redirect()->route('autores.index');
    }
}
