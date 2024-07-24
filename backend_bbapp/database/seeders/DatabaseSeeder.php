<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
            EmployeeSeeder::class,
            MiscellaneousSeeder::class,
            QuotationSeeder::class,
            SaleSeeder::class,
            ServiceSeeder::class,
            SupplySeeder::class,
            WorkdaySeeder::class,
            UserWorkdaysSeeder::class,
            ServiceQuotationsSeeder::class,
            QuotationUsersSeeder::class,
            ServiceUsersSeeder::class,
            SupplyUsersSeeder::class,
            MiscellaneousUsersSeeder::class
        ]);
        // User::factory(3)->create();
        // Employee::factory(10)->create();
        // Client::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
