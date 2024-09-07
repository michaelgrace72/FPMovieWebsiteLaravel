<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tmdb_id' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->unique()->word,
            'slug' => $this->faker->slug,
        ];
    }
}
