<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSequenceRequest extends FormRequest
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
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,active,paused'],
            'target_user_type' => ['required', 'in:trial_users,all_users,paid_users,incomplete_signups'],
            'signup_users_days_window' => ['nullable'],
            'emails' => ['required', 'array', 'min:1'],
            'emails.*.sequence_number' => ['required', 'integer', 'min:1'],
            'emails.*.timing_value' => ['required', 'integer', 'min:0'],
            'emails.*.timing_unit' => ['required', 'in:immediate,minutes,hours,days,weeks,days_before_expiry,on_expired,on_signup,on_verification,if_not_verified,after_verification'],
            'emails.*.subject' => ['required', 'string', 'max:255'],
            'emails.*.type' => ['required', 'in:welcome,feature_highlight,social_proof,trial_reminder,sales_outreach,offer,completion_reminder,signup_nudge,upsell,renewal_reminder,feature_update,feedback_request,loyalty_reward'],
            'emails.*.content' => ['nullable', 'string'],
            'emails.*.status' => ['required', 'in:active,inactive'],
        ];
    }
}
