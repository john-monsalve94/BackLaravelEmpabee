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
        Schema::create('siembras', function (Blueprint $table) {
            // Definición de la tabla siembras
            $table->comment('Almacena información sobre las siembras de las colmenas'); // Comentario sobre la tabla siembras
            $table->id()->comment('Identificador único de la siembra'); // Comentario sobre el campo id
            $table->date('fecha_fin')->nullable()->comment('Fecha de finalización de la siembra'); // Comentario sobre el campo fecha_fin
            $table->foreignId('colmena_id')->references('id')->on('colmenas')->comment('ID de la colmena asociada a la siembra'); // Comentario sobre el campo colmena_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siembras');
    }
};
