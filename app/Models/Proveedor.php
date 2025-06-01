<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'rfc',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
} 