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
use Database\Seeders\AlunoSeeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {


        // User::create([
        //     'name' => 'Administrador',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('123456'),
        // ]);

        $admin = User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('123456'),
            ]
        );
        if (Permission::count() === 0) {
            Artisan::call('shield:generate --panel=admin');
        }
        $role = Role::firstOrCreate(['name' => 'super_admin']);
        $role->syncPermissions(Permission::all());
        $admin->assignRole($role);

        $this->call([
            EscolaSeeder::class,
            EventoSeeder::class,
            AreaSeeder::class,
            MesaSeeder::class,
            UserSeeder::class,
            AlunoSeeder::class,
        ]);
    }
}
