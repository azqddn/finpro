<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\InventoryTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('records')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        // Retrieve transaction IDs
        $transactionIds = DB::table('inventory_transactions')->pluck('id')->toArray();

        if (empty($transactionIds)) {
            $this->command->info('No inventory transactions found. Seeder aborted.');
            return;
        }

        // Set initial balance
        $currentBalance = rand(1000, 5000); // Starting balance

        $startDate = Carbon::now()->subMonths(3); // Start 2 months ago
        $endDate = Carbon::now();
        $days = $startDate->diffInDays($endDate);

        $totalRecords = 0;

        for ($i = 0; $i <= $days; $i++) {
            $currentDate = $startDate->copy()->addDays($i);

            // 🔹 **Opening Record**
            DB::table('records')->insert([
                'userId' => 2,
                'transId' => null,
                'recordDesc' => 'Opening',
                'recordRevenue' => null,
                'recordExpenses' => null,
                'recordBalance' => $currentBalance,
                'recordNotes' => null,
                'recordProof' => null,
                'recordStatus' => 1,
                'created_at' => $currentDate->copy()->startOfDay(),
                'updated_at' => $currentDate->copy()->startOfDay(),
            ]);

            $dailyEntries = rand(2, 4); // Random 2-4 sales entries

            for ($j = 0; $j < $dailyEntries; $j++) {
                $transId = $transactionIds[array_rand($transactionIds)];
                $product = DB::table('inventory_transactions')->find($transId)->transProduct;

                // Determine if the record is Revenue or Expense
                $isRevenue = (bool)rand(0, 1);
                $amount = rand(50, 500); // Random amount for revenue/expense

                // Notes for revenue and expenses
                if ($isRevenue) {
                    $currentBalance += $amount; // Increase balance if revenue
                    $recordNotes = $this->getRevenueNotes();
                } else {
                    $currentBalance -= $amount; // Decrease balance if expense
                    $recordNotes = $this->getExpenseNotes();
                }

                DB::table('records')->insert([
                    'userId' => 2,
                    'transId' => $transId,
                    'recordDesc' => $isRevenue ? 'Sales (Revenue)' : 'Expense',
                    'recordRevenue' => $isRevenue ? $amount : null,
                    'recordExpenses' => !$isRevenue ? $amount : null,
                    'recordBalance' => $currentBalance,
                    'recordNotes' => $recordNotes,
                    'recordProof' => null,
                    'recordStatus' => 1,
                    'created_at' => $currentDate->copy()->addHours(rand(9, 18)),
                    'updated_at' => $currentDate->copy()->addHours(rand(9, 18)),
                ]);
            }

            // 🔹 **Closing Record**
            DB::table('records')->insert([
                'userId' => 2,
                'transId' => null,
                'recordDesc' => 'Closing',
                'recordRevenue' => null,
                'recordExpenses' => null,
                'recordBalance' => $currentBalance,
                'recordNotes' => null,
                'recordProof' => null,
                'recordStatus' => 1,
                'created_at' => $currentDate->copy()->endOfDay(),
                'updated_at' => $currentDate->copy()->endOfDay(),
            ]);

            $totalRecords += ($dailyEntries + 2);
            if ($totalRecords >= 50) {
                break;
            }
        }

        $this->command->info("Successfully seeded {$totalRecords} records with balanced revenue and expense management.");
    }

    /**
     * Get suitable revenue notes.
     */
    private function getRevenueNotes(): string
    {
        $notes = [
            'Special order for bulk purchase',
            'Revenue from special promotions',
            'Advance payment'
        ];

        return $notes[array_rand($notes)];
    }

    /**
     * Get suitable expense notes.
     */
    private function getExpenseNotes(): string
    {
        $notes = [
            'Payment for bulk meat',
            'Payment for supplier invoice',
            'Monthly rental payment'
        ];

        return $notes[array_rand($notes)];
    }
}
