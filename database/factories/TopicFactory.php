<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'content' => fake()->text(),
            'content' => fake()->numberBetween(0, 40),
            'trending' => fake()->numberBetween(0, 1),
            'published' => fake()->numberBetween(0, 1),
            'image' => basename(fake()->image(public_path('assets/admin/images/topics'))),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
