<?php

namespace Database\Seeders;

use App\Models\Quotation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuotationUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $quotationIds = Quotation::pluck('id')->toArray();

        $quotationUsers = [];

        for ($i = 0; $i < 10; $i++) {
            $quotationUsers[] = [
                'user_id' => $userIds[array_rand($userIds)],
                'quotation_id' => $quotationIds[$i % count($quotationIds)],  // Asegura que no se repitan quotation_id
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los registros en la base de datos
        DB::table('quotation_users')->insert($quotationUsers);
    }
}
