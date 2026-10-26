<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Usuario administrador de prueba para ingresar al panel.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@walther.test'],
            [
                'name' => 'Administrador',
                'password' => 'password',
            ],
        );
    }
}
