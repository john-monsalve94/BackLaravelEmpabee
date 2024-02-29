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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_departamento')->comment('Nombre del departamento');
            $table->integer('codigo')->comment('Código del departamento');
            $table->timestamps();
            $table->foreignId('pais_id')->references('id')->on('pais');
        });
        

        DB::statement('ALTER TABLE departamentos COMMENT = "Tabla para almacenar los departamentos"');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
