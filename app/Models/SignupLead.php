<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\SubscriptionPackage;

class SignupLead extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'country_code',
        'password',
        'temp_password',
        'company_name',
        'domain_name',
        'role',
        'website',
        'usage_preference',
        'industry',
        'footfall',
        'current_solution',
        'signup_step',
        'email_verified_at',
        'email_verification_token',
        'package_id',
        'billing_cycle',
        'stripe_customer_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if email is verified
     */
    public function hasVerifiedEmail(): bool
    {
        return ! is_null($this->email_verified_at);
    }

    /**
     * Mark email as verified
     */
    public function markEmailAsVerified(): bool
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Get the email address that should be used for the notification.
     */
    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }
    public function package()
    {
        return $this->belongsTo(SubscriptionPackage::class, 'package_id');
    }
}
