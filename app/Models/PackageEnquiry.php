<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageEnquiry extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'mobile_number',
        'company_name',
        'current_package',
        'customer_id',
        'interested_package',
        'expected_start_date',
        'num_users_branches',
        'billing_cycle',
        'features_required',
        'custom_notes',
        'contact_method',
        'best_time_to_contact',
        'consent',
        'status',
    ];

    protected $casts = [
        'features_required' => 'array',
        'expected_start_date' => 'date',
        'consent' => 'boolean',
    ];
}
