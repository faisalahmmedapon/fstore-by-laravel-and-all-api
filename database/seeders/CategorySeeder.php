<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = array(
            [
                'name' => 'WashingMachine',
                'slug' => 'WashingMachine',
                'photo' => "backend/images/apple.jpg",
                'custom_serial_number' => 8,
            ],

        );
        foreach ($categories as $category) {
                Category::updateOrCreate($category);
        }
    }
}
