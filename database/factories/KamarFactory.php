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
            'pemilik_id' => Pemilik::factory(), // Menggunakan factory Pemilik untuk membuat pemilik baru
            'nomor_kamar' => $this->faker->unique()->numberBetween(1, 100), // Nomor kamar unik
            'harga_sewa' => $this->faker->randomFloat(2, 500000, 2000000), // Harga sewa antara 500.000 dan 2.000.000
            'fasilitas' => $this->faker->sentence(3), // Fasilitas kamar
            'status' => $this->faker->randomElement(['terisi', 'kosong']), // Status kamar
        ];
    }
}
