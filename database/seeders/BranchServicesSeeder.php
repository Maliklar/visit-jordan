<?php

namespace Database\Seeders;

use App\Models\BranchServicesCategory;
use App\Models\BranchServiesCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'bathroom',
            'internet',
            'accessability',
            'parking',
            'transport',
            'outdoor swimming pool',
            'bedroom',
            'services',
            'wellness',
            'view',
            'outdoors',
            'living area',
            'media & technology',
            'food & drink',
            'general',
            'languages spoken',
            'reception services',
            'services'
        ];

        for ($i = 0; $i < sizeof($categories); $i++) {
            BranchServicesCategory::create(['name' => $categories[$i]]);
        }
    }
}
