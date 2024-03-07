<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{

    public function run(): void
    {
        $path = 'database/seeders/sql/municipios.sql';
        DB::unprepared(file_get_contents($path));
    }
}
