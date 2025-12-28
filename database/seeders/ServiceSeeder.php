<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['Cuci Setrika Reguler', 6000, 3],
            ['Cuci Setrika Express', 8000, 1],
            ['Cuci Reguler', 4000, 2],
            ['Cuci Express', 6000, 1],
            ['Setrika Reguler', 4000, 2],
            ['Setrika Express', 6000, 1],
        ];

        foreach ($services as [$name, $price, $day]) {
            Service::firstOrCreate(
                ['service_name' => $name],
                [
                    'service_price' => $price,
                    'service_day' => $day,
                ]
            );
        }
    }
}
