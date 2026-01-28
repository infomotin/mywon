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
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            // Colors
            $table->string('primary_color')->default('#8750f7'); // Default theme purple
            $table->string('secondary_color')->default('#2a1454');
            $table->string('background_color')->default('#0f0715');
            $table->string('text_color')->default('#ffffff');
            
            // Mode
            $table->enum('theme_mode', ['light', 'dark'])->default('dark');
            
            // Section Visibility
            $table->boolean('show_hero')->default(true);
            $table->boolean('show_services')->default(true);
            $table->boolean('show_portfolio')->default(true);
            $table->boolean('show_resume')->default(true); // Education/Experience
            $table->boolean('show_skills')->default(true);
            $table->boolean('show_testimonial')->default(true);
            $table->boolean('show_blog')->default(true);
            $table->boolean('show_contact')->default(true);
            $table->boolean('show_footer')->default(true);
            
            // Customization
            $table->text('custom_css')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
