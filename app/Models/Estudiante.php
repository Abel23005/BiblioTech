<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'usuario_id',
        'codigo',
        'nombre',
        'telefono',
        'carrera',
        'semestre',
        'universidad',
        'direccion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'semestre' => 'integer'
    ];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con préstamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'estudiante_id');
    }

    // Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'estudiante_id');
    }
} 