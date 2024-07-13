<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job' => fake()->sentence(1),
            'first_name' => fake()->name(),
            'surname' => fake()->lastName(),
            'id_type' => fake()->sentence(1),
            'id_number' => fake()->sentence(1),
            'salary' => fake()->randomElement([5000.0, 15000.0])
        ];
    }
}
