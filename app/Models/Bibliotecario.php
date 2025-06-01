<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Bibliotecario extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        'telefono',
        'turno',
        'activo'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'bibliotecario_id');
    }
} 