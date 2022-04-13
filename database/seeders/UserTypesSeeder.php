<?php

namespace Database\Seeders;

use App\Models\UsersTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersTypes::create([
            'type' => 'admin',
            'description' => 'description admin',
        ]);
        UsersTypes::create([
            'type' => 'user',
            'description' => 'description admin',

        ]);
        UsersTypes::create([
            'type' => 'hotel',
            'description' => 'description admin',
        ]);
        UsersTypes::create([
            'type' => 'rent',
            'description' => 'description admin',

        ]);
        UsersTypes::create([
            'type' => 'guide',
            'description' => 'description admin',

        ]);
    }
}
