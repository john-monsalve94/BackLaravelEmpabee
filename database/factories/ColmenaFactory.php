<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colmena>
 */
class ColmenaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::pluck('id')->toArray();
        Log::debug('User IDs:', $user_id);
        return [
            'nombre'=>'Colmena '.$this->faker->numberBetween(1,1000),
            'fecha_inicio'=>Carbon::now(),
            'users_id'=>$this->faker->randomElement($user_id)
        ];
    }
}
