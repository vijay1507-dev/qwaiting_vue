<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE subscription_coupons MODIFY COLUMN duration_type ENUM('once', 'recurring', 'forever') DEFAULT 'once'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE subscription_coupons MODIFY COLUMN duration_type ENUM('once', 'recurring') DEFAULT 'once'");
    }
};
