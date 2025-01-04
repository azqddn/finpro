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
        $products = [
            // Fruits and Vegetables (Category 1)
            ['categoryId' => 1, 'productName' => 'Epal Merah', 'productCost' => 2.50, 'productSell' => 3.50, 'productQuantity' => 100, 'stockAlert' => 10],
            ['categoryId' => 1, 'productName' => 'Lobak Merah', 'productCost' => 1.20, 'productSell' => 2.00, 'productQuantity' => 150, 'stockAlert' => 15],
            
            // Meat and Poultry (Category 2)
            ['categoryId' => 2, 'productName' => 'Daging Lembu', 'productCost' => 25.00, 'productSell' => 30.00, 'productQuantity' => 50, 'stockAlert' => 5],
            ['categoryId' => 2, 'productName' => 'Ayam Kampung', 'productCost' => 15.00, 'productSell' => 20.00, 'productQuantity' => 75, 'stockAlert' => 8],
            
            // Seafood (Category 3)
            ['categoryId' => 3, 'productName' => 'Ikan Kembung', 'productCost' => 8.00, 'productSell' => 10.00, 'productQuantity' => 60, 'stockAlert' => 6],
            ['categoryId' => 3, 'productName' => 'Sotong', 'productCost' => 18.00, 'productSell' => 22.00, 'productQuantity' => 40, 'stockAlert' => 4],
            
            // Dairy Products and Eggs (Category 4)
            ['categoryId' => 4, 'productName' => 'Susu Segar', 'productCost' => 3.00, 'productSell' => 5.00, 'productQuantity' => 120, 'stockAlert' => 12],
            ['categoryId' => 4, 'productName' => 'Telur Ayam', 'productCost' => 0.50, 'productSell' => 1.00, 'productQuantity' => 200, 'stockAlert' => 20],
            
            // Bakery and Grains (Category 5)
            ['categoryId' => 5, 'productName' => 'Roti Putih', 'productCost' => 1.00, 'productSell' => 1.50, 'productQuantity' => 180, 'stockAlert' => 18],
            ['categoryId' => 5, 'productName' => 'Nasi Beras Wangi', 'productCost' => 25.00, 'productSell' => 30.00, 'productQuantity' => 70, 'stockAlert' => 7],
            
            // Spices and Condiments (Category 6)
            ['categoryId' => 6, 'productName' => 'Serbuk Cili', 'productCost' => 4.00, 'productSell' => 6.00, 'productQuantity' => 90, 'stockAlert' => 9],
            ['categoryId' => 6, 'productName' => 'Kicap Manis', 'productCost' => 2.50, 'productSell' => 4.00, 'productQuantity' => 110, 'stockAlert' => 11],
            
            // Prepared Foods (Category 7)
            ['categoryId' => 7, 'productName' => 'Mee Goreng', 'productCost' => 3.50, 'productSell' => 5.50, 'productQuantity' => 80, 'stockAlert' => 8],
            ['categoryId' => 7, 'productName' => 'Nasi Lemak Bungkus', 'productCost' => 2.00, 'productSell' => 4.00, 'productQuantity' => 150, 'stockAlert' => 15],
            
            // Dry Goods and Staples (Category 8)
            ['categoryId' => 8, 'productName' => 'Tepung Gandum', 'productCost' => 1.80, 'productSell' => 2.50, 'productQuantity' => 100, 'stockAlert' => 10],
            ['categoryId' => 8, 'productName' => 'Gula Pasir', 'productCost' => 2.00, 'productSell' => 3.00, 'productQuantity' => 120, 'stockAlert' => 12],
            
            // Beverages (Category 9)
            ['categoryId' => 9, 'productName' => 'Teh Tarik', 'productCost' => 1.50, 'productSell' => 3.00, 'productQuantity' => 140, 'stockAlert' => 14],
            ['categoryId' => 9, 'productName' => 'Kopi O', 'productCost' => 1.20, 'productSell' => 2.50, 'productQuantity' => 130, 'stockAlert' => 13],
            
            // Others (Category 10)
            ['categoryId' => 10, 'productName' => 'Plastik Pembungkus', 'productCost' => 0.30, 'productSell' => 0.50, 'productQuantity' => 200, 'stockAlert' => 20],
            ['categoryId' => 10, 'productName' => 'Ais Kiub', 'productCost' => 0.20, 'productSell' => 0.50, 'productQuantity' => 300, 'stockAlert' => 30],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'productName' => $product['productName'],
                'productCost' => $product['productCost'],
                'productSell' => $product['productSell'],
                'productQuantity' => $product['productQuantity'],
                'stockAlert' => $product['stockAlert'],
                'productExpired' => now()->addDays(rand(30, 365)),
                'expiredAlert' => now()->addDays(rand(15, 30)),
                'productProof' => Str::random(10) . '.jpg',
                'productStatus' => 1,
                'transactions' => rand(0, 100),
                'userId' => 1, // Assuming userId 1 exists
                'categoryId' => $product['categoryId'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
