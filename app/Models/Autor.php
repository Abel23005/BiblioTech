<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    
    protected $fillable = [
        'nombre',
        'nacionalidad',
        'fecha_nacimiento',
        'biografia',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    // Relaciones
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}