<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_municipio')->comment('Nombre del municipio');
            $table->integer('codigo')->comment('Código del municipio');
            $table->foreignId('departamento_id')->references('id')->on('departamentos');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE municipios COMMENT = "Tabla para almacenar los municipios"');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};
