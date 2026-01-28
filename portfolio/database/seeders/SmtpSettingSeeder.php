<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmtpSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('smtp_settings')->insert([
            'id' => 1,
            'mailer' => 'smtp',
            'host' => 'smtp.gmail.com',
            'port' => '587',
            'username' => 'example@gmail.com',
            'password' => 'password',
            'encryption' => 'tls',
            'from_address' => 'example@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
