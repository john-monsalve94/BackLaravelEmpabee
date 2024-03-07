<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(PaisSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(TipoIdentificacionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ColmenaSeeder::class);
        $this->call(ControladorSeeder::class);
    }
}
