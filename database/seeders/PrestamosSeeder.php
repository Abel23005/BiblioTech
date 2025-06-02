<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestamosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener IDs de libros y estudiantes
        $libros = \App\Models\Libro::all();
        $estudiantes = \App\Models\Estudiante::all();

        // Crear préstamos de ejemplo
        $prestamos = [
            [
                'libro_id' => $libros[0]->id,
                'estudiante_id' => $estudiantes[0]->id,
                'fecha_prestamo' => now()->subDays(10),
                'fecha_devolucion' => now()->addDays(5),
                'estado' => 'activo'
            ],
            [
                'libro_id' => $libros[1]->id,
                'estudiante_id' => $estudiantes[1]->id,
                'fecha_prestamo' => now()->subDays(5),
                'fecha_devolucion' => now()->addDays(10),
                'estado' => 'activo'
            ],
            [
                'libro_id' => $libros[2]->id,
                'estudiante_id' => $estudiantes[2]->id,
                'fecha_prestamo' => now()->subDays(15),
                'fecha_devolucion' => now()->subDays(1),
                'estado' => 'devuelto'
            ],
            [
                'libro_id' => $libros[3]->id,
                'estudiante_id' => $estudiantes[3]->id,
                'fecha_prestamo' => now()->subDays(20),
                'fecha_devolucion' => now()->subDays(5),
                'estado' => 'devuelto'
            ],
            [
                'libro_id' => $libros[4]->id,
                'estudiante_id' => $estudiantes[4]->id,
                'fecha_prestamo' => now()->subDays(2),
                'fecha_devolucion' => now()->addDays(12),
                'estado' => 'activo'
            ]
        ];

        foreach ($prestamos as $prestamo) {
            \App\Models\Prestamo::create($prestamo);
        }
    }
}
