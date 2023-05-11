<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mobil::create([
            'type_mobil' => 'Avansa',
            'plat_nomor' => 'B 8733 BJA',
            'bensin' => 'Pertalite',
            'jumlah' => '2',
        ]);
        Mobil::create([
            'type_mobil' => 'Pajero',
            'plat_nomor' => 'AD 5434 FG',
            'bensin' => 'Pertamax',
            'jumlah' => '2',
        ]);
        Mobil::create([
            'type_mobil' => 'Civic',
            'plat_nomor' => 'AD 4355 SSD',
            'bensin' => 'Pertamax Turbo',
            'jumlah' => '3',
        ]);
        Mobil::create([
            'type_mobil' => 'Brio',
            'plat_nomor' => 'AD 2234 WS',
            'bensin' => 'Pertalite',
            'jumlah' => '1',
        ]);
    }
}
