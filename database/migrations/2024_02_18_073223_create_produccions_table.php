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
        Schema::create('produccions', function (Blueprint $table) {
            // Definición de la tabla produccions
            $table->comment('Almacena datos de producción'); // Comentario sobre la tabla produccions
            $table->id()->comment('Identificador único de la producción'); // Comentario sobre el campo id
            $table->double('cantidad_miel')->comment('Cantidad de miel producida'); // Comentario sobre el campo cantidad_miel
            $table->double('cantidad_polen')->comment('Cantidad de polen producido'); // Comentario sobre el campo cantidad_polen
            $table->double('cantidad_cera')->comment('Cantidad de cera producida'); // Comentario sobre el campo cantidad_cera
            $table->foreignId('siembra_id')->references('id')->on('siembras')->comment('ID de la siembra asociada a la producción'); // Comentario sobre el campo siembra_id (clave foránea)
            $table->timestamps(); // Comentario sobre los campos de registro de fecha de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccions');
    }
};
