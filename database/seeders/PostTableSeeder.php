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
        $all_posts = Post::get()->slice(1);     // Skip test post
        $all_tags  =  Tag::get()->slice(1);     // Skip test tag

        // Add test ('default') tag and one other
        foreach ($all_posts as $post) {
            $post->tags()->attach(Tag::find(1));
            $post->tags()->attach(fake()->randomElement($all_tags));
            $post->save();
        }
    }
}
