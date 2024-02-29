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
        Schema::create('tipo_sensors', function (Blueprint $table) {
            // Definición de la tabla tipo_sensors
            $table->comment('Almacena los tipos de sensores'); // Comentario sobre la tabla tipo_sensors
            $table->id()->comment('Identificador único del tipo de sensor'); // Comentario sobre el campo id
            $table->string('nombre')->comment('Nombre del tipo de sensor'); // Comentario sobre el campo nombre
            $table->string('descripcion')->nullable()->comment('Descripción del tipo de sensor (opcional)'); // Comentario sobre el campo descripcion
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_sensors');
    }
};
