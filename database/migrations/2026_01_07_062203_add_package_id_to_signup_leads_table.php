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
        Schema::table('signup_leads', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id')->nullable()->after('signup_step');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('signup_leads', function (Blueprint $table) {
            //
        });
    }
};
