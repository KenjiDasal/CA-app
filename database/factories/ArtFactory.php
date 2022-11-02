<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Art>
 */
class ArtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //this method fills the database with fake art into the database.

    public function definition()
    {
        return [

            'title' => fake()->word(),
            'artist' => fake()->name(),
            'category' => fake()->word(),
            'description' => fake()->text(200),
            'likes' => fake()->numberBetween(0, 1000000),

        ];
    }
}
