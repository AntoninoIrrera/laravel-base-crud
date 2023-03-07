<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newAuthor = new Author();
            $newAuthor->first_name = $faker->firstName();
            $newAuthor->last_name = $faker->lastName();
            $newAuthor->birthdate = $faker->date();
            $newAuthor->biography = $faker->realTextBetween(200, 400);
            $newAuthor->save();
        }
    }
}
