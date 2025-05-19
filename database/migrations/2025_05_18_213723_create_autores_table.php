<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autores', function (Blueprint $table) {
            $table->id(); // Primary Key (PK)
            $table->string('nombre');
            $table->string('nacionalidad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->text('biografia')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autores');
    }
};