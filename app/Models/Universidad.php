<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'codigo_registro',
    ];

    // Si tu tabla es 'universidades' (plural), no necesitas especificar $table
    // Si es 'universidads' (Laravel default para singular Universidad), sí lo necesitarías.
    // En este caso, Laravel debería inferir 'universidads', que es lo que se creó.
}
