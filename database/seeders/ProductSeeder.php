<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::where('name', 'owner')->first();
        $categories = Category::all()->pluck('id')->toArray();

        $product = [
            [
                'productName' => 'Sayur Bayam',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Ayam Kampung',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Ikan Salmon',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Sotong',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Kerang',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Lala',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Timun',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Roti Gardenia',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Daging',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
            [
                'productName' => 'Air',
                'productCost' => rand(1, 20),
                'productSell' => rand(1, 30),
                'productQuantity' => rand(30, 70),
                'stockAlert' => rand(10, 20),
                'productExpired' => now()->addDays(rand(30, 180)),
                'expiredAlert' => now()->addDays(rand(25, 150)),
                'productProof' => 'proof_' . Str::random(10) . '.jpg',
                'productStatus' => 1,
                'userId' => $owner->id, // Randomly assign a user ID
                'categoryId' => $categories[array_rand($categories)], // Randomly assign a category ID
            ],
        ];

        foreach ($product as $key => $products) {
            Product::create($products);
        }
    }
}
