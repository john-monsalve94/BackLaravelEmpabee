<?php

namespace Database\Seeders;

use App\Models\Controlador;
use App\Models\Reporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $controladores_id = Controlador::pluck('id')->toArray();
        foreach ($controladores_id as $id) {
            Reporte::factory(5)->create(['controlador_id'=>$id]);
        }
    }
}
