<?php

namespace Database\Seeders;

use App\Models\Art;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //this method calls in the factory to fill in the database by the amount in the count then creates the seeds.

    public function run()
    {
    Art::factory()->count(10)->create();

    }
}