<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MemberSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);

        Event::factory(10)->create();
    }
}
