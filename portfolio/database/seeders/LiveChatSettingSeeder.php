<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiveChatSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('live_chat_settings')->insert([
            'id' => 1,
            'whatsapp_number' => '+8801700000000',
            'whatsapp_status' => 1,
            'tawk_to_script' => null,
            'tawk_to_status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
