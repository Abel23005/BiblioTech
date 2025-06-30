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
        'portada',
        'ubicacion',
        'estado',
        'disponible',
        'universidad_id'
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

    // Relación muchos a muchos: usuarios que marcaron como favorito
    public function usuariosFavoritos()
    {
        return $this->belongsToMany(User::class, 'favoritos', 'libro_id', 'usuario_id')->withTimestamps();
    }

    public function universidad()
    {
        return $this->belongsTo(\App\Models\Universidad::class);
    }
}