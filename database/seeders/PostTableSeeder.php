<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $post = new Post();
        // $post->title = "Hello World!";
        // $post->content = "This is my first post!";
        // $post->user_account_id = 1;
        // $post->posted_at = "2023-01-01 00:00:00";
        // $post->save();

        $all_posts = Post::get()->slice(1); // Skip first post
        $all_tags = Tag::get()->slice(1); // Skip first tag

        foreach ($all_posts as $post) {
            $post->tags()->attach(Tag::find(1)); // Add default tag
            $post->tags()->attach(fake()->randomElement($all_tags)); // Add random other tag
            $post->save();
        }
    }
}
