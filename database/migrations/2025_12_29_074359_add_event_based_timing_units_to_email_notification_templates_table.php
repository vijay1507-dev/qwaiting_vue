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
        // Add event-based timing units: on_signup, on_verification, if_not_verified, after_verification
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN timing_unit ENUM('immediate', 'minutes', 'hours', 'days', 'weeks', 'days_before_expiry', 'on_expired', 'on_signup', 'on_verification', 'if_not_verified', 'after_verification') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove event-based timing units
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN timing_unit ENUM('immediate', 'minutes', 'hours', 'days', 'weeks', 'days_before_expiry', 'on_expired') NOT NULL");
    }
};
