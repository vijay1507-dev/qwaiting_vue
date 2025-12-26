<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
        \Illuminate\Support\Facades\Log::info('StoreCouponRequest validation rules', [
            'request_data' => $this->all(),
            'applicable_packages' => $this->applicable_packages,
            'package_ids' => $this->package_ids,
            'package_ids_type' => gettype($this->package_ids),
        ]);

        return [
            'code' => ['required', 'string', 'max:255', 'unique:subscription_coupons,code'],
            'discount_type' => ['required', 'in:percentage,fixed'],
            'discount_value' => ['required', 'numeric', 'min:0'],
            'currency' => ['required_if:discount_type,fixed', 'nullable', 'string', 'size:3'],
            'duration_type' => ['required', 'in:once,recurring,forever'],
            'number_of_months' => ['nullable', 'integer', 'min:1', 'required_if:duration_type,recurring'],
            'usage_limit' => ['nullable', 'integer', 'min:0'],
            'valid_from' => ['required', 'date'],
            'valid_until' => ['required', 'date', 'after_or_equal:valid_from'],
            'status' => ['required', 'in:active,inactive,expired'],
            'applicable_packages' => ['nullable', 'in:all,specific'],
            'package_ids' => [
                'nullable',
                'array',
                'required_if:applicable_packages,specific',
                'min:1',
            ],
            'package_ids.*' => ['required', 'integer', 'exists:subscription_packages,id'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'package_ids.required_if' => 'Please select at least one package when "Specific Packages" is selected.',
            'package_ids.min' => 'Please select at least one package when "Specific Packages" is selected.',
            'package_ids.*.exists' => 'One or more selected packages do not exist.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void
    {
        \Illuminate\Support\Facades\Log::error('StoreCouponRequest validation failed', [
            'errors' => $validator->errors()->all(),
            'errors_by_field' => $validator->errors()->toArray(),
            'request_data' => $this->all(),
            'applicable_packages' => $this->applicable_packages,
            'package_ids' => $this->package_ids,
        ]);

        parent::failedValidation($validator);
    }
}
