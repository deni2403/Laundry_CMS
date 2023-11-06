<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberData = new Member();
        $memberData->name = 'Aji Pamungkas';
        $memberData->email = 'aji@gmail.com';
        $memberData->phone_number = '6281234567890';
        $memberData->total_point = 100;
        $memberData->registration_date = now();
        $memberData->created_at = now();
        $memberData->updated_at = now();
        $memberData->save();
    }
}
