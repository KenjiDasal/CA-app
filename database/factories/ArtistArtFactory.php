<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArtistArtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $artists = Artist::all();
        // $art = Art::all();

        // return [
        //     'artist_id' => $artists->random()->id,
        //     'art_id' => $ar->random()->id
        // ];

        return [

            'name' => fake()->name(),
            'bio' => fake()->realText()

        ];
    }
}