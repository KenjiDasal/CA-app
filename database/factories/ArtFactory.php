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

            'title' => fake()->name(),
            'artist' => fake()->name(),
            'category' => fake()->name(),
            'description' => fake()->name(),
            'likes' => '255',

        ];
    }
}