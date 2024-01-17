<?php

namespace Database\Factories;

use App\Models\AcademicDegree;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Theses>
 */
class ThesesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subject = Subject::pluck('id')->toArray();
        return [
            'title' => fake()->word(),
            'author' => fake()->name(),
            'subject_id' => fake()->randomElement($subject),
            'publication_year' => fake()->year(),
            'availability_status' => fake()->numberBetween($min = 1, $max = 3),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
