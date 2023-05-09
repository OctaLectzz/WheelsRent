<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobil>
 */
class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_mobil' => fake()->word(),
            'plat_nomor' => mt_rand(1000, 3000),
            'bensin' => 'pertamax',
            'jumlah' => mt_rand(1, 10),
            'status' => mt_rand(0, 1),
        ];
    }
}
