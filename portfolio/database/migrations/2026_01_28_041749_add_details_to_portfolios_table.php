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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->longText('long_description')->nullable()->after('description');
            $table->string('client')->nullable()->after('long_description');
            $table->string('project_date')->nullable()->after('client');
            $table->string('technologies')->nullable()->after('project_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['long_description', 'client', 'project_date', 'technologies']);
        });
    }
};
