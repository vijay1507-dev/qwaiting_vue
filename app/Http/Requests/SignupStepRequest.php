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
            'password.mixed' => 'The password must contain at least one uppercase and one lowercase letter.',
        ];
    }
}
