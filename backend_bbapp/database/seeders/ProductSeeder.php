<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        $products = [
            [
                'product_name' => 'Calendario',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Cuaderno',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Agenda',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Libro',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Cartilla',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Guía Escolar',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Revista',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Folleto',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Libreta',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
            [
                'product_name' => 'Minuta',
                'quantity' => '100',
                'height' => '21',
                'width' => '22',
                'page_quantity' => '100',
                'print_type' => '1/2 pliego',
                'user_id' => $userIds[array_rand($userIds)]
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
