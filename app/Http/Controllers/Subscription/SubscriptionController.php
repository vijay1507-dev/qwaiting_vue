<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function index()
    {
        return Inertia::render('Subscription/Index');
    }
}

