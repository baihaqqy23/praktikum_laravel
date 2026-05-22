<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Faker menghasilkan nama asli
'nama' => fake()->name(),
// Menghasilkan angka acak 9 digit sebagai NIM
'nim' => fake()->unique()->numerify('#########'),
// Mengambil salah satu nilai dari array
'jurusan' => fake()->randomElement(['Teknik Informatika',
'Sistem Informasi', 'Teknik Sipil']),

        ];
    }
}
