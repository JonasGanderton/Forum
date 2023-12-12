<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create each User with a UserAccount and Posts 
        User::factory(9)->has(
            UserAccount::factory()->has(
                Post::factory(3)
            )
        )
        ->create();
    }
}
