<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autores = [
            [
                'nombre' => 'Gabriel',
                'apellido' => 'García Márquez',
                'nacionalidad' => 'Colombiano'
            ],
            [
                'nombre' => 'Jorge Luis',
                'apellido' => 'Borges',
                'nacionalidad' => 'Argentino'
            ],
            [
                'nombre' => 'Isabel',
                'apellido' => 'Allende',
                'nacionalidad' => 'Chilena'
            ],
            [
                'nombre' => 'Mario',
                'apellido' => 'Vargas Llosa',
                'nacionalidad' => 'Peruano'
            ]
        ];

        foreach ($autores as $autor) {
            Autor::create($autor);
        }
    }
}
