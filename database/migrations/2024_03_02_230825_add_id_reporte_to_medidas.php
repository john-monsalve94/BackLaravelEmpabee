<?php

use App\Models\Reporte;
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
        Schema::table('medidas', function (Blueprint $table) {
            $table->foreignId('reporte_id')->references('id')->on('reportes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medidas', function (Blueprint $table) {
            $table-> dropForeign(['reporte_id']);
            $table-> dropColumn(['reporte_id']);
        });
    }
};
