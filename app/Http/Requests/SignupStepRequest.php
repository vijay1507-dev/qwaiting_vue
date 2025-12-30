<?php

namespace App\Http\Requests;

use App\Models\SignupLead;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
                    Rule::unique('signup_leads', 'email')->ignore(
                        Session::get('signup_lead_id'),
                        'id'
                    ),
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
                'domain_name' => [
                    'required',
                    'string',
                    'max:255',
                    function ($attribute, $value, $fail) {
                        // Check in signup_leads table
                        $leadId = Session::get('signup_lead_id', 0);
                        $existsInLeads = SignupLead::where('domain_name', $value)
                            ->where('id', '!=', $leadId)
                            ->exists();

                        if ($existsInLeads) {
                            $fail('This domain is already taken. Please choose a different domain name.');

                            return;
                        }

                        // Check in external database
                        // Domains are stored with suffixes (.localhost for local, .qwaiting.com for production)
                        // Check for both formats to cover all environments
                        try {
                            $domainLocalhost = $value.'.localhost';
                            $domainQwaiting = $value.'.qwaiting.com';

                            $existsInExternal = DB::connection('mysql_external')
                                ->table('domains')
                                ->where(function ($query) use ($value, $domainLocalhost, $domainQwaiting) {
                                    $query->where('domain', $value)
                                        ->orWhere('domain', $domainLocalhost)
                                        ->orWhere('domain', $domainQwaiting);
                                })
                                ->exists();

                            \Illuminate\Support\Facades\Log::info('FormRequest domain validation check', [
                                'domain' => $value,
                                'domain_localhost' => $domainLocalhost,
                                'domain_qwaiting' => $domainQwaiting,
                                'exists_in_external' => $existsInExternal,
                                'lead_id' => $leadId,
                            ]);

                            if ($existsInExternal) {
                                $fail('This domain is already taken. Please choose a different domain name.');

                                return;
                            }
                        } catch (\Exception $e) {
                            // If external DB check fails, fail validation to ensure domain availability is verified
                            // This prevents invalid domains from proceeding
                            \Illuminate\Support\Facades\Log::error('Domain validation check in external database failed - failing validation', [
                                'domain' => $value,
                                'error' => $e->getMessage(),
                                'trace' => $e->getTraceAsString(),
                            ]);

                            $fail('Unable to verify domain availability. Please try again.');
                        }
                    },
                ],
                'role' => ['required', 'string', 'max:255', 'in:owner,manager,staff,admin,other'],
                'website' => ['nullable', 'string', 'max:255'],
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
            'domain_name.required' => 'The domain name field is required.',
            'email.valid_domain' => 'Please use a Gmail account or work email address. Temporary email services are not allowed.',
            'password.mixed' => 'The password must contain at least one uppercase and one lowercase letter.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $step = (int) $this->route('step', 1);

        // Normalize website URL for step 2
        if ($step === 2 && $this->has('website') && $this->input('website')) {
            $website = trim($this->input('website'));

            // Only prepend https:// if it doesn't already have a protocol
            if ($website && ! preg_match('/^https?:\/\//i', $website)) {
                $this->merge([
                    'website' => 'https://'.$website,
                ]);
            }
        }
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $step = (int) $this->route('step', 1);

            // Email validation for step 1
            if ($step === 1 && $this->has('email')) {
                $email = $this->input('email');

                if ($email) {
                    // Check email in external database
                    try {
                        $existsInExternal = DB::connection('mysql_external')
                            ->table('users')
                            ->where('email', $email)
                            ->whereNull('deleted_at')
                            ->exists();

                        if ($existsInExternal) {
                            $validator->errors()->add('email', 'This email address is already registered.');
                        }
                    } catch (\Exception $e) {
                        // Log error but don't block validation
                        \Illuminate\Support\Facades\Log::error('Email validation check in external database failed', [
                            'email' => $email,
                            'error' => $e->getMessage(),
                        ]);
                    }

                    // Extract domain from email
                    $domain = substr(strrchr($email, '@'), 1);
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

                    $isWorkEmail = ! in_array($domain, $freeEmailProviders) && ! $isGmail;

                    // Only allow Gmail or work emails
                    if (! $isGmail && ! $isWorkEmail) {
                        $validator->errors()->add('email', 'Please use a Gmail account or work email address. Personal email providers are not allowed.');
                    }
                }
            }
        });
    }
}
