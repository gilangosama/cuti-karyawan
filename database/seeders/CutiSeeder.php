<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuti;
use App\Models\User;
use Carbon\Carbon;

class CutiSeeder extends Seeder
{
    public function run()
    {
        // Buat user
        $user = User::create([
            'name' => 'Karyawan Test',
            'email' => 'karyawan@test.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'badge_number' => 'KRY001'
        ]);

        // Buat profil untuk user
        $user->profil()->create([
            'position' => 'Staff',
            'department' => 'IT',
            'join_date' => '2020-01-01'
        ]);

        // Buat approval1
        $approval1 = User::create([
            'name' => 'Approval Test 1',
            'email' => 'approval1@test.com',
            'password' => bcrypt('password'),
            'role' => 'approval',
            'badge_number' => 'APV001'
        ]);

        $approval1->profil()->create([
            'position' => 'Supervisor',
            'department' => 'IT',
            'join_date' => '2018-01-01'
        ]);

        $approval2 = User::create([
            'name' => 'Approval Test 2',
            'email' => 'approval2@test.com',
            'password' => bcrypt('password'),
            'role' => 'approval',
            'badge_number' => 'APV002'
        ]);

        $hrd = User::create([
            'name' => 'HRD Test',
            'email' => 'hrd@test.com',
            'password' => bcrypt('password'),
            'role' => 'hrd',
            'badge_number' => 'HRD001'
        ]);

        // Buat data cuti
        $cutiData = [
            [
                'user_id' => $user->id,
                'no_registrasi' => 'REG/2024/001',
                'jenis_cuti' => 'Cuti Tahunan',
                'start_date' => now(),
                'end_date' => now()->addDays(3),
                'total_days' => 3,
                'address' => 'Jl. Contoh No. 123, Samarinda',
                'status' => 'pending',
                'approval1_id' => $approval1->id,
                'approval2_id' => $approval2->id,
                'hrd_id' => $hrd->id,
                'created_at' => now()
            ],
            [
                'user_id' => $user->id,
                'no_registrasi' => 'REG/2024/002',
                'jenis_cuti' => 'Cuti Sakit',
                'start_date' => now()->addDays(5),
                'end_date' => now()->addDays(6),
                'total_days' => 2,
                'address' => 'Jl. Contoh No. 123, Samarinda',
                'status' => 'approved',
                'approval1_id' => $approval1->id,
                'approval2_id' => $approval2->id,
                'hrd_id' => $hrd->id,
                'approval1_status' => 'approved',
                'approval2_status' => 'approved',
                'hrd_status' => 'approved',
                'created_at' => now()->subDays(5)
            ],
            [
                'user_id' => $user->id,
                'no_registrasi' => 'REG/2024/003',
                'jenis_cuti' => 'Cuti Melahirkan',
                'start_date' => '2024-04-01',
                'end_date' => '2024-06-30',
                'total_days' => 90,
                'address' => 'Jl. Contoh No. 123, Samarinda',
                'status' => 'rejected',
                'approval1_id' => $approval1->id,
                'approval2_id' => $approval2->id,
                'hrd_id' => $hrd->id,
                'approval1_status' => 'rejected',
                'created_at' => '2024-03-10'
            ]
        ];

        foreach ($cutiData as $data) {
            Cuti::create($data);
        }
    }
} 