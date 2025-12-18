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
        // Modify the enum column to include 'immediate'
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN timing_unit ENUM('immediate', 'minutes', 'hours', 'days', 'weeks') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN timing_unit ENUM('minutes', 'hours', 'days', 'weeks') NOT NULL");
    }
};
