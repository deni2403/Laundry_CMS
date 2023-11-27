<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = new User();
        $userData->name = 'Joko';
        $userData->email = 'superadmin@gmail.com';
        $userData->password = bcrypt('12345678');
        $userData->role = 'superadmin';
        $userData->save();

        $userData = new User();
        $userData->name = 'Susilo';
        $userData->email = 'admin@gmail.com';
        $userData->password = bcrypt('12345678');
        $userData->role = 'admin';
        $userData->save();

        $userData = new User();
        $userData->name = 'Andi';
        $userData->email = 'cashier@gmail.com';
        $userData->password = bcrypt('12345678');
        $userData->role = 'cashier';
        $userData->save();

        $userData = new User();
        $userData->name = 'Agung';
        $userData->email = 'ironer@gmail.com';
        $userData->password = bcrypt('12345678');
        $userData->role = 'ironer';
        $userData->save();
        
        $userData = new User();
        $userData->name = 'Ajikun';
        $userData->email = 'ironer2@gmail.com';
        $userData->password = bcrypt('12345678');
        $userData->role = 'ironer';
        $userData->save();

        $userData = new User();
        $userData->name = 'Jaka';
        $userData->email = 'packer@gmail.com';
        $userData->password = bcrypt('12345678');
        $userData->role = 'packer';
        $userData->save();

    }
}
