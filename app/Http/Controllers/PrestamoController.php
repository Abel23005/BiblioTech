<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        return view('seccion', [
            'titulo' => 'Gestión de Préstamos',
            'descripcion' => 'Aquí se mostrará la lista de préstamos de libros activos o históricos.'
        ]);
    }

    public function create()
    {
        return view('seccion', [
            'titulo' => 'Registrar Préstamo',
            'descripcion' => 'Formulario para registrar un nuevo préstamo de libro.'
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->route('prestamos.index');
    }

    public function show($id)
    {
        return view('seccion', [
            'titulo' => 'Detalle del Préstamo',
            'descripcion' => "Aquí se mostrará la información del préstamo con ID: $id"
        ]);
    }

    public function edit($id)
    {
        return view('seccion', [
            'titulo' => 'Editar Préstamo',
            'descripcion' => "Formulario para editar el préstamo con ID: $id"
        ]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('prestamos.index');
    }

    public function destroy($id)
    {
        return redirect()->route('prestamos.index');
    }
}
