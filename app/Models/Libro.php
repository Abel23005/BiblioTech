<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor_id',
        'editorial',
        'anio_publicacion',
        'isbn',
        'categoria_id',
        'disponible',
    ];

    protected $casts = [
        'disponible' => 'boolean',
    ];

    // Relaciones
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}