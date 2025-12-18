<?php

namespace Database\Seeders;

use App\Models\TemplateVariable;
use Illuminate\Database\Seeder;

class TemplateVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variables = [
            // General variables
            ['name' => 'first_name', 'module' => 'general', 'description' => 'User first name', 'example_value' => 'John'],
            ['name' => 'last_name', 'module' => 'general', 'description' => 'User last name', 'example_value' => 'Doe'],
            ['name' => 'full_name', 'module' => 'general', 'description' => 'User full name', 'example_value' => 'John Doe'],
            ['name' => 'email', 'module' => 'general', 'description' => 'User email address', 'example_value' => 'john@example.com'],
            ['name' => 'company_name', 'module' => 'general', 'description' => 'Company name', 'example_value' => 'Acme Corp'],
            ['name' => 'dashboard_url', 'module' => 'general', 'description' => 'Link to dashboard', 'example_value' => 'https://app.qwaiting.com/dashboard'],
            ['name' => 'unsubscribe_url', 'module' => 'general', 'description' => 'Unsubscribe link', 'example_value' => 'https://app.qwaiting.com/unsubscribe'],
            ['name' => 'preferences_url', 'module' => 'general', 'description' => 'Email preferences link', 'example_value' => 'https://app.qwaiting.com/preferences'],

            // Leads module
            ['name' => 'lead_name', 'module' => 'leads', 'description' => 'Lead name', 'example_value' => 'Jane Smith'],
            ['name' => 'lead_email', 'module' => 'leads', 'description' => 'Lead email', 'example_value' => 'jane@example.com'],
            ['name' => 'lead_phone', 'module' => 'leads', 'description' => 'Lead phone number', 'example_value' => '+1234567890'],
            ['name' => 'lead_status', 'module' => 'leads', 'description' => 'Lead status', 'example_value' => 'New'],
            ['name' => 'lead_source', 'module' => 'leads', 'description' => 'Lead source', 'example_value' => 'Website'],

            // Quotes module
            ['name' => 'quote_number', 'module' => 'quotes', 'description' => 'Quote number', 'example_value' => 'QT-2025-001'],
            ['name' => 'quote_amount', 'module' => 'quotes', 'description' => 'Quote total amount', 'example_value' => '$1,200.00'],
            ['name' => 'quote_date', 'module' => 'quotes', 'description' => 'Quote date', 'example_value' => '2025-03-21'],
            ['name' => 'quote_expiry_date', 'module' => 'quotes', 'description' => 'Quote expiry date', 'example_value' => '2025-04-21'],
            ['name' => 'quote_url', 'module' => 'quotes', 'description' => 'Link to view quote', 'example_value' => 'https://app.qwaiting.com/quotes/1'],

            // Marketing module
            ['name' => 'campaign_name', 'module' => 'marketing', 'description' => 'Campaign name', 'example_value' => 'Spring Sale 2025'],
            ['name' => 'trial_end_date', 'module' => 'marketing', 'description' => 'Trial end date', 'example_value' => '2025-04-15'],
            ['name' => 'subscription_expiry_date', 'module' => 'marketing', 'description' => 'Subscription expiry date', 'example_value' => '2025-12-31'],
            ['name' => 'days_until_expiry', 'module' => 'marketing', 'description' => 'Days until expiry', 'example_value' => '7'],
        ];

        foreach ($variables as $variable) {
            TemplateVariable::updateOrCreate(
                ['name' => $variable['name']],
                $variable
            );
        }
    }
}
