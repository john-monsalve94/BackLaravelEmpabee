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
        Schema::create('pais', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_pais')->comment('El nombre del Pais');
            $table->string('codigo')->comment('Codigo del Pais');
            $table->string('iso3166a1',2)->comment('Diminutivo nombre del pais');
            $table->string('iso3166a2',3)->comment('Diminutivo nombre del pais');
            $table->timestamps();    
        });
        DB::statement('ALTER TABLE pais COMMENT = "Tabla para almacenar los paises"');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pais');
    }
};
