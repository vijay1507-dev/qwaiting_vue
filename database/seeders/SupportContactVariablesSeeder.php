<?php

namespace Database\Seeders;

use App\Models\TemplateVariable;
use Illuminate\Database\Seeder;

class SupportContactVariablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variables = [
            [
                'name' => 'support_email',
                'module' => 'general',
                'description' => 'Support email address',
                'example_value' => config('mail.support_email', 'support@qwaiting.com'),
                'is_active' => true,
            ],
            [
                'name' => 'website_url',
                'module' => 'general',
                'description' => 'Website URL',
                'example_value' => config('mail.website_url', 'https://www.qwaiting.com'),
                'is_active' => true,
            ],
        ];

        foreach ($variables as $variable) {
            TemplateVariable::updateOrCreate(
                ['name' => $variable['name']],
                $variable
            );
        }

        $this->command->info('Support contact variables seeded successfully!');
    }
}
