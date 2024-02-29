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
        Schema::create('sensors', function (Blueprint $table) {
            // Definición de la tabla sensors
            $table->comment('Almacena los sensores'); // Comentario sobre la tabla sensors
            $table->id()->comment('Identificador único del sensor'); // Comentario sobre el campo id
            $table->string('token')->comment('Token del sensor'); // Comentario sobre el campo token
            $table->foreignId('tipo_sensors_id')->references('id')->on('tipo_sensors')->comment('ID del tipo de sensor asociado al sensor'); // Comentario sobre el campo tipo_sensors_id (clave foránea)
            $table->foreignId('controladors_id')->references('id')->on('controladors')->comment('ID del controlador asociado al sensor'); // Comentario sobre el campo controladors_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
