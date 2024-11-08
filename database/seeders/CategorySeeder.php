<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            ['categoryName' => 'Fruits and Vegetables'],
            ['categoryName' => 'Meat and Poultry'],
            ['categoryName' => 'Seafood'],
            ['categoryName' => 'Dairy Products and Eggs'],
            ['categoryName' => 'Bakery and Grains'],
            ['categoryName' => 'Spices and Condiments'],
            ['categoryName' => 'Prepared Foods'],
            ['categoryName' => 'Dry Goods and Staples'],
            ['categoryName' => 'Baverage'],
            ['categoryName' => 'Others'],
        ];

        foreach ($category as $key => $category) {
            Category::create($category);
        }
    }
}
