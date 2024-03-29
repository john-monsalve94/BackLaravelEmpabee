<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

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
            $table->uuid('uuid')->primary()->comment('Identificador único del controlador'); // Comentario sobre el campo id
            $table->foreignId('colmena_id')->references('id')->on('colmenas')->comment('ID de la colmena asociada al controlador'); // Comentario sobre el campo colmena_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
            $table->softDeletes();
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
