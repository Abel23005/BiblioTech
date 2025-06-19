<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'libro_id',
        'usuario_id',
        'fecha_reserva',
        'fecha_vencimiento',
        'estado'
    ];

    protected $casts = [
        'fecha_reserva' => 'datetime',
        'fecha_vencimiento' => 'datetime'
    ];

    // Relaciones
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}