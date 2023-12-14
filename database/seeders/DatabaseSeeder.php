<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserAccount;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create data with IDs of 1
        $this->createTestData();

        // Creates Users, each with a UserAccount and Posts
        $this->call(UserTableSeeder::class);

        // Create Tags
        $this->call(TagTableSeeder::class);

        // Attaches Tags to Posts (populates post_tag table) 
        $this->call(PostTableSeeder::class);

        $this->call(CommentTableSeeder::class);
    }

    /**
     * Seed the database with test data.
     */
    private function createTestData(): void
    {
        User::factory()->create([
            'email' => "dev@forum.com",
        ]);

        UserAccount::factory()->create([
            'username' => 'forumDev',
            'about' => 'Hello World!',
            'user_id' => 1,
        ]);

        Tag::factory()->create([
            'name' => 'default',
        ]);

        Post::factory()->hasAttached(Tag::find(1))->create([
            'title' => 'Hello World!',
            'content' => 'Welcome to the new forum!',
            'posted_at' => '2023-01-01 00:00:00',
            'user_account_id' => 1,
            'pinned_position' => -2,
        ]);

        Post::factory()->hasAttached(Tag::find(1))->create([
            'title' => 'Forum rules',
            'content' => "1. Be nice.\n2. Use tags appropriately.\n3. Don't spam.",
            'posted_at' => '2023-01-01 00:05:00',
            'user_account_id' => 1,
            'pinned_position' => -1,
        ]);

        Comment::factory()->create([
            'content' => 'This is my first comment!',
            'posted_at' => '2023-01-01 00:00:01',
            'user_account_id' => 1,
            'commentable_id' => 1,
            'commentable_type' => Post::class,
        ]);
    }
}
