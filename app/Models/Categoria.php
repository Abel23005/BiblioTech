<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relaciones
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}