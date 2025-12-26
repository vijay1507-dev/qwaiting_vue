<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageConfigurationRequest extends FormRequest
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
        return [
            'features' => ['required', 'array'],
            'features.*.feature_id' => ['required', 'integer', 'exists:subscription_features,id'],
            'features.*.limit_type' => ['required', 'in:limited,unlimited,disabled'],
            'features.*.limit_value' => ['nullable', 'integer', 'min:0', 'required_if:features.*.limit_type,limited'],
        ];
    }
}
