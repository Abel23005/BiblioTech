<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id(); // Primary Key (PK)
            $table->string('titulo');
            $table->unsignedBigInteger('autor_id'); // Foreign Key (FK)
            $table->string('editorial')->nullable();
            $table->year('anio_publicacion')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->unsignedBigInteger('categoria_id'); // Foreign Key (FK)
            $table->boolean('disponible')->default(true);
            $table->timestamps();
            
            // Relaciones
            $table->foreign('autor_id')->references('id')->on('autores');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};