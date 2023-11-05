<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->paragraph($nbSentences = 2, $variableNbSentences = false),
            'user_account_id' => fake()->numberBetween(1, sizeof(UserAccount::get())),

            'commentable_id' => fake()->numberBetween(1, sizeof(Post::get())),
            'commentable_type' => Post::class,

            
            // Once parent comment has been implemented, make dateTime be between then and now.
            // From Faker Docs:
            //dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
            // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
            
            'posted_at' => fake()->dateTimeThisYear(),
        ];
    }
}
