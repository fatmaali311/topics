<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'subject' =>fake()->text(),
            'message' =>fake()->text(),
            'email' => fake()->unique()->safeEmail(),
            'read' =>fake()->numberBetween(0,1),
            
        ];
    }
}
