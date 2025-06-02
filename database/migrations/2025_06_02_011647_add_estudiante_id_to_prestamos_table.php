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
            // Añadir nueva columna estudiante_id
            $table->unsignedBigInteger('estudiante_id')->nullable()->after('usuario_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            
            // Hacer usuario_id nullable para permitir la transición
            $table->unsignedBigInteger('usuario_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            // Eliminar la clave foránea y la columna
            $table->dropForeign(['estudiante_id']);
            $table->dropColumn('estudiante_id');
            
            // Revertir usuario_id a not nullable
            $table->unsignedBigInteger('usuario_id')->nullable(false)->change();
        });
    }
};
