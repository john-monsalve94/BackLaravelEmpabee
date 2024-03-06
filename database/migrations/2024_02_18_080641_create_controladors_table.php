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
        Schema::create('controladors', function (Blueprint $table) {
            // Definición de la tabla controladors
            $table->comment('Almacena los datos del controlador'); // Comentario sobre la tabla controladors
            $table->id()->comment('Identificador único del controlador'); // Comentario sobre el campo id
            $table->string('token')->comment('Token del controlador'); // Comentario sobre el campo token
            $table->foreignId('colmenas_id')->references('id')->on('colmenas')->comment('ID de la colmena asociada al controlador'); // Comentario sobre el campo colmenas_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
            $table->softDeletes();
            $table->unique(['token']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controladors');
    }
};
