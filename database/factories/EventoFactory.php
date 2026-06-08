<?php

namespace Database\Factories;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'description' => $this->faker->paragraph(2),
            'image_path' => null,
            'event_date' => $this->faker->dateTimeBetween('now', '+2 months'),
            'location' => $this->faker->address(),
            'external_link' => $this->faker->url(),
            'is_active' => true,
        ];
    }
}
