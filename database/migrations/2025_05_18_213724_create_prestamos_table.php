<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id(); // Primary Key (PK)
            $table->unsignedBigInteger('libro_id'); // Foreign Key (FK)
            $table->unsignedBigInteger('usuario_id'); // Foreign Key (FK)
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->enum('estado', ['activo', 'devuelto', 'vencido'])->default('activo');
            $table->timestamps();
            
            // Relaciones
            $table->foreign('libro_id')->references('id')->on('libros');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};