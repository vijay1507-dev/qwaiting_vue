<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SignupLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'company_name',
        'domain_name',
        'role',
        'website',
        'usage_preference',
        'industry',
        'footfall',
        'current_solution',
        'signup_step',
    ];
}
