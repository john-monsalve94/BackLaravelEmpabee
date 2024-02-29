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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre')->comment('El primer nombre del usuario');
            $table->string('segundo_nombre')->nullable()->comment('El segundo nombre del usuario');
            $table->string('primer_apellido')->comment('El primer apellido del usuario');
            $table->string('segundo_apellido')->nullable()->comment('El segundo apellido del usuario');
            $table->enum('genero',['Mujer','Hombre','Otro'])->comment('Género del usuario');
            $table->string('telefono',13)->comment('Número telefónico del usuario');
            $table->string('numero_identificacion')->comment('Número de identificación del usuario');
            $table->string('email')->unique()->comment('Correo electrónico del usuario');
    
            $table->timestamp('email_verified_at')->nullable()->comment('Fecha de verificación del correo');
            $table->string('password')->comment('Contraseña del usuario');
            $table->rememberToken();
            $table->timestamps();
        }); 
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
