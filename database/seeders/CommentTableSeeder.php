<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory(10)->create();

        // Create a comment on an existing comment
        for ($i=0; $i < 20; $i++) { 
            Comment::factory()->create([
                'commentable_id' => fake()->numberBetween(1, sizeof(Comment::get())),
                'commentable_type' => Comment::class,
            ]);
        }
    }
}
