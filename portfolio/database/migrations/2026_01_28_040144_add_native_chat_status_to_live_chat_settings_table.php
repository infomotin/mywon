<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('live_chat_settings', function (Blueprint $table) {
            $table->boolean('native_chat_status')->default(0)->after('tawk_to_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('live_chat_settings', function (Blueprint $table) {
            $table->dropColumn('native_chat_status');
        });
    }
};
