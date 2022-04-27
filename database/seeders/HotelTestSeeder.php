<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Hotel;
use App\Models\HotelBranch;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HotelTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 250 user and 250 hotels
        for ($i = 1; $i <= 250; $i++) {
            $user =
                User::create([
                    'email' => 'admin' . $i . '@admin.com',
                    'user_type' => 3,
                    'password' => Hash::make('1234123'),
                    'name' => 'hotel admin: ' . $i,
                ]);

            $hotel = Hotel::create([
                'name' => 'Hotel Name: ' . $i,
                'tagline' => 'Hotel Tagline: ' . $i,
                'website' => 'www.Website' . $i . '.com',
                'email' => 'hotelEmail@email' . $i . '.com',
                'phone' => '3848293' . $i,
                'logo' => 'hotel_sample_logo.png',
                'user_id' => $user->id,
            ]);

            for ($j = 1; $j <= 2; $j++) {
                $branch = HotelBranch::create([
                    'hotel_id' => $hotel->id,
                    'user_id' => $user->id,
                    'city_id' => City::all()->random(1)[0]->id,
                    'map_location' => 'location',
                    'name' => 'branch name: ' . $j,
                    'location_description' => 'kddkdk',
                    'email' => 'email@gmail.com',
                    'phone' => '3832983',
                    'swimming_pool' => rand(0, 1),
                    'resturant' => rand(0, 1),
                    'gym' => rand(0, 1),
                    'laundry' => rand(0, 1),
                ]);


                for ($k = 1; $k <= 2; $k++) {
                    $category = RoomCategory::create([
                        'hotel_id' => $hotel->id,
                        'branch_id' => $branch->id,
                        'user_id' => $hotel->user_id,
                        'name' => 'Room Category: ' . $k,
                        'description' => 'Category description: ' . $k,
                        'capacity' => rand(1, 6),
                        'single_beds' => rand(1, 6),
                        'double_beds' => rand(1, 6),
                        'rooms' => rand(1, 6),
                        'bathrooms' => rand(1, 3),
                        'wifi' => rand(0, 1),
                        'balcony' => rand(0, 1),
                        'price' => rand(5, 120),
                        'tv' => rand(0, 1),
                        'lunch' => rand(0, 1),
                        'active' => 1,
                    ]);

                    for ($l = 1; $l <= 10; $l++) {
                        Room::create([
                            'hotel_id' => $hotel->id,
                            'branch_id' => $branch->id,
                            'category_id' => $category->id,
                            'available' => 1,
                            'active' => 1,
                        ]);
                    }
                }
            }
        }
    }
}
