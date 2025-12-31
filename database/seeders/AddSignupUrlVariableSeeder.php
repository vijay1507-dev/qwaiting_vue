<?php

namespace Database\Seeders;

use App\Models\TemplateVariable;
use Illuminate\Database\Seeder;

class AddSignupUrlVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remove old signup_url variable if it exists
        TemplateVariable::where('name', 'signup_url')->delete();

        // Create new incomplete_signup_step_url variable
        TemplateVariable::updateOrCreate(
            ['name' => 'incomplete_signup_step_url'],
            [
                'name' => 'incomplete_signup_step_url',
                'module' => 'general',
                'description' => 'Link to continue signup process',
                'example_value' => rtrim(config('app.url'), '/').'/signup?basic_info&hash=abc123',
                'is_active' => true,
            ]
        );

        $this->command->info('Incomplete signup step URL variable seeded successfully!');
    }
}

