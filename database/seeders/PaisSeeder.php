<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{

    public function run(): void
    {
        $path = 'database/seeders/sql/paises.sql';
        DB::unprepared(file_get_contents($path));
    }
}
