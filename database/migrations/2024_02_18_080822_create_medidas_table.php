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
        Schema::create('medidas', function (Blueprint $table) {
            // Definición de la tabla medidas
            $table->comment('Almacena las medidas de los sensores'); // Comentario sobre la tabla medidas
            $table->id()->comment('Identificador único de la medida'); // Comentario sobre el campo id
            $table->double('valor')->comment('Valor de la medida'); // Comentario sobre el campo valor
            $table->foreignId('sensors_id')->references('id')->on('sensors')->comment('ID del sensor asociado a la medida'); // Comentario sobre el campo sensors_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas');
    }
};
