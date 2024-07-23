<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceIds = Service::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        $serviceUsers = [];

        for ($i = 0; $i < 10; $i++) {
            $serviceUsers[] = [
                'service_id' => $serviceIds[array_rand($serviceIds)],
                'user_id' => $userIds[array_rand($userIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los registros en la base de datos
        DB::table('service_users')->insert($serviceUsers);
    }
}
