<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'id' => 1,
            'website_name' => 'Mustapha Portfolio',
            'meta_title' => 'Mustapha - Personal Portfolio',
            'meta_description' => 'Personal Portfolio Website',
            'meta_keywords' => 'portfolio, developer, laravel',
            'logo' => null,
            'favicon' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
