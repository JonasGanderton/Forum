<?php

// namespace App\Models;
namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAccount;
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

        $this->call(UserTableSeeder::class);

        // $this->call(UserAccountTableSeeder::class);
    }
}
