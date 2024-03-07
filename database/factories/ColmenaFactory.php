<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColmenaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre'=>'Colmena '.$this->faker->numberBetween(1,1000),
            'fecha_inicio'=>Carbon::now(),
        ];
    }
}
