<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            // Eliminar la clave foránea actual
            $table->dropForeign(['estudiante_id']);
            // Volver a crear la clave foránea con onDelete('cascade')
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            // Eliminar la clave foránea con cascade
            $table->dropForeign(['estudiante_id']);
            // Volver a crear la clave foránea sin cascade
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
        });
    }
}; 