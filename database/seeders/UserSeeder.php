<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['Joko', 'superadmin@gmail.com', 'superadmin'],
            ['Susilo', 'admin@gmail.com', 'admin'],
            ['Andi', 'cashier@gmail.com', 'cashier'],
            ['Agung', 'ironer@gmail.com', 'ironer'],
            ['Ajikun', 'ironer2@gmail.com', 'ironer'],
            ['Jaka', 'packer@gmail.com', 'packer'],
        ];

        foreach ($users as [$name, $email, $role]) {
            User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => bcrypt('12345678'),
                    'role' => $role,
                ]
            );
        }
    }
}
