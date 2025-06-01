<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Ficción'],
            ['nombre' => 'No Ficción'],
            ['nombre' => 'Ciencia'],
            ['nombre' => 'Historia'],
            ['nombre' => 'Literatura'],
            ['nombre' => 'Tecnología'],
            ['nombre' => 'Arte'],
            ['nombre' => 'Filosofía']
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
