<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = array(
            [
                'title' => 'T800 Ultra Soft Clear Screen Protector - KD99, H10 Ultra, Z66, TS8 Ultra 8 Series 45/46/47mm Watch Soft Watch Screen Protector-Screen Protectors Protector Film for T800 Ultra Smart Watch ',
                'slug' => 'T800 Ultra Soft Clear Screen Protector - KD99, H10 Ultra, Z66, TS8 Ultra 8 Series 45/46/47mm Watch Soft Watch Screen Protector-Screen Protectors Protector Film for T800 Ultra Smart Watch ',
                'photo' => 'https://t3.ftcdn.net/jpg/00/97/83/56/360_F_97835683_bO8Eb355x4DezP3ngpiIM5x6px0ecDz4.jpg',
                'price' => '100',
                'discount' => '2',
                'discount_type' => 'percentage',
                'discount_price' => '98',
                'description' => 'description',
                'category_id' => 1,
            ],
        );
        foreach ($products as $product) {
            Product::updateOrCreate($product);
        }
    }
}
