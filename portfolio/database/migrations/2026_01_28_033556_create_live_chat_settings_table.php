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
        Schema::create('live_chat_settings', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp_number')->nullable();
            $table->boolean('whatsapp_status')->default(0);
            $table->text('tawk_to_script')->nullable();
            $table->boolean('tawk_to_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_chat_settings');
    }
};
