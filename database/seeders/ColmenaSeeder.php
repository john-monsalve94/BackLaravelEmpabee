<?php

namespace Database\Seeders;

use App\Models\Colmena;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColmenaSeeder extends Seeder
{
    use WithoutModelEvents;
    
    public function run(): void
    {  
        $users_id = User::pluck('id')->toArray();
        foreach ($users_id as $id) {
            Colmena::factory(10)->create(['user_id'=>$id]);
        }
    }
}
