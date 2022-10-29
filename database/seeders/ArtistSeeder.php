<?php

namespace Database\Seeders;

use App\Models\Artist;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //this method calls the factory to fill in the database based on the amount set in the count parameter then creates it.

    public function run()
    {
        Artist::factory()->count(10)->create();
    }
}