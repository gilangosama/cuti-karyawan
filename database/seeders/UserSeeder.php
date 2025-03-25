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
                'name' => 'HRD',
                'email' => 'hrd@example.com',
                'role' => 'hrd',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Approval 1',
                'email' => 'Approval1@example.com',
                'role' => 'approval',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Approval 2',
                'email' => 'Approval2@example.com',
                'role' => 'approval',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'karyawan 1',
                'email' => 'karyawan1@example.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'karayawan 2',
                'email' => 'karyawan2@example.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        ]);
    }
}
