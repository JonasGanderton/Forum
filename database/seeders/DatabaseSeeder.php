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

        
        // UserAccount::factory(10)->has(User::factory())->create();
    
        // User::factory()
        // ->has(UserAccount::factory()
        //     ->create([
        //         'username' => 'Test UserName',
        //     ]))
        // ->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //User::factory(10)->has(UserAccount::factory())->create();
        User::factory(10)->create();

        $this->call(UserAccountsTableSeeder::class);
    }
}
