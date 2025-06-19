<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Universidad;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UniversidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Desactivar temporalmente las comprobaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Eliminar universidades existentes para evitar duplicados y errores de código
        Universidad::truncate();

        Universidad::create([
            'name' => 'TECSUP',
            'codigo_registro' => 'A8X2ZL',
        ]);

        Universidad::create([
            'name' => 'UTP',
            'codigo_registro' => 'J3W7KD',
        ]);

        Universidad::create([
            'name' => 'UPN',
            'codigo_registro' => 'Z9M1QP',
        ]);

        Universidad::create([
            'name' => 'UPC',
            'codigo_registro' => 'L5NV3E',
        ]);

        // Reactivar las comprobaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
