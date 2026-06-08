<?php

namespace Database\Factories;

use App\Models\Pronunciamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pronunciamiento>
 */
class PronunciamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'author_name' => $this->faker->name(),
            'author_title' => $this->faker->jobTitle(),
            'author_image' => null,
            'excerpt' => $this->faker->paragraph(2),
            'content' => $this->faker->text(800),
            'is_active' => true,
            'published_at' => now(),
        ];
    }
}
