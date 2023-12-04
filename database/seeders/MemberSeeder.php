<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use function Symfony\Component\String\b;

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
        $memberData->phone_number = '085972789853';
        $memberData->password = bcrypt('12345678');
        $memberData->total_point = 100;
        $memberData->registration_date = now();
        $memberData->created_at = now();
        $memberData->updated_at = now();
        $memberData->save();

        $memberData = new Member();
        $memberData->name = 'Rosyid';
        $memberData->email = 'rosyid@gmail.com';
        $memberData->phone_number = '085972789853';
        $memberData->password = bcrypt('12345678');
        $memberData->total_point = 100;
        $memberData->registration_date = now();
        $memberData->created_at = now();
        $memberData->updated_at = now();
        $memberData->save();
    }
}
