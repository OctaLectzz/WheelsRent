<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Supir;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User
        User::factory(20)->create();
        User::factory()->create([
            'name' => 'OctaLectzz',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'Admin'
        ]);

        // Mobil
        $this->call(MobilSeeder::class);

        // Supir
        $this->call(SupirSeeder::class);

        // Armada
        $this->call(ArmadaSeeder::class);
    }
}
