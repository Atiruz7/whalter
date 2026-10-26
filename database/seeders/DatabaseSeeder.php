<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> f5e469399bb72d8bbc56798a0209324f59c1ffbc
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            ProductSeeder::class,
=======
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
>>>>>>> f5e469399bb72d8bbc56798a0209324f59c1ffbc
        ]);
    }
}
