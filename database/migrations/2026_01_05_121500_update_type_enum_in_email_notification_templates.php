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
        // Update any types that are NOT in the allowed list to a default safe value ('welcome')
        // This prevents "Data truncated" errors during the ALTER TABLE
        $allowedTypes = [
            'welcome',
            'feature_highlight',
            'social_proof',
            'trial_reminder',
            'sales_outreach',
            'offer',
            'registeration_complete',
            'signup_nudge',
            'upsell',
            'renewal_reminder',
            'feature_update',
            'feedback_request',
            'loyalty_reward'
        ];

        // We need to use raw SQL for the update because we can't easily rely on Eloquent 
        // if the model definition conflicts with the current schema state, 
        // but raw update is safer here anyway.
        // Note: We check against the NEW list of allowed types. 
        // Any existing type NOT in this list will be converted to 'welcome'.
        DB::table('email_notification_templates')
            ->whereNotIn('type', $allowedTypes)
            ->update(['type' => 'welcome']);

        // Add 'registeration_complete' to the enum
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN type ENUM('welcome', 'feature_highlight', 'social_proof', 'trial_reminder', 'sales_outreach', 'offer', 'registeration_complete', 'signup_nudge', 'upsell', 'renewal_reminder', 'feature_update', 'feedback_request', 'loyalty_reward') DEFAULT 'welcome'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to original enum values (excluding 'registeration_complete')
        DB::statement("ALTER TABLE email_notification_templates MODIFY COLUMN type ENUM('welcome', 'feature_highlight', 'social_proof', 'trial_reminder', 'sales_outreach', 'offer', 'signup_nudge', 'upsell', 'renewal_reminder', 'feature_update', 'feedback_request', 'loyalty_reward') DEFAULT 'welcome'");
    }
};
