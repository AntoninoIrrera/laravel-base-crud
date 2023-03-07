<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $genres = ['Poliziesco', 'Fantasy', 'Fantascientifico', 'Giallo', 'Romanzo', 'Thriller', 'Avventura', 'Biografia', 'Horror', 'Humor', 'Storico' ];
        foreach ($genres as $genreName) {
            $newTechnology = new Genre();
            $newTechnology->name = $genreName;
            $newTechnology->color = $faker->unique()->colorName();
            $newTechnology->save();
        }
    }
}
