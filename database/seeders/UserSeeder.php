<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $admin = new User();
        $admin->role_id = 1;
        $admin->name = 'Admin';
        $admin->email = 'admin@boolpress.com';
        $admin->password = Hash::make('12345678');
        $admin->save();
        //
        for ($i = 0; $i < 20; $i++) {
            $newUser = new User();
            $newUser->role_id = Role::inRandomOrder()->first()->id;
            $newUser->name = $faker->name();
            $newUser->email = $faker->unique()->email();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
        }
    }
}
