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
        Schema::create('reportes', function (Blueprint $table) {
            // Definición de la tabla reportes
            $table->comment('Almacena los reportes'); // Comentario sobre la tabla reportes
            $table->id()->comment('Identificador único del reporte'); // Comentario sobre el campo id
            $table->enum('titulo_reporte', ['ADVERTENCIA', 'PERIODICO', 'ALERTA'])->comment('Título del reporte'); // Comentario sobre el campo titulo_reporte
            $table->foreignId('medidas_id')->references('id')->on('medidas')->comment('ID de la medida asociada al reporte'); // Comentario sobre el campo medidas_id (clave foránea)
            $table->foreignId('controladors_id')->references('id')->on('controladors')->comment('ID del controlador asociado al reporte'); // Comentario sobre el campo controladors_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
