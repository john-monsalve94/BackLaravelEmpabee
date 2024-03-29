<?php

use App\Enums\ReportStatus;
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
            $table->enum('titulo_reporte', ReportStatus::getValues())->default(ReportStatus::NORMAL)->comment('Título del reporte'); // Comentario sobre el campo titulo_reporte
            $table->string('contenido')->default('Nada que reportar')->comment('Contenido del reporte');
            $table->boolean('leido')->default(false)->comment('Indica si el usuario ya vio el reporte');
            $table->uuid('controlador_id');
            $table->foreign('controlador_id')->references('uuid')->on('controladors')->comment('ID del controlador asociado al reporte'); // Comentario sobre el campo controlador_id (clave foránea)
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
