<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Edwar',
            'surname' => 'León',
            'email' => 'edwar@example.com',
            'password' => Hash::make('12345678'),
            'role' => 1
        ]);

        User::create([
            'name' => 'Alexa',
            'surname' => 'Bautista',
            'email' => 'alexa@example.com',
            'password' => Hash::make('12345678'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Nancy',
            'surname' => 'Mana',
            'email' => 'nancy@example.com',
            'password' => Hash::make('12345678'),
            'role' => 1
        ]);
    }
}
