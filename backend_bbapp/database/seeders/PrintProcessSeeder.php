<?php

namespace Database\Seeders;

use App\Models\PrintProcess;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrintProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $printProcesses = [
            [
                'name_paper_type_process' => 'Papel Interno',
                'quantity' => 10,
                'unit_cost' => 10,
                'user_id' => $users[array_rand($users)]
            ],
            [
                'name_paper_type_process' => 'Papel Carátula',
                'quantity' => 10,
                'unit_cost' => 10,
                'user_id' => $users[array_rand($users)]
            ],
            [
                'name_paper_type_process' => 'Papel Insertos',
                'quantity' => 10,
                'unit_cost' => 10,
                'user_id' => $users[array_rand($users)]

            ]
        ];

        foreach ($printProcesses as $printProcess) {
            PrintProcess::create($printProcess);
        }
    }
}
