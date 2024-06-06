<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => 8,
            'kode_qr' => Str::random(13),
            'judul' => fake()->sentence(),
            'gambar' => fake()->sentence(),
            'isi_konten' => fake()->paragraphs(7,true)
        ];
    }
}
