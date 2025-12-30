<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['nullable', 'string', 'max:255'],
            'shipping_address' => ['required', 'string'],
            'billing_address' => ['nullable', 'string'],
            'payment_method' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['nullable', 'required_without:items.*.bundle_id', 'exists:products,id'],
            'items.*.bundle_id' => ['nullable', 'required_without:items.*.product_id', 'exists:bundles,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }
}
