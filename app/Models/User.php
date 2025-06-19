<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
        'universidad_id',
        'codigo',
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
        return $this->hasMany(Prestamo::class, 'usuario_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'usuario_id');
    }

    // Relación con estudiante
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'usuario_id');
    }

    // Relación con administrador
    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'usuario_id');
    }

    // Relación con Universidad
    public function universidad()
    {
        return $this->belongsTo(Universidad::class);
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

    // Método para verificar permisos
    public function hasRole($role)
    {
        return $this->rol === $role;
    }

    // Relación muchos a muchos: libros favoritos
    public function favoritos()
    {
        return $this->belongsToMany(Libro::class, 'favoritos', 'usuario_id', 'libro_id')->withTimestamps();
    }

    // Método para agregar libro a favoritos
    public function agregarAFavoritos($libroId)
    {
        return $this->favoritos()->attach($libroId);
    }

    // Método para quitar libro de favoritos
    public function quitarDeFavoritos($libroId)
    {
        return $this->favoritos()->detach($libroId);
    }
} 