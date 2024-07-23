<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        $services = [
            [
                'service_name' => 'Pegados de Libros',
                'quantity' => 2,
                'price' => 100.00,
                'currency' => 'USD',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'service_name' => 'Plegado',
                'quantity' => 1,
                'price' => 150.00,
                'currency' => 'EUR',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'service_name' => 'Costura al Caballete',
                'quantity' => 3,
                'price' => 200.00,
                'currency' => 'USD',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'service_name' => 'Tapas',
                'quantity' => 1,
                'price' => 120.00,
                'currency' => 'USD',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'service_name' => 'Montaje de Tapas',
                'quantity' => 2,
                'price' => 180.00,
                'currency' => 'EUR',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'service_name' => 'Costura con Hilo',
                'quantity' => 1,
                'price' => 130.00,
                'currency' => 'USD',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'service_name' => 'Pegue de Taco',
                'quantity' => 3,
                'price' => 220.00,
                'currency' => 'EUR',
                'user_id' => $userIds[array_rand($userIds)],
            ],
            [
                'service_name' => 'Intercale',
                'quantity' => 1,
                'price' => 140.00,
                'currency' => 'USD',
                'user_id' => $userIds[array_rand($userIds)],
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
