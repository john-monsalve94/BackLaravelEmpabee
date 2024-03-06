<?php

namespace Database\Factories;

use App\Models\Colmena;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colmena>
 */
class ColmenaFactory extends Factory
{
    protected $model = Colmena::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>'Colmena '.$this->faker->numberBetween(1,1000),
            'fecha_inicio'=>Carbon::now(),
        ];
    }
}
