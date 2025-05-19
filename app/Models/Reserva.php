<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'libro_id',
        'usuario_id',
        'fecha_reserva',
        'estado',
    ];

    protected $casts = [
        'fecha_reserva' => 'date',
    ];

    // Relaciones
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}