<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
        'universidad',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relaciones
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Relación con estudiante
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }

    // Relación con administrador
    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }

    // Método para verificar si el usuario es estudiante
    public function esEstudiante()
    {
        return $this->rol === 'alumno';
    }

    // Método para verificar si el usuario es administrador
    public function esAdministrador()
    {
        return $this->rol === 'administrador';
    }
}