<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreFeatureRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'key' => ['nullable', 'string', 'max:255', 'unique:subscription_features,key'],
            'data_type' => ['required', 'in:Number,Boolean,Text'],
            'is_metered' => ['nullable', 'boolean'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if (! $this->has('key') && $this->has('name')) {
            $this->merge([
                'key' => Str::slug($this->name, '_'),
            ]);
        }

        // Ensure is_metered is always set as boolean (default to false if not provided)
        if (! $this->has('is_metered')) {
            $this->merge([
                'is_metered' => false,
            ]);
        } else {
            $this->merge([
                'is_metered' => filter_var($this->is_metered, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false,
            ]);
        }
    }
}
