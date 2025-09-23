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
        Schema::create('portfolio_popups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolios_id')->constrained('portfolios')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('live_preview_url')->nullable();
            $table->string('category')->nullable();
            $table->string('client')->nullable();
            $table->string('start_date')->nullable();
            $table->string('designer')->nullable();
            $table->string('main_image')->nullable();
            $table->text('project_description')->nullable();
            $table->text('story')->nullable();
            $table->text('approach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_popups');
    }
};
