<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoIdentificacionSeeder extends Seeder
{

    public function run(): void
    {
        $path = 'database/seeders/sql/tipo_identificacion.sql';
        DB::unprepared(file_get_contents($path));
    }
}
