<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
        $couponId = $this->route('coupon');

        return [
            'code' => ['required', 'string', 'max:255', 'unique:subscription_coupons,code,'.$couponId],
            'discount_type' => ['required', 'in:percentage,fixed'],
            'discount_value' => ['required', 'numeric', 'min:0'],
            'currency' => ['required_if:discount_type,fixed', 'nullable', 'string', 'size:3'],
            'duration_type' => ['required', 'in:once,recurring'],
            'number_of_months' => ['nullable', 'integer', 'min:1', 'required_if:duration_type,recurring'],
            'usage_limit' => ['nullable', 'integer', 'min:0'],
            'valid_from' => ['required', 'date'],
            'valid_until' => ['required', 'date', 'after_or_equal:valid_from'],
            'status' => ['required', 'in:active,inactive,expired'],
            'applicable_packages' => ['nullable', 'in:all,specific'],
            'package_ids' => ['nullable', 'array', 'required_if:applicable_packages,specific'],
            'package_ids.*' => ['integer', 'exists:subscription_packages,id'],
        ];
    }
}
