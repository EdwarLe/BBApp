<?php

namespace Database\Seeders;

use App\Models\Miscellaneous;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiscellaneousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::all()->pluck('id')->toArray();

        $miscellaneousItems = [
            [
                'miscellaneous_name' => 'Tintos',
                'quantity' => 5.0,
                'price' => 1000.00,
                'change_measurement' => 'ud',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Papel Craft',
                'quantity' => 70.0,
                'price' => 12000.00,
                'change_measurement' => 'ud',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Papel Craft',
                'quantity' => 30.0,
                'price' => 5500.00,
                'change_measurement' => 'ud',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Item 4',
                'quantity' => 3.0,
                'price' => 50.00,
                'change_measurement' => 'meters',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Item 5',
                'quantity' => 12.1,
                'price' => 75.00,
                'change_measurement' => 'kg',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Item 6',
                'quantity' => 9.6,
                'price' => 120.00,
                'change_measurement' => 'liters',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Item 7',
                'quantity' => 4.4,
                'price' => 95.00,
                'change_measurement' => 'pieces',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Item 8',
                'quantity' => 8.9,
                'price' => 110.00,
                'change_measurement' => 'meters',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Item 9',
                'quantity' => 2.7,
                'price' => 130.00,
                'change_measurement' => 'kg',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'miscellaneous_name' => 'Item 10',
                'quantity' => 6.5,
                'price' => 140.00,
                'change_measurement' => 'liters',
                'user_id' => $userIds[array_rand($userIds)],
            ],
        ];

        foreach ($miscellaneousItems as $item) {
            Miscellaneous::create($item);
        }
    }
}
