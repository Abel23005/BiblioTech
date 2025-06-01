<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestamos = [
            [
                'libro_id' => 1,
                'usuario_id' => 1,
                'fecha_prestamo' => Carbon::now()->subDays(10),
                'fecha_devolucion' => Carbon::now()->addDays(5),
                'estado' => 'activo'
            ],
            [
                'libro_id' => 2,
                'usuario_id' => 2,
                'fecha_prestamo' => Carbon::now()->subDays(15),
                'fecha_devolucion' => Carbon::now()->subDays(1),
                'estado' => 'devuelto'
            ],
            [
                'libro_id' => 3,
                'usuario_id' => 1,
                'fecha_prestamo' => Carbon::now()->subDays(30),
                'fecha_devolucion' => Carbon::now()->subDays(15),
                'estado' => 'devuelto'
            ]
        ];

        foreach ($prestamos as $prestamo) {
            Prestamo::create($prestamo);
        }
    }
}
