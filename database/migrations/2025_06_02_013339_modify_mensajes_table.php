<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->text('mensaje');
            $table->enum('tipo', ['consulta', 'problema', 'sugerencia'])->default('consulta');
            $table->enum('estado', ['pendiente', 'respondido', 'cerrado'])->default('pendiente');
            $table->text('respuesta')->nullable();
            $table->unsignedBigInteger('respondido_por')->nullable();
            $table->timestamp('leido_at')->nullable();
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('respondido_por')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
