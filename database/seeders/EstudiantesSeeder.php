<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Universidad;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estudiantesData = [
            [
                'codigo' => 'EST001',
                'nombre' => 'Ana María García',
                'email' => 'ana.garcia@estudiante.com',
                'telefono' => '987654321',
                'carrera' => 'Ingeniería de Sistemas',
                'semestre' => 5,
                'universidad' => 'TECSUP',
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
                'universidad' => 'UTP',
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
                'universidad' => 'UPN',
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
                'universidad' => 'UPC',
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
                'universidad' => 'TECSUP',
                'direccion' => 'Calle Sur 654',
                'activo' => true
            ]
        ];

        foreach ($estudiantesData as $data) {
            $universidad = Universidad::where('name', $data['universidad'])->first();
            $user = User::create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'rol' => 'alumno',
                'codigo' => 'EST-' . strtoupper(Str::random(6)),
                'universidad_id' => $universidad ? $universidad->id : null,
            ]);

            \App\Models\Estudiante::create([
                'usuario_id' => $user->id,
                'codigo' => $data['codigo'],
                'nombre' => $data['nombre'],
                'telefono' => $data['telefono'],
                'carrera' => $data['carrera'],
                'semestre' => $data['semestre'],
                'universidad' => $data['universidad'],
                'direccion' => $data['direccion'],
                'activo' => $data['activo'],
            ]);
        }
    }
}
