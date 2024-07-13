<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'client_name' => 'Alice',
                'client_surname' => 'Smith',
                'phone_number' => '555-1234',
                'address' => '123 Main St',
                'company_name' => 'Alice Co'
            ],
            [
                'client_name' => 'Bob',
                'client_surname' => 'Johnson',
                'phone_number' => '555-5678',
                'address' => '456 Elm St',
                'company_name' => 'Bob LLC'
            ],
            [
                'client_name' => 'Charlie',
                'client_surname' => 'Brown',
                'phone_number' => '555-9101',
                'address' => '789 Oak St',
                'company_name' => 'Charlie Inc'
            ],
            [
                'client_name' => 'David',
                'client_surname' => 'Wilson',
                'phone_number' => '555-1122',
                'address' => '101 Pine St',
                'company_name' => 'David Enterprises'
            ],
            [
                'client_name' => 'Eva',
                'client_surname' => 'Taylor',
                'phone_number' => '555-1314',
                'address' => '102 Maple St',
                'company_name' => 'Eva Ltd'
            ],
            [
                'client_name' => 'Frank',
                'client_surname' => 'Anderson',
                'phone_number' => '555-1516',
                'address' => '103 Birch St',
                'company_name' => 'Frank Corp'
            ],
            [
                'client_name' => 'Grace',
                'client_surname' => 'Thomas',
                'phone_number' => '555-1718',
                'address' => '104 Cedar St',
                'company_name' => 'Grace Partners'
            ],
            [
                'client_name' => 'Henry',
                'client_surname' => 'Moore',
                'phone_number' => '555-1920',
                'address' => '105 Spruce St',
                'company_name' => 'Henry Group'
            ],
            [
                'client_name' => 'Ivy',
                'client_surname' => 'Clark',
                'phone_number' => '555-2122',
                'address' => '106 Aspen St',
                'company_name' => 'Ivy Solutions'
            ],
            [
                'client_name' => 'Jack',
                'client_surname' => 'Wright',
                'phone_number' => '555-2324',
                'address' => '107 Fir St',
                'company_name' => 'Jack Dynamics'
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
