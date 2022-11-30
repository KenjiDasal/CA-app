<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Art;
use Database\Factories\ArtistArtFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class ArtistArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         ArtistArt::factory()->times(10)->create();

      $authors = Author::all();
      $books = Book::all();


      return [
          'author_id' => $authors->random()->id,
          'book_id' => $books->random()->id
      ];
    }
}