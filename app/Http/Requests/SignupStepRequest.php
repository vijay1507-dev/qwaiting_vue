<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SignupStepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $step = (int) $this->route('step', 1);

        return match ($step) {
            1 => [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'phone_number' => ['required', 'string', 'max:20'],
                'country_code' => ['required', 'string', 'max:10'],
                'password' => [
                    'required',
                    'string',
                    Password::min(8)
                        ->mixedCase()
                        ->letters(),
                ],
            ],
            2 => [
                'company_name' => ['required', 'string', 'max:255'],
                'domain_name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255', 'in:owner,manager,staff,admin,other'],
                'website' => ['nullable', 'string', 'url', 'max:255'],
            ],
            3 => [
                'usage_preference' => ['required', 'string', 'max:255', 'in:Walk-in,Appointment,Both'],
            ],
            4 => [
                'industry' => ['required', 'string', 'max:255', 'in:Public Sector,Retail,Healthcare,Other'],
            ],
            5 => [
                'footfall' => ['required', 'string', 'max:255', 'in:0-50,51-100,100-200,200-500,500+'],
            ],
            6 => [
                'current_solution' => [
                    'required',
                    'string',
                    'max:255',
                    'in:Don\'t have a system,Receptionist,Pen & Paper,Other Software',
                ],
            ],
            default => [],
        };
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'This email address is already registered.',
            'email.valid_domain' => 'Please use a Gmail account or work email address. Temporary email services are not allowed.',
            'password.mixed' => 'The password must contain at least one uppercase and one lowercase letter.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $step = (int) $this->route('step', 1);
            
            // Only validate email domain for step 1
            if ($step === 1 && $this->has('email')) {
                $email = $this->input('email');
                
                if ($email) {
                    // Extract domain from email
                    $domain = substr(strrchr($email, "@"), 1);
                    $domain = strtolower($domain);
                    
                    // List of blocked temporary email domains
                    $blockedDomains = [
                        'yopmail.com',
                        'yopmail.fr',
                        'tempmail.com',
                        'tempmail.org',
                        'temp-mail.org',
                        'temp-mail.io',
                        'guerrillamail.com',
                        'guerrillamailblock.com',
                        'mailinator.com',
                        '10minutemail.com',
                        'throwaway.email',
                        'mohmal.com',
                        'fakeinbox.com',
                        'getnada.com',
                        'maildrop.cc',
                        'sharklasers.com',
                        'grr.la',
                        'guerrillamail.info',
                        'guerrillamail.biz',
                        'guerrillamail.de',
                        'pokemail.net',
                        'spam4.me',
                        'bccto.me',
                        'chacuo.net',
                        'dispostable.com',
                        'meltmail.com',
                        'mintemail.com',
                        'mytemp.email',
                        'tempail.com',
                        'tempinbox.co.uk',
                        'tempinbox.com',
                        'trashmail.com',
                        'trashmail.net',
                        'trashmail.org',
                        'trashymail.com',
                        'tyldd.com',
                        'emailondeck.com',
                        'fake-mail.net',
                        'fakemailgenerator.com',
                        'mailcatch.com',
                        'mailmoat.com',
                        'mailsac.com',
                        'mintemail.com',
                        'mytrashmail.com',
                        'nada.email',
                        'nada.ltd',
                        'putthisinyourspamdatabase.com',
                        'spamgourmet.com',
                        'spamhole.com',
                        'throwawaymail.com',
                        'tmpmail.org',
                        'tmpmail.net',
                        'tmpmail.com',
                        'tmpinbox.com',
                        'tmpinbox.net',
                        'tmpinbox.org',
                    ];
                    
                    // Check if domain is blocked
                    if (in_array($domain, $blockedDomains)) {
                        $validator->errors()->add('email', 'Temporary email services are not allowed. Please use a Gmail account or work email address.');
                        return;
                    }
                    
                    // Check if it's Gmail (gmail.com or googlemail.com)
                    $isGmail = in_array($domain, ['gmail.com', 'googlemail.com']);
                    
                    // Check if it's a work email (not a common free email provider)
                    $freeEmailProviders = [
                        'yahoo.com',
                        'yahoo.co.uk',
                        'yahoo.fr',
                        'hotmail.com',
                        'hotmail.co.uk',
                        'outlook.com',
                        'live.com',
                        'msn.com',
                        'aol.com',
                        'icloud.com',
                        'me.com',
                        'mac.com',
                        'protonmail.com',
                        'proton.me',
                        'zoho.com',
                        'mail.com',
                        'gmx.com',
                        'gmx.de',
                        'gmx.net',
                        'web.de',
                        't-online.de',
                        'qq.com',
                        '163.com',
                        '126.com',
                        'sina.com',
                        'rediffmail.com',
                        'inbox.com',
                        'yandex.com',
                        'yandex.ru',
                        'mail.ru',
                        'rambler.ru',
                    ];
                    
                    $isWorkEmail = !in_array($domain, $freeEmailProviders) && !$isGmail;
                    
                    // Only allow Gmail or work emails
                    if (!$isGmail && !$isWorkEmail) {
                        $validator->errors()->add('email', 'Please use a Gmail account or work email address. Personal email providers are not allowed.');
                    }
                }
            }
        });
    }
}
