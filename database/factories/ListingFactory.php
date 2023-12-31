<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Frontend Developer', 'Backend Developer', 'Python Developer']),
            'company' => fake()->company(),
            'description' => fake()->paragraph(),
            'tags' => implode(',', fake()->randomElements(['php', 'laravel', 'vue', 'react', 'api', 'typescript', 'next', 'nuxt'], 2)),
            'location' => fake()->city(),
            'created_by' => 1
        ];
    }
}
