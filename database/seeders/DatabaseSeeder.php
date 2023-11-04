<?php

// namespace App\Models;
namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAccount;
use App\Models\Post;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test data
        // (Called here so IDs are all 1)
        User::factory()->create([
            'name' => "Test User",
            'email' => "user@test.com",
        ]);

        UserAccount::factory()->create([
            'username' => 'TestAccount123',
            'user_id' => 1,
        ]);

        Post::factory()->create([
            'title' => 'Hello World!',
            'content' => 'This is my first post!',
            'posted_at' => '2023-01-01 00:00:00',
            'user_account_id' => 1,
        ]);

        Comment::factory()->create([
            'content' => 'This is my first comment!',
            'posted_at' => '2023-01-01 00:00:01',
            'user_account_id' => 1,
        ]);
 
        $this->call(UserTableSeeder::class);

        // $this->call(UserAccountTableSeeder::class);

        // $this->call(PostTableSeeder::class);

        $this->call(CommentTableSeeder::class);
    }
}
