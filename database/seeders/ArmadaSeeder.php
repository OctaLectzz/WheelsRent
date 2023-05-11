<?php

namespace Database\Seeders;

use App\Models\Armada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Armada::create([
            'mobil_id' => 1,
            'plat_nomor' => 'AD 7645 HF',
            'status' => 0,
            'harga' => 300000
        ]);
        Armada::create([
            'mobil_id' => 1,
            'plat_nomor' => 'AD 4344 HKK',
            'status' => 1,
            'harga' => 300000
        ]);
        Armada::create([
            'mobil_id' => 2,
            'plat_nomor' => 'B 7766 F',
            'status' => 0,
            'harga' => 500000
        ]);
        Armada::create([
            'mobil_id' => 2,
            'plat_nomor' => 'AD 4343 S',
            'status' => 0,
            'harga' => 500000
        ]);
        Armada::create([
            'mobil_id' => 3,
            'plat_nomor' => 'AD 4544 DS',
            'status' => 0,
            'harga' => 800000
        ]);
        Armada::create([
            'mobil_id' => 3,
            'plat_nomor' => 'CC 3444 DSD',
            'status' => 0,
            'harga' => 800000
        ]);
        Armada::create([
            'mobil_id' => 3,
            'plat_nomor' => 'B 2322 D',
            'status' => 1,
            'harga' => 800000
        ]);
        Armada::create([
            'mobil_id' => 4,
            'plat_nomor' => 'AD 2234 WS',
            'status' => 0,
            'harga' => 800000
        ]);
    }
}
