<?php

namespace Database\Seeders;

use App\Models\supply;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        $supplies = [
            [
                'supply_name' => 'Supply A',
                'quantity' => 10.5,
                'price' => 50.00,
                'change_measurement' => 'kg',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'supply_name' => 'Supply B',
                'quantity' => 20.0,
                'price' => 30.00,
                'change_measurement' => 'liters',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'supply_name' => 'Supply C',
                'quantity' => 15.5,
                'price' => 45.00,
                'change_measurement' => 'pieces',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'supply_name' => 'Supply D',
                'quantity' => 12.0,
                'price' => 25.00,
                'change_measurement' => 'kg',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'supply_name' => 'Supply E',
                'quantity' => 18.5,
                'price' => 60.00,
                'change_measurement' => 'liters',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'supply_name' => 'Supply F',
                'quantity' => 22.0,
                'price' => 35.00,
                'change_measurement' => 'pieces',
                'user_id' => $userIds[array_rand($userIds)],
            ],
        ];

        foreach ($supplies as $supply) {
            supply::create($supply);
        }
    }
}
