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
        Schema::table('sequences', function (Blueprint $table) {
            $table->enum('target_user_type', [
                'trial_users',
                'all_users',
                'paid_users',
                'signup_users',
                'incomplete_signups',
            ])->default('trial_users')->after('status');

            $table->integer('signup_users_days_window')->nullable()->after('target_user_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sequences', function (Blueprint $table) {
            $table->dropColumn(['target_user_type', 'signup_users_days_window']);
        });
    }
};
