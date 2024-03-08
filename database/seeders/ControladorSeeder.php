<?php

namespace Database\Seeders;

use App\Models\Colmena;
use App\Models\Controlador;
use Illuminate\Database\Seeder;

class ControladorSeeder extends Seeder
{
    
    public function run(): void
    {
        $colmenas_id = Colmena::pluck('id')->toArray();
        foreach ($colmenas_id as $id) {
            Controlador::factory(5)->create(['colmena_id'=>$id]);
        }
    }
}
