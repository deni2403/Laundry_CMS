<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use function Symfony\Component\String\b;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::firstOrCreate(
            ['email' => 'aji@gmail.com'],
            [
                'name' => 'Aji Pamungkas',
                'phone_number' => '085972789853',
                'password' => bcrypt('12345678'),
                'total_point' => 100,
                'registration_date' => now(),
            ]
        );

        Member::firstOrCreate(
            ['email' => 'rosyid@gmail.com'],
            [
                'name' => 'Rosyid',
                'phone_number' => '085972789853',
                'password' => bcrypt('12345678'),
                'total_point' => 100,
                'registration_date' => now(),
            ]
        );
    }
}
