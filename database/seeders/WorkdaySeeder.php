<?php

namespace Database\Seeders;

use App\Models\Workday;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workdays = [];

        // Generar 15 registros para los días 1 al 15 de julio
        for ($i = 1; $i <= 15; $i++) {
            $dateStart = Carbon::create(2024, 7, $i)->startOfDay()->addHours(rand(6, 9));
            $lunchStart = (clone $dateStart)->addHours(rand(4, 6));
            $lunchEnd = (clone $lunchStart)->addHour();
            $dateEnd = (clone $dateStart)->addHours(rand(8, 12));

            $workdays[] = [
                'date_start' => $dateStart,
                'lunch_start' => $lunchStart,
                'lunch_end' => $lunchEnd,
                'date_end' => $dateEnd,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        Workday::insert($workdays);
    }
}
