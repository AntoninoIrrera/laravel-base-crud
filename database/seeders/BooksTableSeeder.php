<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) { 
            $new_book = new Book();
            $new_book->title = $faker->realText(20);
            $new_book->author = $faker->name();
            $new_book->publication_date = $faker->year();
            $new_book->description = $faker->paragraph();
            $new_book->genre = $faker->word();
            $new_book->cover_image = $faker->imageUrl();
            $new_book->ISBN = $faker->isbn13();
            $new_book->price = $faker->randomFloat(2, 10, 200);
            $new_book->editor = $faker->name();
            $new_book->save();
        }
    }
}
