<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'role' => 'hrd',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test User 2',
                'email' => 'user2@example.com',
                'role' => 'approval',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test User 3',
                'email' => 'user3@example.com',
                'role' => 'approval',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test User 4',
                'email' => 'user@example.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test User 5',
                'email' => 'user5@example.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        ]);
    }
}
