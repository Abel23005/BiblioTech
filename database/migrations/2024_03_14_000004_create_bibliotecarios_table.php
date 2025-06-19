<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bibliotecarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('codigo')->unique();
            $table->string('telefono')->nullable();
            $table->enum('turno', ['matutino', 'vespertino', 'nocturno'])->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bibliotecarios');
    }
}; 