<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['nullable', 'in:pending,processing,shipped,completed,cancelled'],
            'payment_status' => ['nullable', 'in:pending,paid,failed,refunded'],
            'payment_method' => ['nullable', 'string', 'max:255'],
            'payment_transaction_id' => ['nullable', 'string', 'max:255'],
            'shipped_date' => ['nullable', 'date'],
            'delivered_date' => ['nullable', 'date'],
            'tracking_number' => ['nullable', 'string', 'max:255'],
            'invoice_number' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
