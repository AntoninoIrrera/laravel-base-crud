<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                "name" => 'Admin',
                "color" => '#efc760'
            ],
            [
                "name" => 'Pro User',
                "color" => '#d3ffce'
            ],
            [
                "name" => 'Visitator',
                "color" => '#83a3ee'
            ],
        ];

        foreach ($roles as $role) {
            $newRole = new Role();
            $newRole->name = $role['name'];
            $newRole->color = $role['color'];
            $newRole->save();
        }
    }
}
