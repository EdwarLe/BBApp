<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productIds = Product::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        $productUsers = [];

        for ($i = 0; $i < 10; $i++) {
            $productUsers[] = [
                'product_id' => $productIds[array_rand($productIds)],
                'user_id' => $userIds[array_rand($userIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los registros en la base de datos
        DB::table('product_users')->insert($productUsers);
    }
}
