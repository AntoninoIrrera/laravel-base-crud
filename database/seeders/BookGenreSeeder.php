<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $books = Book::all();

        $genreIds = Genre::all()->pluck('id');

        foreach ($books as $book) {
            $book->genres()->attach($faker->randomElements($genreIds, 3));
        }
    }
}
