<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
        $packageId = $this->route('package');

        return [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:255', 'unique:subscription_packages,code,' . $packageId],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
            'trial_days' => ['nullable', 'integer', 'min:0'],
            'credit_card_required' => ['nullable', 'boolean'],
            'monthly_enabled' => ['nullable', 'boolean'],
            'annual_enabled' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'display_sequence' => ['nullable', 'integer', 'min:0'],
            'features_display_limit' => ['nullable', 'integer', 'min:0'],
            'is_most_popular' => ['nullable', 'boolean'],
            'is_enquiry' => ['nullable', 'boolean'],
        ];
    }
}
