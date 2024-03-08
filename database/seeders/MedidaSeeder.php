<?php

namespace Database\Seeders;

use App\Models\Controlador;
use App\Models\Medida;
use App\Models\Reporte;
use App\Models\Sensor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $controladores = Controlador::all();
        $controladores->map(function ($controlador) use ($faker) {
            $sensors = Sensor::where('controlador_id', $controlador->id)
                ->get();
            $reporte_id = Reporte::where('controlador_id', $controlador->id)
                ->pluck('id')
                ->toArray();

            foreach ($sensors as $sensor) {
                switch ($sensor->tipo_sensor_id) {
                    case 1:
                        $valor = $faker->randomFloat(2, 0, 100);
                        break;

                    case 2:
                        $valor = $faker->randomFloat(2, 0, 1000);
                        break;

                    default:
                        $valor = $faker->randomFloat(2, -10, 40);
                        break;
                }
                for ($i = 0; $i < 100; $i++) {
                    Medida::create([
                        'sensor_id' => $sensor->id,
                        'reporte_id' => $faker->randomElement($reporte_id),
                        'valor' => $valor
                    ]);
                }
            }
        });
    }
}
