<?php

namespace Database\Seeders;

use App\Models\Colmena;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColmenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Colmena::factory(1000)->create();
    }
}
