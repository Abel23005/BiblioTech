<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('isbn')->unique();
            $table->string('categoria');
            $table->text('descripcion')->nullable();
            $table->string('ubicacion')->nullable();
            $table->enum('estado', ['nuevo', 'bueno', 'regular', 'deteriorado'])->default('nuevo');
            $table->boolean('disponible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};