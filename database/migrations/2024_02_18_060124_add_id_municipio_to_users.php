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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('municipio_residencia_id')-> references('id')->on('municipios');
            $table->foreignId('municipio_nacimiento_id')->references('id')->on('municipios');
            $table->foreignId('tipo_identificacions_id')->references('id')->on('tipo_identificacions');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table-> dropForeign(['municipio_residencia_id','municipio_nacimiento_id','tipo_identificacions_id']);
            $table-> dropColumn(['municipio_residencia_id','municipio_nacimiento_id','tipo_identificacions_id']);
        });
    }
};
