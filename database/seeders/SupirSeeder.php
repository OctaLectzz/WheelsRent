<?php

namespace Database\Seeders;

use App\Models\Supir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supir::create([
            'nama' => fake()->name(),
            'alamat' => 'Larangan, Sukoharjo, Jawa Tengah, Indonesia, Bumi, Galaxy Bima Sakti',
            'jenis_kelamin' => 'Laki-Laki',
            'status' => 'Tersedia'
        ]);
        Supir::create([
            'nama' => fake()->name(),
            'alamat' => 'Kuala Lumpur, Malaysia, Bumi, Galaxy Bima Sakti',
            'jenis_kelamin' => 'Laki-Laki',
            'status' => 'Disewa'
        ]);
        Supir::create([
            'nama' => fake()->name(),
            'alamat' => 'Ohio, Amerika Serikat, Bumi, Galaxy Bima Sakti',
            'jenis_kelamin' => 'Laki-Laki',
            'status' => 'Tersedia'
        ]);
        Supir::create([
            'nama' => fake()->name(),
            'alamat' => 'Hiroshima, Jepang, Bumi, Galaxy Bima Sakti',
            'jenis_kelamin' => 'Laki-Laki',
            'status' => 'Tersedia'
        ]);
        Supir::create([
            'nama' => fake()->name(),
            'alamat' => 'Jakarta, Indonesia, Bumi, Galaxy Bima Sakti',
            'jenis_kelamin' => 'Laki-Laki',
            'status' => 'Disewa'
        ]);
        Supir::create([
            'nama' => fake()->name(),
            'alamat' => 'Kalimantan Tengah, Indonesia, Bumi, Galaxy Bima Sakti',
            'jenis_kelamin' => 'Laki-Laki',
            'status' => 'Tersedia'
        ]);
    }
}
