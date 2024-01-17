<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodicals>
 */
class PeriodicalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'accession_number' => fake()->bothify('?#####'),
            'title' => fake()->word(),
            'volume_number' => fake()->numberBetween($min=0, $max=999),
            'issue_number' => fake()->bothify('#?'),
            'period_covered' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'availability_status' => fake()->numberBetween($min = 1, $max = 3),
            'created_at' => now(),
            'updated_at' => now()
        ];
        
    }
}
