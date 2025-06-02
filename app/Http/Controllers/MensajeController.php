<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = Mensaje::with(['estudiante', 'respondedor'])
            ->latest()
            ->paginate(10);
        
        return view('mensajes.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string',
            'tipo' => 'required|in:consulta,problema,sugerencia'
        ]);

        $mensaje = Mensaje::create([
            'estudiante_id' => auth()->user()->estudiante->id,
            'mensaje' => $request->mensaje,
            'tipo' => $request->tipo
        ]);

        return redirect()
            ->route('mensajes.show', $mensaje)
            ->with('success', 'Mensaje enviado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensaje $mensaje)
    {
        $mensaje->load(['estudiante', 'respondedor']);
        
        if (!$mensaje->leido_at && auth()->user()->id === $mensaje->estudiante_id) {
            $mensaje->update(['leido_at' => now()]);
        }

        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function responder(Request $request, Mensaje $mensaje)
    {
        $request->validate([
            'respuesta' => 'required|string'
        ]);

        $mensaje->update([
            'respuesta' => $request->respuesta,
            'estado' => 'respondido',
            'respondido_por' => auth()->id()
        ]);

        return redirect()
            ->route('mensajes.show', $mensaje)
            ->with('success', 'Respuesta enviada exitosamente');
    }

    public function cerrar(Mensaje $mensaje)
    {
        $mensaje->update(['estado' => 'cerrado']);

        return redirect()
            ->route('mensajes.show', $mensaje)
            ->with('success', 'Conversación cerrada');
    }
}
