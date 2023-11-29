<?php

namespace Database\Seeders;

use App\Models\PrimaryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrimaryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrimaryService::create(['name' => 'مغاسل']);
        PrimaryService::create(['name' => 'كهرباء']);
        PrimaryService::create(['name' => 'نجارة']);
    }
}
