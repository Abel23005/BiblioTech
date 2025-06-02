<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'libro_id',
        'usuario_id',
        'estudiante_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
    ];

    protected $casts = [
        'fecha_prestamo' => 'date',
        'fecha_devolucion' => 'date',
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

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}