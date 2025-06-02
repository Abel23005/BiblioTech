<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'mensaje',
        'tipo',
        'estado',
        'respuesta',
        'respondido_por',
        'leido_at'
    ];

    protected $casts = [
        'leido_at' => 'datetime',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function respondedor()
    {
        return $this->belongsTo(Usuario::class, 'respondido_por');
    }
} 