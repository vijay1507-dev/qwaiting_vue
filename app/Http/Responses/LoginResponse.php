<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = Auth::user();

        // Check permissions in order of sidebar appearance

        // 1. Dashboard
        if ($user->can('dashboard.read')) {
            return redirect('/dashboard');
        }

        // 2. Clients
        if ($user->can('clients.read')) {
            return redirect()->route('clients.index');
        }

        // 3. Marketing
        if ($user->can('marketing.read')) {
            return redirect()->route('marketing.sequences');
        }

        // 4. E-Commerce
        if ($user->can('e-commerce.read')) {
            return redirect()->route('ecommerce.index');
        }

        // 5. Subscription Management
        if ($user->can('subscription_management.read')) {
            return redirect()->route('subscription.index');
        }

        // 6. User Management
        if ($user->can('user_management.read')) {
            return redirect()->route('user-management.employees');
        }

        // Default fallback (if no permissions, or standard user)
        return redirect('/dashboard');
    }
}
