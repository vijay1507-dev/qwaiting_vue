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
        // Modify the enum column to include 'days_before_expiry'
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN timing_unit ENUM('immediate', 'minutes', 'hours', 'days', 'weeks', 'days_before_expiry') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to previous enum values
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN timing_unit ENUM('immediate', 'minutes', 'hours', 'days', 'weeks') NOT NULL");
    }
};
