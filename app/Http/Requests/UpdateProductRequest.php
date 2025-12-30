<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('id');

        return [
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:255', Rule::unique('products', 'sku')->ignore($productId)],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'low_stock_threshold' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:2048'],
            'category_id' => ['nullable', 'exists:product_categories,id'],
            'features' => ['nullable', 'array'],
            'features.*' => ['string'],
            'is_active' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'specifications' => ['nullable', 'array'],
            'specifications.*.spec_key' => ['required_with:specifications.*.spec_value', 'string', 'max:255'],
            'specifications.*.spec_value' => ['required_with:specifications.*.spec_key', 'string', 'max:255'],
        ];
    }
}
