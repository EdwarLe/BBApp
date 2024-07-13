<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'job' => 'Operario',
                'first_name' => 'Alice',
                'surname' => 'Johnson',
                'id_type' => 'Cédula',
                'id_number' => '12345678',
                'salary' => 5500.00
            ],
            [
                'job' => 'Operario',
                'first_name' => 'Bob',
                'surname' => 'Smith',
                'id_type' => 'PEP',
                'id_number' => 'B23456789',
                'salary' => 5500.00
            ],
            [
                'job' => 'Operario',
                'first_name' => 'Charlie',
                'surname' => 'Brown',
                'id_type' => 'Cédula',
                'id_number' => '34567890',
                'salary' => 5500.00
            ],
            [
                'job' => 'Cortador',
                'first_name' => 'David',
                'surname' => 'Williams',
                'id_type' => 'Passport',
                'id_number' => 'D45678901',
                'salary' => 6000.00
            ],
            [
                'job' => 'Administrador',
                'first_name' => 'Eva',
                'surname' => 'Davis',
                'id_type' => 'Cédula',
                'id_number' => '56789012',
                'salary' => 12000.00
            ],
            [
                'job' => 'Cortador',
                'first_name' => 'Frank',
                'surname' => 'Miller',
                'id_type' => 'Cédula',
                'id_number' => '67890123',
                'salary' => 8000.00
            ],
            [
                'job' => 'Operario',
                'first_name' => 'Grace',
                'surname' => 'Wilson',
                'id_type' => 'Passport',
                'id_number' => 'G78901234',
                'salary' => 5500.00
            ],
            [
                'job' => 'Operario',
                'first_name' => 'Henry',
                'surname' => 'Moore',
                'id_type' => 'PEP',
                'id_number' => 'H89012345',
                'salary' => 5500.00
            ],
            [
                'job' => 'Operario',
                'first_name' => 'Ivy',
                'surname' => 'Taylor',
                'id_type' => 'Cécula',
                'id_number' => '90123456',
                'salary' => 5500.00
            ],
            [
                'job' => 'Vendedor',
                'first_name' => 'Jack',
                'surname' => 'Anderson',
                'id_type' => 'Cédula',
                'id_number' => '1234567',
                'salary' => 6000.00
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
