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
        // Modify the enum type to include new email types
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN type ENUM('welcome', 'feature_highlight', 'social_proof', 'trial_reminder', 'sales_outreach', 'offer', 'completion_reminder', 'signup_nudge', 'upsell', 'renewal_reminder', 'feature_update', 'feedback_request', 'loyalty_reward') DEFAULT 'welcome'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to original enum values
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN type ENUM('welcome', 'feature_highlight', 'social_proof', 'trial_reminder', 'sales_outreach', 'offer') DEFAULT 'welcome'");
    }
};
