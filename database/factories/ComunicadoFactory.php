<?php

namespace Database\Factories;

use App\Models\Comunicado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comunicado>
 */
class ComunicadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(5);
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'summary' => $this->faker->sentence(10),
            'file_path' => null, // PDF files
            'image_path' => null,
            'published_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'is_active' => true,
        ];
    }
}
