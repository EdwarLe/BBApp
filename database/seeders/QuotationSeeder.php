<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Quotation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $clientIds = Client::all()->pluck('id')->toArray();

        $quotations = [
            [
                'quantity' => 100,
                'description' => 'Description for Company 1',
                'price' => 1000.00,
                'advance_percentage' => 20.0,
                'remaining_percentage' => 80.0,
                'is_sales' => true,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 200,
                'description' => 'Description for Company 2',
                'price' => 2000.00,
                'advance_percentage' => 30.0,
                'remaining_percentage' => 70.0,
                'is_sales' => false,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 150,
                'description' => 'Description for Company 3',
                'price' => 1500.00,
                'advance_percentage' => 25.0,
                'remaining_percentage' => 75.0,
                'is_sales' => true,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 80,
                'description' => 'Description for Company 4',
                'price' => 800.00,
                'advance_percentage' => 10.0,
                'remaining_percentage' => 90.0,
                'is_sales' => false,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 120,
                'description' => 'Description for Company 5',
                'price' => 1200.00,
                'advance_percentage' => 40.0,
                'remaining_percentage' => 60.0,
                'is_sales' => true,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 250,
                'description' => 'Description for Company 6',
                'price' => 2500.00,
                'advance_percentage' => 35.0,
                'remaining_percentage' => 65.0,
                'is_sales' => false,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 300,
                'description' => 'Description for Company 7',
                'price' => 3000.00,
                'advance_percentage' => 50.0,
                'remaining_percentage' => 50.0,
                'is_sales' => true,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 90,
                'description' => 'Description for Company 8',
                'price' => 900.00,
                'advance_percentage' => 15.0,
                'remaining_percentage' => 85.0,
                'is_sales' => false,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 110,
                'description' => 'Description for Company 9',
                'price' => 1100.00,
                'advance_percentage' => 45.0,
                'remaining_percentage' => 55.0,
                'is_sales' => true,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
            [
                'quantity' => 130,
                'description' => 'Description for Company 10',
                'price' => 1300.00,
                'advance_percentage' => 20.0,
                'remaining_percentage' => 80.0,
                'is_sales' => false,
                'client_id' => $clientIds[array_rand($clientIds)],
            ],
        ];

        foreach ($quotations as $quotation) {
            Quotation::create($quotation);
        }
    }
}
