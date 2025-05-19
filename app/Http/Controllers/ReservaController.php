<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return view('seccion', [
            'titulo' => 'Gestión de Reservas',
            'descripcion' => 'Aquí se mostrará la lista de reservas de libros realizadas por los usuarios.'
        ]);
    }

    public function create()
    {
        return view('seccion', [
            'titulo' => 'Registrar Reserva',
            'descripcion' => 'Formulario para registrar una nueva reserva de libro.'
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->route('reservas.index');
    }

    public function show($id)
    {
        return view('seccion', [
            'titulo' => 'Detalle de la Reserva',
            'descripcion' => "Aquí se mostrará la información de la reserva con ID: $id"
        ]);
    }

    public function edit($id)
    {
        return view('seccion', [
            'titulo' => 'Editar Reserva',
            'descripcion' => "Formulario para editar la reserva con ID: $id"
        ]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('reservas.index');
    }

    public function destroy($id)
    {
        return redirect()->route('reservas.index');
    }
}
