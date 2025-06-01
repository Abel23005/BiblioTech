<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'motivo',
        'hora_entrada',
        'hora_salida'
    ];

    protected $casts = [
        'hora_entrada' => 'datetime',
        'hora_salida' => 'datetime'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
} 