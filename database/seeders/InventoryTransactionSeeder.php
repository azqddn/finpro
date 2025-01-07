<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventoryTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'Epal Merah', 'Lobak Merah', 'Daging Lembu', 'Ayam Kampung', 'Ikan Kembung',
            'Sotong', 'Susu Segar', 'Telur Ayam', 'Roti Putih', 'Nasi Beras Wangi',
            'Serbuk Cili', 'Kicap Manis', 'Mee Goreng', 'Nasi Lemak Bungkus', 'Tepung Gandum',
            'Gula Pasir', 'Teh Tarik', 'Kopi O', 'Plastik Pembungkus', 'Ais Kiub'
        ];

        foreach ($products as $product) {
            // Randomize number of product variations (e.g., Epal Merah: 2, Epal Merah: 4)
            $productVariations = rand(1, 3); // Each product can have 1-3 variations

            for ($i = 0; $i < $productVariations; $i++) {
                $randomQuantity = rand(1, 10); // Random quantity (1–10)

                DB::table('inventory_transactions')->insert([
                    'transProduct' => "{$product}: {$randomQuantity}",
                    'transQuantity' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
