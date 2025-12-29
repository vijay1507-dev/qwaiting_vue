<?php

namespace Database\Seeders;

use App\Models\SystemEmailTemplate;
use Illuminate\Database\Seeder;

class SystemEmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'key' => 'email_verification',
                'name' => 'Email Verification',
                'subject' => 'Verify Your Email Address',
                'content' => '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; background-color: #f5f5f5;">
    <table role="presentation" style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 20px 0; text-align: center;">
                <table role="presentation" style="width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding: 40px 30px; text-align: center;">
                            <h1 style="margin: 0 0 20px 0; color: #1a1a1a; font-size: 24px; font-weight: 600;">Verify Your Email Address</h1>
                            <p style="margin: 0 0 20px 0; color: #666666; font-size: 16px; line-height: 1.5;">Hello {{first_name}},</p>
                            <p style="margin: 0 0 20px 0; color: #666666; font-size: 16px; line-height: 1.5;">Please click the button below to verify your email address.</p>
                            <table role="presentation" style="margin: 30px auto;">
                                <tr>
                                    <td style="background-color: #7C69EF; border-radius: 8px;">
                                        <a href="{{verification_url}}" style="display: inline-block; padding: 14px 28px; color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 600; border-radius: 8px;" target="_self">Verify Email Address</a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin: 30px 0 0 0; color: #666666; font-size: 14px; line-height: 1.5;">If you did not create an account, no further action is required.</p>
                            <p style="margin: 10px 0 0 0; color: #999999; font-size: 12px; line-height: 1.5;">This verification link will expire in 60 minutes.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>',
                'description' => 'Sent when a user needs to verify their email address during signup',
                'is_active' => true,
            ],
            [
                'key' => 'forgot_password',
                'name' => 'Forgot Password',
                'subject' => 'Reset Your Password',
                'content' => '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; background-color: #f5f5f5;">
    <table role="presentation" style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 20px 0; text-align: center;">
                <table role="presentation" style="width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding: 40px 30px; text-align: center;">
                            <h1 style="margin: 0 0 20px 0; color: #1a1a1a; font-size: 24px; font-weight: 600;">Reset Your Password</h1>
                            <p style="margin: 0 0 20px 0; color: #666666; font-size: 16px; line-height: 1.5;">Hello {{first_name}},</p>
                            <p style="margin: 0 0 20px 0; color: #666666; font-size: 16px; line-height: 1.5;">You are receiving this email because we received a password reset request for your account.</p>
                            <table role="presentation" style="margin: 30px auto;">
                                <tr>
                                    <td style="background-color: #7C69EF; border-radius: 8px;">
                                        <a href="{{reset_url}}" style="display: inline-block; padding: 14px 28px; color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 600; border-radius: 8px;" target="_self">Reset Password</a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin: 30px 0 0 0; color: #666666; font-size: 14px; line-height: 1.5;">This password reset link will expire in 60 minutes.</p>
                            <p style="margin: 10px 0 0 0; color: #999999; font-size: 12px; line-height: 1.5;">If you did not request a password reset, no further action is required.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>',
                'description' => 'Sent when a user requests a password reset',
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            SystemEmailTemplate::updateOrCreate(
                ['key' => $template['key']],
                $template
            );
        }
    }
}
