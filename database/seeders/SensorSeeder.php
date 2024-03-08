<?php

namespace Database\Seeders;

use App\Models\Controlador;
use App\Models\Sensor;
use App\Models\TipoSensor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $controladores_id = Controlador::pluck('id')->toArray();
        $tipo_sensores_id = TipoSensor::pluck('id')->toArray();
        foreach ($controladores_id as $controlador_id) {
            foreach ($tipo_sensores_id as $tipo_sensor_id) {
                Sensor::factory()
                    ->create(
                        [
                            'tipo_sensor_id' => $tipo_sensor_id,
                            'controlador_id' => $controlador_id
                        ]
                    );
            }
        }
    }
}
