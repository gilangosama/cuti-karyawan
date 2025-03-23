<?php

namespace Database\Seeders;

use App\Models\CutiApproval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cuti_Approval extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CutiApproval::factory()->createMany([
            [
                
            ]
            ]);
    }
}
