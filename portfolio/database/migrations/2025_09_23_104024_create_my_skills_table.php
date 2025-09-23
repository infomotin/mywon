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
        Schema::create('my_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Skill name e.g. Figma, React
            $table->string('icon')->nullable();  // Path to icon file
            $table->unsignedTinyInteger('level')->default(0); // Percentage 0-100
            $table->integer('order')->default(0); // For ordering in frontend
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_skills');
    }
};
