<?php

namespace Database\Factories;

use App\Models\Controlador;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Controlador>
 */
class ControladorFactory extends Factory
{
    protected $model = Controlador::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomString = Str::random(40);
        $hash = hash('sha256', $randomString);

        return [
            'token' => $hash
        ];
    }
}
