<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Libro::truncate();
        $libros = [
            [
                'titulo' => 'Cien años de soledad',
                'autor' => 'Gabriel García Márquez',
                'isbn' => '978-0307474728',
                'categoria' => 'Literatura Latinoamericana',
                'descripcion' => 'La obra cumbre del realismo mágico que narra la saga de la familia Buendía en el mítico pueblo de Macondo.',
                'ubicacion' => 'Estante A-1',
                'estado' => 'bueno',
                'disponible' => true
            ],
            [
                'titulo' => 'El principito',
                'autor' => 'Antoine de Saint-Exupéry',
                'isbn' => '978-0156012195',
                'categoria' => 'Literatura Infantil',
                'descripcion' => 'Una historia poética que aborda temas universales como el amor, la amistad y el sentido de la vida.',
                'ubicacion' => 'Estante B-2',
                'estado' => 'nuevo',
                'disponible' => true
            ],
            [
                'titulo' => 'Clean Code',
                'autor' => 'Robert C. Martin',
                'isbn' => '978-0132350884',
                'categoria' => 'Programación',
                'descripcion' => 'Una guía práctica para escribir código limpio y mantenible en cualquier lenguaje de programación.',
                'ubicacion' => 'Estante C-3',
                'estado' => 'bueno',
                'disponible' => true
            ],
            [
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'isbn' => '978-0451524935',
                'categoria' => 'Ciencia Ficción',
                'descripcion' => 'Una novela distópica que explora temas de vigilancia gubernamental, totalitarismo y manipulación de la verdad.',
                'ubicacion' => 'Estante D-4',
                'estado' => 'regular',
                'disponible' => true
            ],
            [
                'titulo' => 'Algoritmos y Estructuras de Datos',
                'autor' => 'Thomas H. Cormen',
                'isbn' => '978-0262033848',
                'categoria' => 'Informática',
                'descripcion' => 'Un texto fundamental sobre algoritmos y estructuras de datos en ciencias de la computación.',
                'ubicacion' => 'Estante E-5',
                'estado' => 'nuevo',
                'disponible' => true
            ]
        ];

        foreach ($libros as $libro) {
            \App\Models\Libro::create($libro);
        }
    }
}
