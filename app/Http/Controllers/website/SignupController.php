<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupStepRequest;
use App\Models\SignupLead;
use App\Models\User;
use App\Notifications\SignupLeadVerifyEmail;
use App\Services\SequenceEmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SignupController extends Controller
{
    public function index()
    {
        // Check if this is from verification redirect
        $isFromVerification = Session::get('from_verification_redirect', false);

        // Check if it's a refresh by comparing referrer
        $referrer = request()->header('referer');
        $currentPath = request()->path();
        $isRefresh = false;

        if ($referrer) {
            $referrerPath = parse_url($referrer, PHP_URL_PATH);
            // If referrer path matches current path, it's a refresh
            if ($referrerPath === '/'.$currentPath || $referrerPath === $currentPath) {
                $isRefresh = true;
            }
        }

        // Always clear session on refresh, unless it's from verification redirect
        if ($isRefresh && ! $isFromVerification) {
            Session::forget('signup_form_data');
            // Don't clear signup_lead_id on refresh if email is verified
            // This allows user to continue from where they left off
            $leadId = Session::get('signup_lead_id');
            if ($leadId) {
                $lead = SignupLead::find($leadId);
                // If lead doesn't exist or email is not verified, clear the session
                if (! $lead || ! $lead->hasVerifiedEmail()) {
                    Session::forget('signup_lead_id');
                    Session::forget('completed_steps');
                } else {
                    // Email is verified, keep signup_lead_id but clear completed_steps
                    // We'll restore it below based on database signup_step
                    Session::forget('completed_steps');
                }
            } else {
                Session::forget('completed_steps');
            }
        }

        // Clear the verification redirect flag after using it
        if ($isFromVerification) {
            Session::forget('from_verification_redirect');
        }

        // Get data from session (stored before verification)
        $sessionData = Session::get('signup_form_data', []);

        $leadData = [
            'name' => $sessionData['name'] ?? null,
            'email' => $sessionData['email'] ?? null,
            'phone_number' => $sessionData['phone_number'] ?? null,
            'country_code' => $sessionData['country_code'] ?? null,
            'isEmailVerified' => false,
        ];

        // Check if email is verified (from database lead record)
        $leadId = Session::get('signup_lead_id');
        if ($leadId) {
            $lead = SignupLead::find($leadId);
            if ($lead && $lead->hasVerifiedEmail()) {
                $leadData['isEmailVerified'] = true;
                // Ensure email from session matches verified email
                if ($lead->email) {
                    $leadData['email'] = $lead->email;
                }

                // Restore completed steps from database
                // signup_step in database represents the last completed step
                // Important: Step 1 is only considered completed if email is verified
                // So if signup_step is 2, it means steps 1 and 2 are completed (email must be verified)
                $completedSteps = Session::get('completed_steps', []);
                $dbSignupStep = $lead->signup_step ?? 0;

                // Step 1 is always completed if email is verified (email verification is part of step 1)
                if (! in_array(1, $completedSteps)) {
                    $completedSteps[] = 1;
                }

                // Restore all completed steps up to the signup_step in database
                // signup_step = 1 means step 1 is completed (email verified)
                // signup_step = 2 means steps 1 and 2 are completed (email verified + step 2 submitted)
                // signup_step = 3 means steps 1, 2, and 3 are completed, etc.
                // Note: We can only restore steps 2-6 if signup_step >= 2, because step 1 completion
                // requires email verification, and you can't complete step 2 without completing step 1
                if ($dbSignupStep >= 1) {
                    // Step 1 is already added above, now add steps 2-6 if they exist
                    for ($step = 2; $step <= $dbSignupStep && $step <= 6; $step++) {
                        if (! in_array($step, $completedSteps)) {
                            $completedSteps[] = $step;
                        }
                    }
                }

                Session::put('completed_steps', $completedSteps);
            }
        }

        return view('website.auth.signup', $leadData);
    }

    /**
     * Clear signup session data
     */
    public function clearSession(): JsonResponse
    {
        Session::forget('signup_form_data');
        Session::forget('signup_lead_id');
        Session::forget('completed_steps');

        return response()->json(['success' => true, 'message' => 'Session cleared']);
    }

    public function storeStep(SignupStepRequest $request, int $step): JsonResponse
    {
        // Validate step access - user must complete previous steps
        if ($step > 1) {
            $completedSteps = Session::get('completed_steps', []);

            // Check if all previous steps are completed
            for ($i = 1; $i < $step; $i++) {
                if (! in_array($i, $completedSteps)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Please complete previous steps first.',
                        'redirect' => route('signup', ['basic_info']),
                    ], 403);
                }
            }

            // Special check for step 2: email must be verified
            if ($step === 2) {
                $leadId = Session::get('signup_lead_id');
                if (! $leadId) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Please complete step 1 and verify your email first.',
                        'redirect' => route('signup', ['basic_info']),
                    ], 403);
                }

                $lead = SignupLead::find($leadId);
                if (! $lead || ! $lead->hasVerifiedEmail()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Please verify your email first.',
                        'redirect' => route('signup', ['basic_info']),
                    ], 403);
                }
            }
        }

        $validated = $request->validated();

        if ($step === 1) {
            // Check if lead already exists (from email verification)
            $leadId = Session::get('signup_lead_id');
            $lead = null;

            if ($leadId) {
                $lead = SignupLead::find($leadId);
            }

            // This is when "Start Free Trial" button is clicked - save to database
            // If lead exists (from email verification), update it with all form data
            if ($lead && $lead->email === $validated['email']) {
                $lead->update([
                    'name' => $validated['name'],
                    'phone_number' => $validated['country_code'].' '.$validated['phone_number'],
                    'password' => Hash::make($validated['password']),
                    'signup_step' => 1,
                ]);
            } else {
                // Create new lead record with all data
                $lead = SignupLead::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone_number' => $validated['country_code'].' '.$validated['phone_number'],
                    'password' => Hash::make($validated['password']),
                    'signup_step' => 1,
                ]);
                Session::put('signup_lead_id', $lead->id);
            }

            // Clear session form data as it's now in database
            Session::forget('signup_form_data');

            // Send verification email if not already verified
            $verificationSent = false;
            if (! $lead->hasVerifiedEmail()) {
                try {
                    $lead->notify(new SignupLeadVerifyEmail);
                    $verificationSent = true;
                    Log::info('Verification email sent after step 1 submission', [
                        'lead_id' => $lead->id,
                        'email' => $lead->email,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to send verification email after step 1', [
                        'lead_id' => $lead->id,
                        'error' => $e->getMessage(),
                    ]);
                }
            }

            // Send "on_signup" event-based sequence emails
            try {
                $sequenceService = new SequenceEmailService;
                $sequenceService->sendEventBasedEmails('on_signup', $lead);
            } catch (\Exception $e) {
                Log::error('Failed to send on_signup sequence emails', [
                    'lead_id' => $lead->id,
                    'error' => $e->getMessage(),
                ]);
            }

            // If email is already verified, proceed to step 2
            if ($lead->hasVerifiedEmail()) {
                return response()->json([
                    'success' => true,
                    'next_step' => 2,
                ]);
            }

            // If verification email was sent, return success with verification flag
            if ($verificationSent) {
                return response()->json([
                    'success' => true,
                    'verification_sent' => true,
                    'email' => $lead->email,
                    'lead_id' => $lead->id,
                    'next_step' => 1, // Stay on step 1 to show verification message
                ]);
            }

            // Fallback: stay on step 1
            return response()->json([
                'success' => true,
                'next_step' => 1,
            ]);
        }

        $lead = SignupLead::find(Session::get('signup_lead_id'));

        // Check domain availability on step 2
        if ($step === 2) {
            $domainName = $validated['domain_name'] ?? '';

            if ($domainName) {
                // Check if domain exists in signup_leads table (excluding current lead)
                $domainExistsInLeads = SignupLead::where('domain_name', $domainName)
                    ->where('id', '!=', $lead->id ?? 0)
                    ->exists();

                if ($domainExistsInLeads) {
                    return response()->json([
                        'success' => false,
                        'message' => 'This domain is already taken. Please choose a different domain name.',
                        'errors' => [
                            'domain_name' => ['This domain is already taken. Please choose a different domain name.'],
                        ],
                    ], 422);
                }

                // Also check if domain exists in external database
                try {
                    $domainExistsInExternal = DB::connection('mysql_external')
                        ->table('domains')
                        ->where('domain', $domainName)
                        ->exists();

                    if ($domainExistsInExternal) {
                        return response()->json([
                            'success' => false,
                            'message' => 'This domain is already taken. Please choose a different domain name.',
                            'errors' => [
                                'domain_name' => ['This domain is already taken. Please choose a different domain name.'],
                            ],
                        ], 422);
                    }
                } catch (\Exception $e) {
                    // Log error but don't block user - let API handle validation at step 6
                    Log::error('Domain check in external database failed', [
                        'domain' => $domainName,
                        'error' => $e->getMessage(),
                        'lead_id' => $lead->id ?? null,
                    ]);

                    // Continue with normal flow - API will validate at step 6
                }
            }
        }

        if ($step === 6) {
            return DB::transaction(function () use ($lead, $validated) {
                $lead->update(array_merge($validated, ['signup_step' => 6]));

                // Mark step 6 as completed
                $completedSteps = Session::get('completed_steps', []);
                if (! in_array(6, $completedSteps)) {
                    $completedSteps[] = 6;
                    Session::put('completed_steps', $completedSteps);
                }

                // Extract phone_code and phone from phone_number
                // phone_number is stored as "country_code phone_number" (e.g., "+1 1234567890")
                $phoneNumber = trim($lead->phone_number ?? '');
                $phoneParts = explode(' ', $phoneNumber, 2);
                $phoneCode = $phoneParts[0] ?? '';
                $phone = isset($phoneParts[1]) ? trim($phoneParts[1]) : '';

                // Fallback: if no space found, try to extract code from start
                if (empty($phone) && ! empty($phoneNumber)) {
                    // Try to match country code pattern (e.g., +1, +44, etc.)
                    if (preg_match('/^(\+\d{1,4})\s*(.+)$/', $phoneNumber, $matches)) {
                        $phoneCode = $matches[1];
                        $phone = $matches[2];
                    } else {
                        // If no pattern matches, use full number as phone (edge case)
                        $phone = $phoneNumber;
                    }
                }

                // Prepare API payload
                $apiData = [
                    'domain' => $lead->domain_name,
                    'fullname' => $lead->name,
                    'company_name' => $lead->company_name,
                    'email' => $lead->email,
                    'phone' => $phone,
                    'phone_code' => $phoneCode,
                    'additional_info' => [
                        'role' => $lead->role,
                        'website' => $lead->website,
                        'usage_preference' => $lead->usage_preference,
                        'industry' => $lead->industry,
                        'footfall' => $lead->footfall,
                        'current_solution' => $lead->current_solution,
                        'signup_step' => $lead->signup_step,
                    ],
                ];

                // Call external API
                try {
                    $response = Http::post('https://qwaiting-ai.thevistiq.com/api/create/tenant', $apiData);

                    if ($response->successful()) {
                        // Soft delete the lead after successful API call
                        $lead->delete();

                        // $user = User::create([
                        //     'name' => $lead->name,
                        //     'email' => $lead->email,
                        //     'password' => $lead->password,
                        // ]);

                        // Auth::login($user);

                        // Destroy all signup-related session data
                        Session::forget('signup_lead_id');
                        Session::forget('signup_form_data');
                        Session::forget('completed_steps');
                        Session::forget('from_verification_redirect');

                        return response()->json(['success' => true, 'redirect' => route('website-login')]);
                    } else {
                        // Log API error
                        Log::error('External API call failed', [
                            'status' => $response->status(),
                            'body' => $response->body(),
                            'lead_id' => $lead->id,
                        ]);

                        return response()->json([
                            'success' => false,
                            'message' => 'Failed to create tenant. Please try again.',
                        ], 500);
                    }
                } catch (\Exception $e) {
                    // Log exception
                    Log::error('External API exception', [
                        'message' => $e->getMessage(),
                        'lead_id' => $lead->id,
                    ]);

                    return response()->json([
                        'success' => false,
                        'message' => 'An error occurred. Please try again.',
                    ], 500);
                }
            });
        }

        $lead->update(array_merge($validated, ['signup_step' => $step]));

        // Mark step as completed
        $completedSteps = Session::get('completed_steps', []);
        if (! in_array($step, $completedSteps)) {
            $completedSteps[] = $step;
            Session::put('completed_steps', $completedSteps);
        }

        return response()->json(['success' => true, 'next_step' => $step + 1]);
    }

    /**
     * Send email verification link
     */
    public function sendVerificationEmail(): JsonResponse
    {
        $request = request();
        $email = $request->input('email');
        $name = $request->input('name');
        $phoneNumber = $request->input('phone_number');
        $countryCode = $request->input('country_code');

        if (! $email) {
            return response()->json([
                'success' => false,
                'message' => 'Email is required.',
            ], 400);
        }

        // Store form data in session (not in database yet)
        Session::put('signup_form_data', [
            'name' => $name,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'country_code' => $countryCode,
        ]);

        // Check if lead exists for email verification
        $leadId = Session::get('signup_lead_id');
        $lead = null;

        if ($leadId) {
            $lead = SignupLead::find($leadId);
        }

        // Create or get lead record only for email verification (minimal data)
        if (! $lead || $lead->email !== $email) {
            // Check if email already exists
            $existingLead = SignupLead::where('email', $email)->first();

            if ($existingLead) {
                $lead = $existingLead;
                Session::put('signup_lead_id', $lead->id);
            } else {
                // Create minimal lead record only for email verification
                $lead = SignupLead::create([
                    'email' => $email,
                    'signup_step' => 0, // Temporary record for verification only
                ]);
                Session::put('signup_lead_id', $lead->id);
            }
        }

        if ($lead->hasVerifiedEmail()) {
            return response()->json([
                'success' => false,
                'message' => 'Email is already verified.',
            ], 400);
        }

        try {
            // Verify mail configuration
            $mailDriver = config('mail.default');

            if ($mailDriver === 'log') {
                Log::warning('Mail driver is set to log - emails will not be sent', [
                    'lead_id' => $lead->id,
                    'email' => $lead->email,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Mail is configured to log only. Please set MAIL_MAILER=smtp in your .env file and run: php artisan config:clear',
                ], 400);
            }

            // Send verification email immediately (not queued)
            $lead->notify(new SignupLeadVerifyEmail);

            Log::info('Verification email sent', [
                'lead_id' => $lead->id,
                'email' => $lead->email,
                'mail_driver' => $mailDriver,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Verification email sent successfully. Please check your inbox (and spam folder).',
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send verification email', [
                'lead_id' => $lead->id,
                'email' => $lead->email,
                'mail_driver' => config('mail.default'),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send verification email: '.$e->getMessage().'. Please check your mail configuration in .env file.',
            ], 500);
        }
    }

    /**
     * Verify email address
     */
    public function verifyEmail($id, $hash): RedirectResponse
    {
        $lead = SignupLead::findOrFail($id);

        if ($lead->hasVerifiedEmail()) {
            Session::put('signup_lead_id', $lead->id);

            // Mark step 1 as completed
            $completedSteps = Session::get('completed_steps', []);
            if (! in_array(1, $completedSteps)) {
                $completedSteps[] = 1;
                Session::put('completed_steps', $completedSteps);
            }

            // Redirect directly to step 2
            return redirect()->route('signup', ['business_info'])->with('verified', 'Email is already verified.');
        }

        if (sha1($lead->email) !== $hash) {
            return redirect()->route('signup')->with('error', 'Invalid verification link.');
        }

        $lead->markEmailAsVerified();
        Session::put('signup_lead_id', $lead->id);

        // Send event-based sequence emails for verification
        try {
            $sequenceService = new SequenceEmailService;
            // Send "on_verification" emails (sent immediately when verified)
            $sequenceService->sendEventBasedEmails('on_verification', $lead);
            // Send "after_verification" emails (sent after verification)
            $sequenceService->sendEventBasedEmails('after_verification', $lead);
        } catch (\Exception $e) {
            Log::error('Failed to send verification sequence emails', [
                'lead_id' => $lead->id,
                'error' => $e->getMessage(),
            ]);
        }

        // Mark step 1 as completed (email verification is part of step 1 completion)
        $completedSteps = Session::get('completed_steps', []);
        if (! in_array(1, $completedSteps)) {
            $completedSteps[] = 1;
            Session::put('completed_steps', $completedSteps);
        }

        // Redirect directly to step 2 (only this tab redirects, existing tab stays on step 1)
        return redirect()->route('signup', ['business_info'])->with('verified', 'Email verified successfully! You can continue with the signup process.');
    }

    /**
     * Verification redirect page - handles cross-tab communication
     */
    public function verifyRedirect(): View
    {
        return view('website.auth.verify-redirect');
    }

    /**
     * Show email verification sent page
     */
    public function showVerifyEmailSent(): View
    {
        $email = request()->query('email');
        $leadId = request()->query('lead_id');

        return view('website.auth.verify-email-sent', [
            'email' => $email,
            'leadId' => $leadId,
        ]);
    }

    /**
     * Resend verification email
     */
    public function resendVerificationEmail(): JsonResponse
    {
        $email = request()->input('email');
        $leadId = request()->input('lead_id');

        if (! $email && ! $leadId) {
            return response()->json([
                'success' => false,
                'message' => 'Email or lead ID is required.',
            ], 400);
        }

        $lead = null;
        if ($leadId) {
            $lead = SignupLead::find($leadId);
        } elseif ($email) {
            $lead = SignupLead::where('email', $email)->first();
        }

        if (! $lead) {
            return response()->json([
                'success' => false,
                'message' => 'Lead not found.',
            ], 404);
        }

        if ($lead->hasVerifiedEmail()) {
            return response()->json([
                'success' => false,
                'message' => 'Email is already verified.',
            ], 400);
        }

        try {
            $lead->notify(new SignupLeadVerifyEmail);
            Log::info('Verification email resent', [
                'lead_id' => $lead->id,
                'email' => $lead->email,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Verification email sent successfully!',
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to resend verification email', [
                'lead_id' => $lead->id ?? null,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send verification email: '.$e->getMessage(),
            ], 500);
        }
    }
}
