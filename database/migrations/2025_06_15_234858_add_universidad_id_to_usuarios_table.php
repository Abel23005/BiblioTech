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
        Schema::table('usuarios', function (Blueprint $table) {
            // Eliminar la columna 'universidad' existente si existe y es de tipo string
            if (Schema::hasColumn('usuarios', 'universidad')) {
                $table->dropColumn('universidad');
            }
            
            // Añadir la nueva columna universidad_id
            $table->unsignedBigInteger('universidad_id')->nullable()->after('rol');

            // Establecer la clave foránea
            $table->foreign('universidad_id')->references('id')->on('universidads')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // Eliminar la clave foránea primero
            $table->dropForeign(['universidad_id']);
            
            // Eliminar la columna universidad_id
            $table->dropColumn('universidad_id');

            // Opcional: Recrear la columna universidad si es necesario para revertir
            // $table->string('universidad')->nullable()->after('rol');
        });
    }
};
