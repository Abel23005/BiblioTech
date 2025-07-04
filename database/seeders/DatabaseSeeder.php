<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear o actualizar el usuario administrador
        User::firstOrCreate(
            ['email' => 'imer.quispe@tecsup.edu.pe'],
            [
                'nombre' => 'Imer Quispe',
                'password' => Hash::make('password'), // Cambia 'password' a una contraseña segura
                'rol' => 'administrador',
                'codigo' => 'ADM-001', // Opcional, si tienes códigos para administradores
                'universidad_id' => null, // Opcional, si no está asociado a una universidad específica
            ]
        );

        // Crear o actualizar el usuario bibliotecario solicitado
        User::firstOrCreate(
            ['email' => 'danielkeadj@gmail.com'],
            [
                'nombre' => 'Daniel kea',
                'password' => Hash::make('BiblioTech2024!'), // Contraseña segura
                'rol' => 'bibliotecario',
                'codigo' => 'BIB-001',
                'universidad_id' => null, // Puedes asignar una universidad si lo deseas
            ]
        );

        $this->call([
            LibrosSeeder::class,
            EstudiantesSeeder::class,
            PrestamosSeeder::class,
            UniversidadSeeder::class
        ]);
    }
}
