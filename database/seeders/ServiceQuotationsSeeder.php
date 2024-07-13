<?php

namespace Database\Seeders;

use App\Models\Quotation;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceQuotationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceIds = Service::pluck('id')->toArray();
        $quotationIds = Quotation::pluck('id')->toArray();

        $serviceQuotations = [];

        for ($i = 0; $i < 10; $i++) {
            $serviceQuotations[] = [
                'service_id' => $serviceIds[array_rand($serviceIds)],
                'quotation_id' => $quotationIds[$i % count($quotationIds)],  // Asegura que no se repitan quotation_id
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los registros en la base de datos
        DB::table('service_quotations')->insert($serviceQuotations);
    }
}
