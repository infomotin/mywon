<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PersonalData;

class PersonalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalData::insert([
            [
                'history_title' => 'History Title',
                'year' => '2020',
                'history' => 'History',
            ],
            [
                'history_title' => 'RR Title',
                'year' => '2021',
                'history' => 'History',
            ],
            [
                'history_title' => 'RP Title',
                'year' => '2022',
                'history' => 'History',
            ],
            [
                'history_title' => 'RX Title',
                'year' => '2023',
                'history' => 'History',
            ],
            [
                'history_title' => 'RJ Title',
                'year' => '2024',
                'history' => 'History',
            ],
            [
                'history_title' => 'RK Title',
                'year' => '2025',
                'history' => 'History',
            ],
        ]);
    }
}
