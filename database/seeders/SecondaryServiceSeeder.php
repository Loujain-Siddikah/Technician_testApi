<?php

namespace Database\Seeders;

use App\Models\SecondaryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecondaryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SecondaryService::create(['name' => 'تركيب مغسلة عادي', 'primary_service_id' => 1]);
        SecondaryService::create(['name' => 'تركيب مغسلة دولاب او رخام', 'primary_service_id' => 1]);
        SecondaryService::create(['name' => 'تركيب او تبديل جرجور لحوض الغسيل', 'primary_service_id' => 1]);
        SecondaryService::create(['name' => 'تركيب او تبديل خلاط حوض الغسيل', 'primary_service_id' => 1]);

        SecondaryService::create(['name' => 'تمديدات داخلية', 'primary_service_id' => 2]);
        SecondaryService::create(['name' => 'تمديدات خارجية', 'primary_service_id' => 2]);
        SecondaryService::create(['name' => 'تصليح اعطال', 'primary_service_id' => 2]);

        SecondaryService::create(['name' => 'ابواب', 'primary_service_id' => 3]);
        SecondaryService::create(['name' => 'طاولات', 'primary_service_id' => 3]);
        SecondaryService::create(['name' => 'مطابخ', 'primary_service_id' => 3]);
        SecondaryService::create(['name' => 'غرف نوم', 'primary_service_id' => 3]);
    }
}
