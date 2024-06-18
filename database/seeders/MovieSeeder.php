<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan 20 movie baru secara acak
        Movie::factory()->count(20)->create()->each(function ($movie) {
            // Setiap movie memiliki 1 hingga 3 genre secara acak
            $genres = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $movie->genres()->attach($genres);
        });
    }
}
