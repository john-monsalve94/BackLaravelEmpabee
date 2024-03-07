<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ControladorFactory extends Factory
{

    public function definition(): array
    {
        $randomString = Str::random(40);
        $hash = hash('sha256', $randomString);

        return [
            'token' => $hash
        ];
    }
}
