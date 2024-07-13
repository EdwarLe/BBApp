<?php

namespace Database\Seeders;

use App\Models\Miscellaneous;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiscellaneousUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $miscellaneousIds = Miscellaneous::pluck('id')->toArray();

        $miscellaneousUsers = [];

        for ($i = 0; $i < 10; $i++) {
            $miscellaneousUsers[] = [
                'user_id' => $userIds[array_rand($userIds)],
                'miscellaneous_id' => $miscellaneousIds[array_rand($miscellaneousIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los registros en la base de datos
        DB::table('miscellaneous_users')->insert($miscellaneousUsers);
    }
}
