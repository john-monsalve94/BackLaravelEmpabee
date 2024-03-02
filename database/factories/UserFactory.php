<?php

namespace Database\Factories;

use App\Models\Municipios;
use App\Models\TipoIdentificacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $generos = ['Mujer','Hombre','Otro'];
        $ciudad_id = Municipios::pluck('id')->toArray();
        $tipo_identificacion_id = TipoIdentificacion::pluck('id')->toArray();
        $telefono ='';
        $identificacion='';
        for ($i=0; $i < 10; $i++) { 
            $initial = $i > 0 ? 3:0;
            $telefono = $telefono.$this->faker->numberBetween($initial,9);
            $identificacion = $identificacion.$this->faker->numberBetween($initial,9);
        }
        return [
            'primer_nombre' => $this->faker->firstNameMale(),
            'primer_apellido'=>$this->faker->lastName(),
            'genero'=>$this->faker->randomElement($generos),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'telefono'=>$telefono,
            'numero_identificacion'=>$identificacion,
            'municipio_residencia_id'=>$this->faker->randomElement($ciudad_id),
            'municipio_nacimiento_id'=>$this->faker->randomElement($ciudad_id),
            'tipo_identificacions_id'=>$this->faker->randomElement($tipo_identificacion_id),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
