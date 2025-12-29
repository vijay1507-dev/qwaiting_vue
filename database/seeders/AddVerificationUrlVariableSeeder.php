<?php

namespace Database\Seeders;

use App\Models\TemplateVariable;
use Illuminate\Database\Seeder;

class AddVerificationUrlVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TemplateVariable::updateOrCreate(
            ['name' => 'verification_url'],
            [
                'name' => 'verification_url',
                'module' => 'general',
                'description' => 'Email verification link',
                'example_value' => rtrim(config('app.url'), '/').'/signup/verify?id=1&hash=abc123&signature=xyz',
                'is_active' => true,
            ]
        );

        $this->command->info('Verification URL variable seeded successfully!');
    }
}
