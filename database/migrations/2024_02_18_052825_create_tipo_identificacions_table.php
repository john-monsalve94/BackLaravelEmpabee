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
        Schema::create('tipo_identificacions', function (Blueprint $table) {

            $table->id();
            $table->string('nombre_identificacion')->comment('Nombre del tipo de identificación');
            $table->integer('descripcion')->comment('Descripcion del tipo de identificación')->nullable();
            $table->integer('diminutivo')->comment('Diminutivo de la identificación ejemplo cedula de ciudadanía C.C');
            $table->timestamps();
        });
        

        DB::statement('ALTER TABLE tipo_identificacions COMMENT = "Tabla para almacenar los tipos de identificación"');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_identificacions');
    }
};
