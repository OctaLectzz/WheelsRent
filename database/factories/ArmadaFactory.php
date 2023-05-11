<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Armada>
 */
class ArmadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mobil_id' => rand(1, 20),
            'plat_nomor' => 'AD 7645 HF',
            'status' => rand(0, 1),
            'harga' => rand(100000, 1000000)
        ];
    }
}
