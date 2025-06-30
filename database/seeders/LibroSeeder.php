<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $libros = [
            [
                'titulo' => 'Cien años de soledad',
                'autor' => 'Gabriel García Márquez',
                'isbn' => '978-0307474728',
                'categoria' => 'Literatura',
                'descripcion' => 'Una obra maestra de la literatura latinoamericana',
                'ubicacion' => 'Estante A1',
                'estado' => 'bueno',
                'disponible' => true
            ],
            [
                'titulo' => 'El Aleph',
                'autor' => 'Jorge Luis Borges',
                'isbn' => '978-0307475862',
                'categoria' => 'Literatura',
                'descripcion' => 'Colección de cuentos fantásticos',
                'ubicacion' => 'Estante A2',
                'estado' => 'bueno',
                'disponible' => true
            ],
            [
                'titulo' => 'La casa de los espíritus',
                'autor' => 'Isabel Allende',
                'isbn' => '978-0307474537',
                'categoria' => 'Literatura',
                'descripcion' => 'Novela familiar con elementos mágicos',
                'ubicacion' => 'Estante A3',
                'estado' => 'bueno',
                'disponible' => true
            ],
            [
                'titulo' => 'La ciudad y los perros',
                'autor' => 'Mario Vargas Llosa',
                'isbn' => '978-0307474889',
                'categoria' => 'Literatura',
                'descripcion' => 'Novela sobre la vida militar en Perú',
                'ubicacion' => 'Estante A4',
                'estado' => 'bueno',
                'disponible' => true
            ]
        ];

        foreach ($libros as $libro) {
            Libro::create($libro);
        }
    }
}
