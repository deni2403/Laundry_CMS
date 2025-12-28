<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Data wajib production
        $this->call([
            MemberSeeder::class,
            UserSeeder::class,
            ServiceSeeder::class,
        ]);

        // Data dummy hanya untuk local / staging
        if (!App::environment('production')) {
            Event::factory(10)->create();
        }
    }
}
