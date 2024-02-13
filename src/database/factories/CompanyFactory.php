<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avatar' => fake()->imageUrl(),
            'cover' => fake()->imageUrl(),
            'name' => 'Test Company',
            'email' => fake()->unique()->safeEmail(),
            'tel' => '000-0000',
            'phone' => '1234',
            'address' => fake()->address(),
        ];
    }
}
