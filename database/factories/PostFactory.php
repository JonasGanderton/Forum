<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence($nbWords = 5, $variableNbWords = true),
            'content' => fake()->paragraph($nbSentences = 2, $variableNbSentences = false),
            'posted_at' => fake()->dateTimeThisYear(),
        ];
    }
}
