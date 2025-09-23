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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Job Title e.g. Lead Developer
            $table->string('company');            // Company / Institute name
            $table->string('period')->nullable(); // Display period e.g. 2022 - Present
            $table->date('start_date')->nullable(); // Optional structured start date
            $table->date('end_date')->nullable();   // Optional structured end date
            $table->integer('order')->default(0);   // For custom sorting in UI
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
