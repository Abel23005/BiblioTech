<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estudiantes = [
            [
                'codigo' => 'EST001',
                'nombre' => 'Ana María García',
                'email' => 'ana.garcia@estudiante.com',
                'telefono' => '987654321',
                'carrera' => 'Ingeniería de Sistemas',
                'semestre' => 5,
                'direccion' => 'Av. Principal 123',
                'activo' => true
            ],
            [
                'codigo' => 'EST002',
                'nombre' => 'Carlos López',
                'email' => 'carlos.lopez@estudiante.com',
                'telefono' => '987654322',
                'carrera' => 'Arquitectura',
                'semestre' => 3,
                'direccion' => 'Calle Secundaria 456',
                'activo' => true
            ],
            [
                'codigo' => 'EST003',
                'nombre' => 'María Rodríguez',
                'email' => 'maria.rodriguez@estudiante.com',
                'telefono' => '987654323',
                'carrera' => 'Medicina',
                'semestre' => 7,
                'direccion' => 'Plaza Central 789',
                'activo' => true
            ],
            [
                'codigo' => 'EST004',
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@estudiante.com',
                'telefono' => '987654324',
                'carrera' => 'Derecho',
                'semestre' => 4,
                'direccion' => 'Avenida Norte 321',
                'activo' => true
            ],
            [
                'codigo' => 'EST005',
                'nombre' => 'Laura Martínez',
                'email' => 'laura.martinez@estudiante.com',
                'telefono' => '987654325',
                'carrera' => 'Psicología',
                'semestre' => 6,
                'direccion' => 'Calle Sur 654',
                'activo' => true
            ]
        ];

        foreach ($estudiantes as $estudiante) {
            \App\Models\Estudiante::create($estudiante);
        }
    }
}
