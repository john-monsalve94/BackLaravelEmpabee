<?php

namespace Database\Factories;

use App\Enums\DefaultProfilePhoto;
use App\Enums\Genero;
use App\Models\Municipios;
use App\Models\TipoIdentificacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    protected static ?string $password;

    public function definition(): array
    {
        $generos = Genero::getValues();

        switch ($genero = $this->faker->randomElement($generos)) {
            case Genero::HOMBRE:
                $primer_nombre = $this->faker->firstNameMale();
                $segundo_nombre = $this->faker->firstNameMale();
                $ruta_foto = DefaultProfilePhoto::HOMBRE;
                break;

            case Genero::MUJER:
                $primer_nombre = $this->faker->firstNameFemale();
                $segundo_nombre = $this->faker->firstNameFemale();
                $ruta_foto = DefaultProfilePhoto::MUJER;
                break;

            default:
                $primer_nombre = $this->faker->firstName();
                $segundo_nombre = $this->faker->firstName();
                $ruta_foto = DefaultProfilePhoto::OTRO;
                break;
        }

        $primer_apellido = $this->faker->lastName();
        $segundo_apellido = $this->faker->lastName();

        $ciudad_id = Municipios::pluck('id')->toArray();
        $tipo_identificacion_id = TipoIdentificacion::pluck('id')->toArray();
        $telefono = '';
        $identificacion = '';
        for ($i = 0; $i < 10; $i++) {
            $initial = $i > 0 ? 3 : 0;
            $telefono = $telefono . $this->faker->numberBetween($initial, 9);
            $identificacion = $identificacion . $this->faker->numberBetween($initial, 9);
        }
        return [
            'primer_nombre' => $primer_nombre,
            'segundo_nombre' => $segundo_nombre,
            'primer_apellido' => $primer_apellido,
            'segundo_apellido' => $segundo_apellido,
            'genero' => $genero,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'telefono' => $telefono,
            'numero_identificacion' => $identificacion,
            'ruta_foto' => $ruta_foto,
            'municipio_residencia_id' => $this->faker->randomElement($ciudad_id),
            'municipio_nacimiento_id' => $this->faker->randomElement($ciudad_id),
            'tipo_identificacions_id' => $this->faker->randomElement($tipo_identificacion_id),
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
