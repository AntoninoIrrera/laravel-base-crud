<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
<<<<<<< HEAD
        $this->call([
            GenreSeeder::class,
            RoleTableSeeder::class,
            BooksTableSeeder::class,
            BookGenreSeeder::class
        ]);
=======

        $this->call(
            [
                GenreSeeder::class,
                UserSeeder::class,
                UserDetailSeeder::class,
                BooksTableSeeder::class,
                BookGenreSeeder::class,
            ]
        );
>>>>>>> develop
    }
}
