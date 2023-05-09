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
            'role' => 'Admin'
        ]);

        // Mobil
        Mobil::factory(20)->create();

        // Supir
        Supir::factory(20)->create();
    }
}
