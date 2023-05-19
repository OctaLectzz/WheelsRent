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
            'images' => 'Benedetta Profile.jpg',
            'name' => 'OctaLectzz',
            'email' => 'admin@test.com',
            'tanggal_lahir' => '2006-10-04',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl.Seta No.32, Larangan RT04/RW04 Gayam Sukoharjo, Jawa Tengah, Indonesia, Bumi, Glaxy Bima Sakti',
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
