<?php

namespace Database\Seeders;

use App\Enums\DefaultProfilePhoto;
use App\Enums\Genero;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(4)->create();
        User::create([
            'primer_nombre' => 'Jhon',
            'segundo_nombre' => 'Wilmer',
            'primer_apellido' => 'Azcarate',
            'segundo_apellido' => 'Rivera',
            'genero' => Genero::HOMBRE,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'telefono' => '3147539681',
            'numero_identificacion' => '10610111207',
            'ruta_foto' => DefaultProfilePhoto::HOMBRE,
            'municipio_residencia_id' => 380,
            'municipio_nacimiento_id' => 380,
            'tipo_identificacions_id' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
