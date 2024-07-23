<?php

namespace Database\Seeders;

use App\Models\Quotation;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quotationIds = Quotation::all()->pluck('id')->toArray();
        $userIds = User::all()->pluck('id')->toArray();

        $sales = [
            [
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'advance' => 500.00,
                'remaining_payment' => 1000.00,
                'quotation_id' => $quotationIds[array_rand($quotationIds)],
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'start_date' => now(),
                'end_date' => now()->addDays(45),
                'advance' => 700.00,
                'remaining_payment' => 800.00,
                'quotation_id' => $quotationIds[array_rand($quotationIds)],
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'start_date' => now(),
                'end_date' => now()->addDays(60),
                'advance' => 600.00,
                'remaining_payment' => 900.00,
                'quotation_id' => $quotationIds[array_rand($quotationIds)],
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'start_date' => now(),
                'end_date' => now()->addDays(75),
                'advance' => 800.00,
                'remaining_payment' => 700.00,
                'quotation_id' => $quotationIds[array_rand($quotationIds)],
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'start_date' => now(),
                'end_date' => now()->addDays(90),
                'advance' => 900.00,
                'remaining_payment' => 600.00,
                'quotation_id' => $quotationIds[array_rand($quotationIds)],
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'start_date' => now(),
                'end_date' => now()->addDays(120),
                'advance' => 1000.00,
                'remaining_payment' => 500.00,
                'quotation_id' => $quotationIds[array_rand($quotationIds)],
                'user_id' => $userIds[array_rand($userIds)],
            ],
        ];

        foreach ($sales as $sale) {
            Sales::create($sale);
        }
    }
}
