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
                'autor_id' => 1,
                'editorial' => 'Editorial Sudamericana',
                'anio_publicacion' => 1967,
                'isbn' => '978-0307474728',
                'categoria_id' => 1,
                'disponible' => true
            ],
            [
                'titulo' => 'El Aleph',
                'autor_id' => 2,
                'editorial' => 'Losada',
                'anio_publicacion' => 1949,
                'isbn' => '978-0307475862',
                'categoria_id' => 1,
                'disponible' => true
            ],
            [
                'titulo' => 'La casa de los espíritus',
                'autor_id' => 3,
                'editorial' => 'Plaza & Janés',
                'anio_publicacion' => 1982,
                'isbn' => '978-0307474537',
                'categoria_id' => 1,
                'disponible' => true
            ],
            [
                'titulo' => 'La ciudad y los perros',
                'autor_id' => 4,
                'editorial' => 'Seix Barral',
                'anio_publicacion' => 1963,
                'isbn' => '978-0307474889',
                'categoria_id' => 1,
                'disponible' => true
            ]
        ];

        foreach ($libros as $libro) {
            Libro::create($libro);
        }
    }
}
