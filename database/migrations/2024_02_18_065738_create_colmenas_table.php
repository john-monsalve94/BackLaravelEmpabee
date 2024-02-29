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
        Schema::create('colmenas', function (Blueprint $table) {
            
            $table->comment('Almacena información sobre colmenas'); // Comentario sobre la tabla colmenas
            $table->id()->comment('Identificador único de la colmena'); // Comentario sobre el campo id
            $table->string('nombre')->comment('Nombre de la colmena'); // Comentario sobre el campo nombre
            $table->date('fecha_inicio')->comment('Fecha de inicio de la colmena'); // Comentario sobre el campo fecha_inicio
            $table->date('fecha_final')->comment('Fecha de finalización de la colmena'); // Comentario sobre el campo fecha_final
    
            $table->string('temperatura_minima')->nullable()->comment('Temperatura mínima registrada en la colmena'); // Comentario sobre el campo temperatura_minima
            $table->string('temperatura_maxima')->nullable()->comment('Temperatura máxima registrada en la colmena'); // Comentario sobre el campo temperatura_maxima
            $table->string('peso_minimo')->nullable()->comment('Peso mínimo registrado en la colmena'); // Comentario sobre el campo peso_minimo
            $table->string('peso_maximo')->nullable()->comment('Peso máximo registrado en la colmena'); // Comentario sobre el campo peso_maximo
            $table->string('humedad_minima')->nullable()->comment('Humedad mínima registrada en la colmena'); // Comentario sobre el campo humedad_minima
            $table->string('humedad_maxima')->nullable()->comment('Humedad máxima registrada en la colmena'); // Comentario sobre el campo humedad_maxima
            $table->foreignId('users_id')->references('id')->on('users')->comment('ID del usuario propietario de la colmena'); // Comentario sobre el campo users_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colmenas');
    }
};
