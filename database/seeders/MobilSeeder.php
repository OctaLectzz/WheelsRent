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
            'bensin' => 'Pertalite',
            'jumlah' => '2',
        ]);
        Mobil::create([
            'type_mobil' => 'Pajero',
            'bensin' => 'Pertamax',
            'jumlah' => '2',
        ]);
        Mobil::create([
            'type_mobil' => 'Civic',
            'bensin' => 'Pertamax Turbo',
            'jumlah' => '3',
        ]);
        Mobil::create([
            'type_mobil' => 'Brio',
            'bensin' => 'Pertalite',
            'jumlah' => '1',
        ]);
    }
}
