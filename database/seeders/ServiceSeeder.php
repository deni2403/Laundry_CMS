<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceData = new Service();
        $serviceData->service_name = "Cuci Setrika Reguler";
        $serviceData->service_price = "6000";
        $serviceData->service_day = "3";
        $serviceData->created_at = now();
        $serviceData->updated_at = now();
        $serviceData->save();

        $serviceData = new Service();
        $serviceData->service_name = "Cuci Setrika Express";
        $serviceData->service_price = "8000";
        $serviceData->service_day = "1";
        $serviceData->created_at = now();
        $serviceData->updated_at = now();
        $serviceData->save();

        $serviceData = new Service();
        $serviceData->service_name = "Cuci Reguler";
        $serviceData->service_price = "4000";
        $serviceData->service_day = "2";
        $serviceData->created_at = now();
        $serviceData->updated_at = now();
        $serviceData->save();

        $serviceData = new Service();
        $serviceData->service_name = "Cuci Express";
        $serviceData->service_price = "6000";
        $serviceData->service_day = "1";
        $serviceData->created_at = now();
        $serviceData->updated_at = now();
        $serviceData->save();

        $serviceData = new Service();
        $serviceData->service_name = "Setrika Reguler";
        $serviceData->service_price = "4000";
        $serviceData->service_day = "2";
        $serviceData->created_at = now();
        $serviceData->updated_at = now();
        $serviceData->save();

        $serviceData = new Service();
        $serviceData->service_name = "Setrika Express";
        $serviceData->service_price = "6000";
        $serviceData->service_day = "1";
        $serviceData->created_at = now();
        $serviceData->updated_at = now();
        $serviceData->save();

        $serviceData = new Service();
        $serviceData->service_name = "Cuci Karpet";
        $serviceData->service_price = "6000";
        $serviceData->service_day = "7";
        $serviceData->created_at = now();
        $serviceData->updated_at = now();
        $serviceData->save();

    }
}
