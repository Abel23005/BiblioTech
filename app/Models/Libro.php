<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'categoria',
        'descripcion',
        'ubicacion',
        'estado',
        'disponible'
    ];

    protected $casts = [
        'disponible' => 'boolean'
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

    public function prestamo_actual()
    {
        return $this->prestamos()->where('estado', 'activo')->first();
    }
}