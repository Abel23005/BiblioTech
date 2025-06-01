<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'codigo',
        'nombre',
        'email',
        'telefono',
        'carrera',
        'semestre',
        'direccion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'semestre' => 'integer'
    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
} 