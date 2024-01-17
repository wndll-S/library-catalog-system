<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genre = Genre::pluck('id')->toArray();
        return [
            'title'=>fake()->word(),
            'author' => fake()->name(),
            'year_published' => fake()->year($max = 'now'),
            'call_number' => fake()->bothify('?###'),
            'availability_status' =>fake()->numberBetween($min = 1, $max = 3),
            'genre_id' => fake()->randomElement($genre),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
