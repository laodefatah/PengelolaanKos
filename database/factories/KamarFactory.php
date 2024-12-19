<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Pemilik;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_kamar' => $this->faker->word(),
            'tipe_kamar' => $this->faker->randomElement(['A', 'B', 'C']), 
            'harga_per_bulan' => $this->faker->numberBetween(500000, 2000000), 
            'status' => $this->faker->randomElement(['tersedia', 'terisi']), 
        ];
    }
}
