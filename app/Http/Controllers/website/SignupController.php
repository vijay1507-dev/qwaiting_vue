<?php

namespace App\Http\Controllers\website;

use App\Models\User;
use App\Models\SignupLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    public function index()
    {
        return view('website.auth.signup');
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
            ],
        ], [
            'password.regex' => 'The password must contain at least one uppercase and one lowercase letter.',
        ]);

        $lead = SignupLead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->country_code . ' ' . $request->phone_number,
            'password' => Hash::make($request->password),
            'signup_step' => 1,
        ]);

        Session::put('signup_lead_id', $lead->id);

        return response()->json(['success' => true, 'next_step' => 2]);
    }

    public function storeStep2(Request $request)
    {
        $leadId = Session::get('signup_lead_id');
        if (!$leadId)
            return response()->json(['success' => false, 'message' => 'Session expired'], 403);

        $request->validate([
            'company_name' => 'required|string|max:255',
            'domain_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'website' => 'required|nullable|string|max:255',
        ]);

        $lead = SignupLead::find($leadId);
        $domain = str_replace(' ', '-', strtolower($request->domain_name));
        if (!str_ends_with($domain, '.qwaiting.com')) {
            $domain .= '.qwaiting.com';
        }

        $lead->update([
            'company_name' => $request->company_name,
            'domain_name' => $domain,
            'role' => $request->role,
            'website' => $request->website,
            'signup_step' => 2,
        ]);

        return response()->json(['success' => true, 'next_step' => 3]);
    }

    public function storeStep3(Request $request)
    {
        $leadId = Session::get('signup_lead_id');
        if (!$leadId)
            return response()->json(['success' => false, 'message' => 'Session expired'], 403);

        $request->validate([
            'usage_preference' => 'required|string|max:255',
        ]);

        $lead = SignupLead::find($leadId);
        $lead->update([
            'usage_preference' => $request->usage_preference,
            'signup_step' => 3,
        ]);

        return response()->json(['success' => true, 'next_step' => 4]);
    }

    public function storeStep4(Request $request)
    {
        $leadId = Session::get('signup_lead_id');
        if (!$leadId)
            return response()->json(['success' => false, 'message' => 'Session expired'], 403);

        $request->validate([
            'industry' => 'required|string|max:255',
        ]);

        $lead = SignupLead::find($leadId);
        $lead->update([
            'industry' => $request->industry,
            'signup_step' => 4,
        ]);

        return response()->json(['success' => true, 'next_step' => 5]);
    }

    public function storeStep5(Request $request)
    {
        $leadId = Session::get('signup_lead_id');
        if (!$leadId)
            return response()->json(['success' => false, 'message' => 'Session expired'], 403);

        $request->validate([
            'footfall' => 'required|string|max:255',
        ]);

        $lead = SignupLead::find($leadId);
        $lead->update([
            'footfall' => $request->footfall,
            'signup_step' => 5,
        ]);

        return response()->json(['success' => true, 'next_step' => 6]);
    }

    public function storeStep6(Request $request)
    {
        $leadId = Session::get('signup_lead_id');
        if (!$leadId)
            return response()->json(['success' => false, 'message' => 'Session expired'], 403);

        $request->validate([
            'current_solution' => 'required|string|max:255',
        ]);

        $lead = SignupLead::find($leadId);
        $lead->update([
            'current_solution' => $request->current_solution,
            'signup_step' => 6, // Fully Completed
        ]);

        // Create the actual User record at the end
        // Note: We only save basic fields to User table since the user deleted extended columns from User table
        $user = User::create([
            'name' => $lead->name,
            'email' => $lead->email,
            'password' => $lead->password, // Already hashed
        ]);

        // Log the user in
        Auth::login($user);
        Session::forget('signup_lead_id');

        return response()->json(['success' => true, 'redirect' => route('website-login')]);
    }
}