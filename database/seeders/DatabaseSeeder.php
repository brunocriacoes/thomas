<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Database\Seeders\EscolaSeeder;
use Database\Seeders\EventoSeeder;
use Database\Seeders\AreaSeeder;
use Database\Seeders\MesaSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);

        $this->call([
            EscolaSeeder::class,
            EventoSeeder::class,
            AreaSeeder::class,
            MesaSeeder::class,
            UserSeeder::class,
        ]);
    }
}