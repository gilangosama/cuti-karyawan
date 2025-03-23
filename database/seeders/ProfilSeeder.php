<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profil::insert([
            [
                'user_id' => 1,
                'no_badge' => '123456',
                'section' => 'IT',
                'position' => 'PERSONEL',
                'join_date' => '2021-01-01',
                'jenis' => 'shift',
                'kouta' => 12,
            ],
            [
                'user_id' => 2,
                'no_badge' => '123457',
                'section' => 'IT',
                'position' => 'Programmer',
                'join_date' => '2021-01-01',
                'jenis' => 'shift',
                'kouta' => 12,
            ],
            [
                'user_id' => 3,
                'no_badge' => '123458',
                'section' => 'IT',
                'position' => 'Jaringan',
                'join_date' => '2021-01-01',
                'jenis' => 'shift',
                'kouta' => 12,
            ],
            [
                'user_id' => 4,
                'no_badge' => '123459',
                'section' => 'IT',
                'position' => 'Staff IT',
                'join_date' => '2021-01-01',
                'jenis' => 'shift',
                'kouta' => 12,
            ],
            [
                'user_id' => 5,
                'no_badge' => '123460',
                'section' => 'IT',
                'position' => 'Staff IT',
                'join_date' => '2021-01-01',
                'jenis' => 'shift',
                'kouta' => 12,
            ]
        ]);
    }
}
