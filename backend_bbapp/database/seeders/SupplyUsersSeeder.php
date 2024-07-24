<?php

namespace Database\Seeders;

use App\Models\supply;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplyIds = supply::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        $supplyUsers = [];

        for ($i = 0; $i < 10; $i++) {
            $supplyUsers[] = [
                'supply_id' => $supplyIds[array_rand($supplyIds)],
                'user_id' => $userIds[array_rand($userIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los registros en la base de datos
        DB::table('supply_users')->insert($supplyUsers);
    }
}
