<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use App\Models\Workday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWorkdaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $employeeIds = Employee::pluck('id')->toArray();
        $workdayIds = Workday::pluck('id')->toArray();


        $userWorkdays = [];

        for ($i = 0; $i < 15; $i++) {
            $userWorkdays[] = [
                'user_id' => $userIds[array_rand($userIds)],
                'employee_id' => $employeeIds[array_rand($employeeIds)],
                'workday_id' => $workdayIds[$i % count($workdayIds)],  // Asegura que no se repitan workday_id
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los registros en la base de datos
        DB::table('user_workdays')->insert($userWorkdays);
    }
}
