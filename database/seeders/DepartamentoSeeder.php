<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{

    public function run(): void
    {
        $path = 'database/seeders/sql/departamentos.sql';
        DB::unprepared(file_get_contents($path));
    }
}
