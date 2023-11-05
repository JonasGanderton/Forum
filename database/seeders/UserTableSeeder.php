<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAccount;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->has(UserAccount::factory()->has(Post::factory(1)))->create();
    }
}
