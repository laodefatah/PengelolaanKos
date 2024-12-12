<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Kamar;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penghuni>
 */
class PenghuniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'no_whatsapp' => $this->faker->phoneNumber,
            'tanggal_masuk' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tanggal_keluar' => $this->faker->optional()->dateTimeBetween('now', '+1 year'),
        ];
    }
}
