<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupStepRequest;
use App\Models\SignupLead;
use App\Models\SubscriptionCoupon;
use App\Models\SubscriptionCouponUsage;
use App\Models\SubscriptionPackage;
use App\Models\SubscriptionPricing;
use App\Models\SubscriptionPackageFeature;
use App\Models\User;
use App\Notifications\SignupLeadVerifyEmail;
use App\Services\SequenceEmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Checkout\Session as StripeSession;
use Stripe\PaymentIntent;
use Stripe\Exception\CardException;
use Carbon\Carbon;

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
            if ($referrerPath === '/' . $currentPath || $referrerPath === $currentPath) {
                $isRefresh = true;
            }
        }

        // Always clear session on refresh, unless it's from verification redirect
        if ($isRefresh && !$isFromVerification) {
            Session::forget('signup_form_data');
            Session::forget('selected_coupon'); // Clear coupon on refresh
            // Don't clear signup_lead_id on refresh if email is verified
            // This allows user to continue from where they left off
            $leadId = Session::get('signup_lead_id');
            if ($leadId) {
                $lead = SignupLead::find($leadId);
                // If lead doesn't exist or email is not verified, clear the session
                if (!$lead || !$lead->hasVerifiedEmail()) {
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

        // Check if hash is provided in query parameters (from email link)
        // No lead_id in URL for security - find user by hash only
        $queryHash = request()->query('hash');

        if ($queryHash) {
            // Find user by matching hash (hash = sha1(email + id + app_key))
            // Only check incomplete signups (signup_step < 6) for efficiency
            $leads = SignupLead::whereNotNull('email_verified_at')
                ->where('email', '!=', '')
                ->where('signup_step', '<', 6)
                ->get();

            foreach ($leads as $candidateLead) {
                $expectedHash = sha1($candidateLead->email . $candidateLead->id . config('app.key'));
                if ($expectedHash === $queryHash) {
                    // Restore session from query parameters
                    Session::put('signup_lead_id', $candidateLead->id);
                    break;
                }
            }
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
        $lead = null;
        $hasSelectedPackage = false;
        $currentPackageId = null;

        if ($leadId) {
            $lead = SignupLead::find($leadId);
            if ($lead && $lead->hasVerifiedEmail()) {
                $leadData['isEmailVerified'] = true;
                // Ensure email from session matches verified email
                if ($lead->email) {
                    $leadData['email'] = $lead->email;
                }

                if ($lead->package_id) {
                    $hasSelectedPackage = true;
                    $currentPackageId = $lead->package_id;
                }

                // Populate step 2 fields from database
                if ($lead->domain_name) {
                    $leadData['domain_name'] = $lead->domain_name;
                }
                if ($lead->company_name) {
                    $leadData['company_name'] = $lead->company_name;
                }
                if ($lead->role) {
                    $leadData['role'] = $lead->role;
                }
                if ($lead->website) {
                    $leadData['website'] = $lead->website;
                }

                // Restore completed steps from database
                // signup_step in database represents the last completed step
                // Important: Step 1 is only considered completed if email is verified
                // So if signup_step is 2, it means steps 1 and 2 are completed (email must be verified)
                $completedSteps = Session::get('completed_steps', []);
                $dbSignupStep = $lead->signup_step ?? 0;

                // Step 1 is always completed if email is verified (email verification is part of step 1)
                if (!in_array(1, $completedSteps)) {
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
                        if (!in_array($step, $completedSteps)) {
                            $completedSteps[] = $step;
                        }
                    }
                }

                Session::put('completed_steps', $completedSteps);
            }
        }

        // Check for package_id in query and store in session
        $queryPackageId = request()->query('package_id');
        $queryBillingCycle = request()->query('billing_cycle', 'annual'); // Default to annual

        if ($queryPackageId) {
            Session::put('selected_package_id', $queryPackageId);
            Session::put('selected_billing_cycle', $queryBillingCycle);
        } else {
            // If no package_id in query, clear any previous selection (e.g. from previous abandoned attempt)
            // This ensures starting from menu (without package) doesn't use old session data
            Session::forget('selected_package_id');
            // Don't forget billing_cycle - user might change it during signup
        }

        $currency = request()->get('currency', 'USD');

        // Get all active packages with their features and pricing (Logic copied from PricingController)
        $packages = SubscriptionPackage::where('status', 'active')
            ->where('is_enquiry', 0) // Keep the enquiry filter we added
            ->with([
                'features' => function ($query) {
                    $query->where('status', 'active');
                },
                'pricings' => function ($query) use ($currency) {
                    $query->where('currency', $currency)->where('status', 'active');
                },
            ])
            ->orderBy('display_sequence')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(function ($package) {
                $monthlyPricing = $package->pricings->firstWhere('billing_cycle', 'monthly');
                $annualPricing = $package->pricings->firstWhere('billing_cycle', 'annual');

                // Get all features with their limit types and values
                $allFeatures = $package->features->map(function ($feature) use ($package) {
                    $packageFeature = SubscriptionPackageFeature::where('package_id', $package->id)
                        ->where('feature_id', $feature->id)
                        ->first();

                    $limitType = $packageFeature?->limit_type ?? 'disabled';
                    $limitValue = $packageFeature?->limit_value ?? ($feature->data_type === 'Text' ? '' : 0);
                    $isNumeric = $feature->data_type === 'Number' && $limitType === 'limited' && is_numeric($limitValue) && (float) $limitValue > 0;

                    return [
                        'id' => $feature->id,
                        'name' => $feature->name,
                        'key' => $feature->key,
                        'included' => $limitType !== 'disabled',
                        'limit_type' => $limitType,
                        'limit_value' => $limitValue,
                        'data_type' => $feature->data_type,
                        'is_numeric' => $isNumeric,
                    ];
                })->toArray();

                // Filter to only included features first
                $features = array_filter($allFeatures, function ($feature) {
                    return $feature['included'] === true;
                });

                // Re-index array after filtering
                $features = array_values($features);

                // Sort features: numeric features first, then alphabetically
                usort($features, function ($a, $b) {
                    // First priority: numeric features come first
                    if ($a['is_numeric'] !== $b['is_numeric']) {
                        return $b['is_numeric'] <=> $a['is_numeric']; // true (1) comes before false (0)
                    }

                    // Second priority: sort alphabetically by feature name
                    return strcmp($a['name'], $b['name']);
                });

                // Remove the sort helper key
                foreach ($features as &$feature) {
                    unset($feature['is_numeric']);
                }
                unset($feature);

                // Limit features based on features_display_limit if set (only count included features)
                if ($package->features_display_limit !== null && $package->features_display_limit > 0) {
                    $features = array_slice($features, 0, $package->features_display_limit);
                }

                return [
                    'id' => $package->id,
                    'name' => $package->name,
                    'code' => $package->code,
                    'subtitle' => $package->subtitle,
                    'description' => $package->description,
                    'is_most_popular' => $package->is_most_popular,
                    'monthly_price' => $monthlyPricing ? (float) $monthlyPricing->price : null,
                    'annual_price' => $annualPricing ? (float) $annualPricing->price : null,
                    'monthly_enabled' => $package->monthly_enabled,
                    'annual_enabled' => $package->annual_enabled,
                    'trial_days' => $package->trial_days,
                    'is_enquiry' => $package->is_enquiry,
                    'credit_card_required' => $package->credit_card_required,
                    'features' => $features,
                ];
            });

        // Prefer package_id from database (if loaded), otherwise use session
        $selectedPackageId = isset($lead) && $lead->package_id ? $lead->package_id : Session::get('selected_package_id');

        // Get selected package details if package is already selected
        $selectedPackage = null;
        $selectedBillingCycle = 'annual'; // Default to annual

        if ($hasSelectedPackage && $currentPackageId) {
            $selectedPackage = $packages->firstWhere('id', $currentPackageId);
            // Get billing cycle from lead if available
            if (isset($lead) && $lead->billing_cycle) {
                $selectedBillingCycle = $lead->billing_cycle;
            }
        }

        return view('website.auth.signup', array_merge($leadData, [
            'packages' => $packages,
            'preselected_package_id' => $selectedPackageId,
            'hasSelectedPackage' => $hasSelectedPackage,
            'currentPackageId' => $currentPackageId,
            'lead' => $lead,
            'selectedPackage' => $selectedPackage,
            'selectedBillingCycle' => $selectedBillingCycle
        ]));
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

    /**
     * Save billing cycle to session
     */
    public function saveBillingCycle(Request $request)
    {
        $validated = $request->validate([
            'billing_cycle' => 'required|in:monthly,annual',
        ]);

        $billingCycle = $validated['billing_cycle'];
        Session::put('selected_billing_cycle', $billingCycle);

        // Update database immediately if lead exists
        $leadId = Session::get('signup_lead_id');
        if ($leadId) {
            $lead = SignupLead::find($leadId);
            if ($lead) {
                $lead->billing_cycle = $billingCycle;
                $lead->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
            'package_id' => 'required|integer',
            'billing_cycle' => 'required|string|in:monthly,annual',
            'currency' => 'nullable|string',
            'lead_id' => 'required|integer'
        ]);

        $code = $request->coupon_code;
        $packageId = $request->package_id;
        $billingCycle = $request->billing_cycle;
        $currency = $request->input('currency', 'USD');

        // FORCE CHECK: Use Database Billing Cycle if available
        $lead = SignupLead::find($request->lead_id);

        if (!$lead || !$lead->billing_cycle) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to determine billing cycle.'
            ]);
        }

        $billingCycle = $lead->billing_cycle;



        $coupon = SubscriptionCoupon::where('code', $code)->first();

        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid coupon code.'
            ]);
        }

        // Rule 1: Existence & Status
        if ($coupon->status !== 'active') {
            return response()->json([
                'success' => false,
                'message' => 'This coupon is inactive or invalid.'
            ]);
        }

        // Rule 2: Validity Period
        $today = Carbon::now()->startOfDay();
        $validFrom = Carbon::parse($coupon->valid_from)->startOfDay();
        $validUntil = Carbon::parse($coupon->valid_until)->endOfDay();

        if (!$today->between($validFrom, $validUntil)) {
            return response()->json([
                'success' => false,
                'message' => 'This coupon is not valid at this time.'
            ]);
        }

        // Rule 3: Usage Limit
        if ($coupon->hasReachedUsageLimit()) {
            return response()->json([
                'success' => false,
                'message' => 'This coupon is not applicable.'
            ]);
        }

        // Rule 4: Package Applicability
        if ($coupon->applicable_packages === 'specific') {
            $isApplicable = $coupon->packages()->where('package_id', $packageId)->exists();
            if (!$isApplicable) {
                return response()->json([
                    'success' => false,
                    'message' => 'This coupon is not applicable to the selected package.'
                ]);
            }
        }

        // Calculate discount (Rule 5 setup)
        // Check pricing for SPECIFIC currency to ensure we don't compare USD discount against INR price
        $pricing = SubscriptionPricing::where('package_id', $packageId)
            ->where('billing_cycle', $billingCycle)
            ->where('currency', $currency)
            ->first();

        if (!$pricing) {
            return response()->json([
                'success' => false,
                'message' => 'This coupon is not applicable.'
            ]);
        }

        $price = $pricing->price;
        $discountAmount = 0;

        // Rule 5: Discount Type Validation
        if ($coupon->discount_type === 'percentage') {
            if ($coupon->discount_value < 1 || $coupon->discount_value > 100) {
                return response()->json([
                    'success' => false,
                    'message' => 'This coupon is not applicable'
                ]);
            }
            $discountAmount = ($price * $coupon->discount_value) / 100;
        } elseif ($coupon->discount_type === 'fixed') {
            if ($coupon->discount_value <= 0 || $coupon->discount_value > $price) {
                return response()->json([
                    'success' => false,
                    'message' => 'This coupon is not applicable'
                ]);
            }
            $discountAmount = $coupon->discount_value;
        }

        // Rule 6: Duration Type (Implicit)
        // logic for 'Once' vs 'Forever' application is typically handled
        // during subscription creation. For the initial payment display,
        // we show the discount as calculated above.

        $finalPrice = $price - $discountAmount;
        $finalPrice = max(0, $finalPrice); // Data integrity fallback

        // Store in session
        // Session storage removed per request
        // Session::put('selected_coupon', ...);

        return response()->json([
            'success' => true,
            'message' => 'Coupon applied successfully!',
            'coupon' => [
                'code' => $coupon->code,
                'discount_amount' => $discountAmount,
                'final_price' => $finalPrice
            ]
        ]);
    }

    public function removeCoupon()
    {
        Session::forget('selected_coupon');
        return response()->json([
            'success' => true,
            'message' => 'Coupon removed.'
        ]);
    }

    public function storeStep(SignupStepRequest $request, int $step): JsonResponse
    {
        // Validate step access - user must complete previous steps
        if ($step > 1) {
            $completedSteps = Session::get('completed_steps', []);

            // Check if all previous steps are completed
            for ($i = 1; $i < $step; $i++) {
                if (!in_array($i, $completedSteps)) {
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
                if (!$leadId) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Please complete step 1 and verify your email first.',
                        'redirect' => route('signup', ['basic_info']),
                    ], 403);
                }

                $lead = SignupLead::find($leadId);
                if (!$lead || !$lead->hasVerifiedEmail()) {
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
            $email = $validated['email'];

            // Check if email already exists in signup_leads table
            $existingLead = SignupLead::where('email', $email)->first();

            // Scenario 1: Registration is fully completed (signup_step = 6)
            if ($existingLead && $existingLead->signup_step === 6) {
                return response()->json([
                    'success' => false,
                    'message' => 'This email address is already registered.',
                    'errors' => [
                        'email' => ['This email address is already registered.'],
                    ],
                ], 422);
            }

            // Scenario 2: User signed up but didn't verify email
            if ($existingLead && !$existingLead->hasVerifiedEmail()) {
                // Resend verification email
                try {
                    $packageId = Session::get('selected_package_id');
                    $existingLead->notify(new SignupLeadVerifyEmail($packageId));

                    Log::info('Verification email resent for existing unverified lead', [
                        'lead_id' => $existingLead->id,
                        'email' => $existingLead->email,
                    ]);

                    return response()->json([
                        'success' => true,
                        'verification_sent' => true,
                        'email' => $existingLead->email,
                        'lead_id' => $existingLead->id,
                        'message' => 'A verification email has been sent to your email address. Please check your inbox.',
                        'next_step' => 1, // Stay on step 1 to show verification message
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to resend verification email', [
                        'lead_id' => $existingLead->id,
                        'error' => $e->getMessage(),
                    ]);

                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to send verification email. Please try again later.',
                    ], 500);
                }
            }

            // Scenario 3: User verified email but didn't complete all registration steps
            if ($existingLead && $existingLead->hasVerifiedEmail() && $existingLead->signup_step < 6) {
                // Restore session
                Session::put('signup_lead_id', $existingLead->id);

                // Restore completed steps from database
                $completedSteps = [];
                $dbSignupStep = $existingLead->signup_step ?? 0;

                // Step 1 is always completed if email is verified
                $completedSteps[] = 1;

                // Add all completed steps up to signup_step
                for ($stepNum = 2; $stepNum <= $dbSignupStep && $stepNum <= 6; $stepNum++) {
                    $completedSteps[] = $stepNum;
                }

                Session::put('completed_steps', $completedSteps);

                // Determine next step and redirect
                $nextStep = $dbSignupStep + 1;
                $stepQueryMap = [
                    1 => 'basic_info',
                    2 => 'business_info',
                    3 => 'usage_preference',
                    4 => 'industry',
                    5 => 'daily_footfall',
                    6 => 'current_solution',
                ];

                $stepQuery = $stepQueryMap[$nextStep] ?? 'basic_info';

                // Generate hash for security
                $hash = sha1($existingLead->email . $existingLead->id . config('app.key'));

                Log::info('Redirecting incomplete signup to step', [
                    'lead_id' => $existingLead->id,
                    'email' => $existingLead->email,
                    'current_step' => $dbSignupStep,
                    'next_step' => $nextStep,
                    'step_query' => $stepQuery,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Continuing from where you left off.',
                    'redirect' => route('signup') . '?' . $stepQuery . '&hash=' . $hash,
                    'next_step' => $nextStep,
                ]);
            }

            // Scenario 4: New user or existing lead from session - proceed with normal flow
            $leadId = Session::get('signup_lead_id');
            $lead = null;

            if ($leadId) {
                $lead = SignupLead::find($leadId);
            }

            // Get package info from session
            $packageId = Session::get('selected_package_id');
            $billingCycle = Session::get('selected_billing_cycle', 'annual');

            // If lead exists (from email verification), update it with all form data
            if ($lead && $lead->email === $email) {
                $lead->update([
                    'name' => $validated['name'],
                    'phone_number' => $validated['country_code'] . ' ' . $validated['phone_number'],
                    'password' => Hash::make($validated['password']),
                    'temp_password' => $validated['password'], // Store plain password temporarily
                    'signup_step' => 1,
                    'package_id' => $packageId,
                    'billing_cycle' => $billingCycle,
                ]);
            } else {
                // Create new lead record with all data
                $lead = SignupLead::create([
                    'name' => $validated['name'],
                    'email' => $email,
                    'phone_number' => $validated['country_code'] . ' ' . $validated['phone_number'],
                    'password' => Hash::make($validated['password']),
                    'temp_password' => $validated['password'], // Store plain password temporarily
                    'signup_step' => 1,
                    'package_id' => $packageId,
                    'billing_cycle' => $billingCycle,
                ]);
                Session::put('signup_lead_id', $lead->id);
            }

            // Clear session form data as it's now in database
            Session::forget('signup_form_data');

            // Send verification email if not already verified
            $verificationSent = false;
            // Send verification email if not already verified
            $verificationSent = false;
            if (!$lead->hasVerifiedEmail()) {
                try {
                    $packageId = Session::get('selected_package_id');
                    $lead->notify(new SignupLeadVerifyEmail($packageId));
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

        if (!$lead) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please start over.',
                'redirect' => route('signup', ['basic_info']),
            ], 403);
        }

        // Check domain availability on step 2
        if ($step === 2) {
            $domainName = $validated['domain_name'] ?? '';

            if ($domainName) {
                // Check if domain exists in signup_leads table (excluding current lead)
                $domainExistsInLeads = SignupLead::where('domain_name', $domainName)
                    ->where('id', '!=', $lead->id)
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
                // Domains are stored with suffixes (.localhost for local, .qwaiting.com for production)
                // Check for both formats to cover all environments
                try {
                    $domainLocalhost = $domainName . '.localhost';
                    $domainQwaiting = $domainName . '.qwaiting.com';

                    $domainExistsInExternal = DB::connection('mysql_external')
                        ->table('domains')
                        ->where(function ($query) use ($domainName, $domainLocalhost, $domainQwaiting) {
                            $query->where('domain', $domainName)
                                ->orWhere('domain', $domainLocalhost)
                                ->orWhere('domain', $domainQwaiting);
                        })
                        ->exists();

                    Log::info('Domain validation check', [
                        'domain' => $domainName,
                        'domain_localhost' => $domainLocalhost,
                        'domain_qwaiting' => $domainQwaiting,
                        'exists_in_external' => $domainExistsInExternal,
                        'lead_id' => $lead->id,
                    ]);

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
                    // If external DB check fails, fail validation to ensure domain availability is verified
                    // This prevents invalid domains from proceeding to step 3
                    Log::error('Domain check in external database failed - failing validation', [
                        'domain' => $domainName,
                        'error' => $e->getMessage(),
                        'lead_id' => $lead->id,
                        'trace' => $e->getTraceAsString(),
                    ]);

                    return response()->json([
                        'success' => false,
                        'message' => 'Unable to verify domain availability. Please try again.',
                        'errors' => [
                            'domain_name' => ['Unable to verify domain availability. Please try again.'],
                        ],
                    ], 422);
                }
            }
        }

        if ($step === 6) {
            return DB::transaction(function () use ($lead, $validated) {
                // Update lead with step 6 data
                $lead->update(array_merge($validated, ['signup_step' => 6]));

                // Mark step 6 as completed
                $completedSteps = Session::get('completed_steps', []);
                if (!in_array(6, $completedSteps)) {
                    $completedSteps[] = 6;
                    Session::put('completed_steps', $completedSteps);
                }

                // Check if package_id exists in session and save it to lead
                $packageId = Session::get('selected_package_id');
                // Fallback: If session is empty, check if lead already has a package_id (e.g. from Pricing page/Index)
                if (!$packageId && $lead->package_id) {
                    $packageId = $lead->package_id;
                }

                $billingCycle = Session::get('selected_billing_cycle', 'annual'); // Default to annual
                // Fallback for billing cycle too
                if ($lead->billing_cycle && (!Session::has('selected_billing_cycle'))) {
                    $billingCycle = $lead->billing_cycle;
                }

                if ($packageId) {
                    $lead->update([
                        'package_id' => $packageId,
                        'billing_cycle' => $billingCycle
                    ]);
                } else {
                    // Trial Flow (No package selected) - Auto-activate Package 1
                    $package = SubscriptionPackage::find(1);
                    if ($package) {
                        $startDate = Carbon::now();
                        $trialDays = $package->trial_days ?? 14;
                        $endDate = $startDate->copy()->addDays($trialDays);

                        $lead->update([
                            'package_id' => 1,
                            'billing_cycle' => 'annual',
                            'package_start_date' => $startDate,
                            'package_end_date' => $endDate
                        ]);

                        // Provision the tenant immediately
                        $provisionResult = $this->provisionExternalTenant($lead);

                        if (!$provisionResult['success']) {
                            Log::error('Trial Provision Failed', ['msg' => $provisionResult['message']]);
                            // We don't return error to user to avoid blocking them, but we log it.
                            // Or should we return error? user says "Account Activated". 
                            // If it failed, it's NOT activated.
                            return response()->json([
                                'success' => false,
                                'message' => 'Activation failed. Please try again or contact support.'
                            ], 500);
                        }

                        // Calculate Redirect URL
                        $redirectUrl = 'https://' . $lead->domain_name . '.qwaiting.com'; // Default fallback
                        try {
                            // Try to find the domain in the external domains table
                            $externalDomain = DB::connection('mysql_external')
                                ->table('domains')
                                ->where('domain', $lead->domain_name)
                                ->orWhere('domain', $lead->domain_name . '.qwaiting.com')
                                ->orWhere('domain', $lead->domain_name . '.localhost')
                                ->first();

                            if ($externalDomain) {
                                $dbDomain = $externalDomain->domain;
                                if (str_starts_with($dbDomain, 'http')) {
                                    $redirectUrl = $dbDomain;
                                } else {
                                    $redirectUrl = (app()->isLocal() ? 'http://' : 'https://') . $dbDomain;
                                }
                            } else {
                                if (app()->isLocal()) {
                                    $redirectUrl = 'http://' . $lead->domain_name . '.localhost';
                                } else {
                                    $redirectUrl = 'https://' . $lead->domain_name . '.qwaiting.com';
                                }
                            }
                        } catch (\Exception $e) {
                            Log::error('Failed to fetch domain for redirection (Step 6)', ['error' => $e->getMessage()]);
                        }

                        // Return success with redirect URL for Modal Countdown
                        return response()->json([
                            'success' => true,
                            'redirect_url' => $redirectUrl,
                            'message' => 'Trial Account Activated'
                        ]);
                    }
                }

                // Return success and move to Step 7 (Checkout)
                return response()->json([
                    'success' => true,
                    'next_step' => 7,
                    'message' => 'Setup completed. Proceeding to checkout.'
                ]);
            });
        }

        if ($step === 7) {
            // Determine the selected package
            $packageId = $validated['package_id'] ?? $request->input('package_id');
            $package = null;

            if ($packageId) {
                $package = SubscriptionPackage::find($packageId);
            }

            // Validations for Step 7
            if (!$package) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please select a subscription package.',
                ], 422);
            }

            // Payment Logic (Mock)
            // In a real scenario, we would verify the payment intent/status here
            // based on the payment_method_id or similar field from the request.

            // For now, we assume payment is successful if it's a paid package,
            // or we skip payment if it's a trial/enquiry.

            return DB::transaction(function () use ($lead, $package) {
                // Save package selection to lead (if you have a column for it, otherwise skipping)
                // $lead->update(['package_id' => $package->id]);

                // Extract phone_code and phone from phone_number
                // phone_number is stored as "country_code phone_number" (e.g., "+1 1234567890")
                $phoneNumber = trim($lead->phone_number ?? '');
                $phoneParts = explode(' ', $phoneNumber, 2);
                $phoneCode = $phoneParts[0] ?? '';
                $phone = isset($phoneParts[1]) ? trim($phoneParts[1]) : '';

                // Fallback: if no space found, try to extract code from start
                if (empty($phone) && !empty($phoneNumber)) {
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
                    'package_id' => $package->id, // Send selected package ID
                    'additional_info' => [
                        'role' => $lead->role,
                        'website' => $lead->website,
                        'usage_preference' => $lead->usage_preference,
                        'industry' => $lead->industry,
                        'footfall' => $lead->footfall,
                        'current_solution' => $lead->current_solution,
                        'signup_step' => 7, // Final step
                    ],
                ];

                // Call external API -- Same logic as original Step 6
                try {
                    $response = Http::post('https://qwaiting-ai.thevistiq.com/api/create/tenant', $apiData);

                    if ($response->successful()) {
                        // Update email_verified_at in external database users table
                        try {
                            $updated = DB::connection('mysql_external')
                                ->table('users')
                                ->where('email', $lead->email)
                                ->update(['email_verified_at' => now()]);

                            if ($updated) {
                                Log::info('Updated email_verified_at in external database', [
                                    'lead_id' => $lead->id,
                                    'email' => $lead->email,
                                ]);
                            } else {
                                Log::warning('User not found in external database for email_verified_at update', [
                                    'lead_id' => $lead->id,
                                    'email' => $lead->email,
                                ]);
                            }
                        } catch (\Exception $e) {
                            Log::error('Failed to update email_verified_at in external database', [
                                'lead_id' => $lead->id,
                                'email' => $lead->email,
                                'error' => $e->getMessage(),
                                'trace' => $e->getTraceAsString(),
                            ]);
                        }

                        // Send registration complete email before deleting lead
                        // Don't clear temp_password here - let the email job clear it after sending
                        try {
                            $sequenceService = new SequenceEmailService;
                            // Refresh lead to get latest data including temp_password
                            $lead->refresh();

                            Log::info('Sending registration complete email', [
                                'lead_id' => $lead->id,
                                'has_temp_password' => !empty($lead->temp_password),
                                'temp_password_length' => strlen($lead->temp_password ?? ''),
                            ]);

                            // Send "after_verification" emails for registration complete
                            $sequenceService->sendEventBasedEmails('after_verification', $lead);

                            // Also send "immediate" emails in case registration complete uses immediate timing
                            $sequenceService->sendEventBasedEmails('immediate', $lead);
                        } catch (\Exception $e) {
                            Log::error('Failed to send registration complete email', [
                                'lead_id' => $lead->id,
                                'error' => $e->getMessage(),
                                'trace' => $e->getTraceAsString(),
                            ]);
                        }

                        // Soft delete the lead after successful API call
                        // Note: temp_password will be cleared by the email job after sending
                        $lead->delete();

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

                        // Parse API response to get error details
                        $errorBody = json_decode($response->body(), true);
                        $errorMessage = $errorBody['error'] ?? 'Failed to create tenant. Please try again.';

                        // Handle email duplicate error
                        if ($response->status() === 409 && stripos($errorMessage, 'email') !== false) {
                            // Rollback Step 7? or just stay here?
                            // Let's stay on Step 7 but show error.
                            return response()->json([
                                'success' => false,
                                'message' => 'This email address is already registered.',
                                'errors' => [
                                    'email' => ['This email address is already registered.'],
                                ],
                            ], 422);
                        }

                        // Generic error for other cases
                        return response()->json([
                            'success' => false,
                            'message' => $errorMessage ?: 'Failed to create tenant. Please try again.',
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
        if (!in_array($step, $completedSteps)) {
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

        if (!$email) {
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
        if (!$lead || $lead->email !== $email) {
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
            $packageId = Session::get('selected_package_id');
            $lead->notify(new SignupLeadVerifyEmail($packageId));

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
                'message' => 'Failed to send verification email: ' . $e->getMessage() . '. Please check your mail configuration in .env file.',
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
            if (!in_array(1, $completedSteps)) {
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

        // Capture package_id from verification link if present
        if (request()->has('package_id')) {
            $packageId = request('package_id');
            Session::put('selected_package_id', $packageId);
            // Save to database immediately
            $lead->update(['package_id' => $packageId]);
        }

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
        if (!in_array(1, $completedSteps)) {
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

        if (!$email && !$leadId) {
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

        if (!$lead) {
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
            $packageId = Session::get('selected_package_id');
            $lead->notify(new SignupLeadVerifyEmail($packageId));
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
                'message' => 'Failed to send verification email: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function createCheckoutSession(Request $request)
    {
        $leadId = Session::get('signup_lead_id');
        $lead = SignupLead::find($leadId);

        if (!$lead) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please start over.',
                'redirect' => route('signup', ['basic_info']),
            ], 403);
        }

        $packageId = $request->input('package_id') ?? Session::get('selected_package_id');
        $billingCycle = $request->input('billing_cycle') ?? Session::get('selected_billing_cycle', 'annual');
        $currency = $request->input('currency', 'USD');

        $package = SubscriptionPackage::with([
            'pricings' => function ($query) use ($currency, $billingCycle) {
                $query->where('currency', $currency)->where('billing_cycle', $billingCycle);
            }
        ])->find($packageId);

        if (!$package) {
            return response()->json(['success' => false, 'message' => 'Invalid package selected.'], 400);
        }

        // Enquiry package check
        if ($package->is_enquiry) {
            return response()->json(['success' => false, 'message' => 'This package requires an enquiry.'], 400);
        }

        $pricing = $package->pricings->first();
        if (!$pricing) {
            return response()->json(['success' => false, 'message' => 'Price not found for the selected options.'], 400);
        }

        $unitAmount = $pricing->price;
        $finalAmount = $unitAmount;

        // Apply Coupon
        $couponData = Session::get('selected_coupon');
        $couponCode = null;
        if ($couponData) {
            $couponId = $couponData['id'];
            $coupon = SubscriptionCoupon::find($couponId);

            if ($coupon && $coupon->isValid()) {
                // Re-validate applicability just in case
                $isApplicable = true;
                if ($coupon->applicable_packages === 'specific') {
                    $isApplicable = $coupon->packages()->where('package_id', $package->id)->exists();
                }

                if ($isApplicable) {
                    $discountAmount = 0;
                    if ($coupon->discount_type === 'percentage') {
                        $discountAmount = ($unitAmount * $coupon->discount_value) / 100;
                    } else {
                        $discountAmount = $coupon->discount_value;
                    }

                    if ($discountAmount > $unitAmount) {
                        $discountAmount = $unitAmount;
                    }

                    $finalAmount = $unitAmount - $discountAmount;
                    $couponCode = $coupon->code;
                }
            }
        }

        // Check for Trial or Free Package
        if ($finalAmount <= 0) {
            return response()->json([
                'id' => null,
                'skip_stripe' => true,
                'redirect_url' => route('signup.payment.success', ['session_id' => 'free_pass_' . $lead->id])
            ]);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        // Check for Trial Package (skip Stripe Checkout)
        if ($package->trial_days > 0) {

            // If credit card is NOT required, skip Stripe completely
            if (!$package->credit_card_required) {
                return response()->json([
                    'success' => true,
                    'skip_stripe' => true,
                    'redirect_url' => route('login'),
                ]);
            }

            // Only create Stripe Customer if Credit Card IS required
            try {
                // Create Stripe Customer
                $customer = Customer::create([
                    'email' => $lead->email,
                    'name' => $lead->name,
                    'metadata' => [
                        'lead_id' => $lead->id,
                        'package_id' => $package->id,
                    ],
                ]);

                // Save Stripe Customer ID
                $lead->update(['stripe_customer_id' => $customer->id]);

                // Return redirect to success page for Trial
                return response()->json([
                    'success' => true,
                    'skip_stripe' => true,
                    'redirect_url' => route('signup.payment.success', ['session_id' => 'free_pass_' . $lead->id]),
                ]);
            } catch (\Exception $e) {
                Log::error('Stripe Customer Creation Failed (Trial)', ['error' => $e->getMessage()]);
                return response()->json(['success' => false, 'message' => 'Trial signup failed. Please try again.'], 500);
            }
        }

        try {
            $checkoutSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => $currency,
                            'product_data' => [
                                'name' => $package->name,
                                'description' => $package->description,
                            ],
                            'unit_amount' => (int) round($finalAmount * 100), // Amount in cents
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('signup.payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('signup.payment.cancel'),
                'customer_email' => $lead->email,
                'metadata' => [
                    'signup_lead_id' => $lead->id,
                    'package_id' => $package->id,
                    'billing_cycle' => $billingCycle,
                    'coupon_code' => $couponCode,
                ],
            ]);

            return response()->json(['id' => $checkoutSession->id]);
        } catch (\Exception $e) {
            Log::error('Stripe Checkout Creation Failed', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Payment initialization failed.'], 500);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (str_starts_with($sessionId, 'free_pass_')) {
            $leadId = str_replace('free_pass_', '', $sessionId);
            $lead = SignupLead::with('package')->find($leadId);
            if ($lead) {
                // Set dates for trial/free package
                $startDate = Carbon::now();
                $trialDays = $lead->package->trial_days ?? 14;
                $endDate = $startDate->copy()->addDays($trialDays);

                $lead->update([
                    'package_start_date' => $startDate,
                    'package_end_date' => $endDate
                ]);
            }
            return $this->finalizeSignup($leadId, null, 0);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            if (str_starts_with($sessionId, 'pi_')) {
                // Handle PaymentIntent (Elements)
                $intent = PaymentIntent::retrieve($sessionId);

                if ($intent->status !== 'succeeded') {
                    return redirect()->route('signup.payment.cancel')->with('error', 'Payment not completed.');
                }

                $leadId = $intent->metadata->lead_id;

                // Store payment response and dates
                $lead = SignupLead::with('package')->find($leadId);
                if ($lead) {
                    DB::transaction(function () use ($lead, $intent) {
                        $lead->is_paid = true;
                        if ($intent->customer) {
                            $lead->stripe_customer_id = $intent->customer;
                        }
                        $lead->payment_response = json_encode($intent);

                        // Record Coupon Usage
                        if (isset($intent->metadata->coupon_code) && $intent->metadata->coupon_code) {
                            $couponCode = $intent->metadata->coupon_code;
                            $this->recordCouponUsage($lead, $couponCode, $intent->currency);
                        }

                        // Clear coupon from session
                        Session::forget('selected_coupon');

                        $startDate = Carbon::now();
                        $trialDays = $lead->package->trial_days ?? 0;
                        if ($trialDays > 0) {
                            $endDate = $startDate->copy()->addDays($trialDays);
                        } else {
                            $endDate = $lead->billing_cycle === 'monthly' ? $startDate->copy()->addMonth() : $startDate->copy()->addYear();
                        }
                        $lead->package_start_date = $startDate;
                        $lead->package_end_date = $endDate;

                        $lead->save();
                    });
                }

                return $this->finalizeSignup($leadId, $intent->id, $intent->amount / 100);
            } else {
                // Handle Checkout Session (Legacy/Original)
                $session = StripeSession::retrieve($sessionId);

                if ($session->payment_status !== 'paid') {
                    return redirect()->route('signup.payment.cancel')->with('error', 'Payment not completed.');
                }

                $leadId = $session->metadata->signup_lead_id;

                // Store payment response and dates
                $lead = SignupLead::with('package')->find($leadId);
                if ($lead) {
                    DB::transaction(function () use ($lead, $session) {
                        $lead->is_paid = true;
                        if ($session->customer) {
                            $lead->stripe_customer_id = $session->customer;
                        }
                        $lead->payment_response = json_encode($session);

                        // Record Coupon Usage
                        if (isset($session->metadata->coupon_code) && $session->metadata->coupon_code) {
                            $couponCode = $session->metadata->coupon_code;
                            $this->recordCouponUsage($lead, $couponCode, $session->currency);
                        }

                        // Clear coupon from session
                        Session::forget('selected_coupon');

                        $startDate = Carbon::now();
                        $trialDays = $lead->package->trial_days ?? 0;
                        if ($trialDays > 0) {
                            $endDate = $startDate->copy()->addDays($trialDays);
                        } else {
                            $endDate = $lead->billing_cycle === 'monthly' ? $startDate->copy()->addMonth() : $startDate->copy()->addYear();
                        }
                        $lead->package_start_date = $startDate;
                        $lead->package_end_date = $endDate;

                        $lead->save();
                    });
                }

                return $this->finalizeSignup($leadId, $session->payment_intent, $session->amount_total / 100);
            }
        } catch (\Exception $e) {
            Log::error('Stripe Payment Verification Failed', ['error' => $e->getMessage()]);
            return redirect()->route('signup')->with('error', 'Payment verification failed: ' . $e->getMessage());
        }
    }

    public function paymentCancel()
    {
        Session::forget('selected_coupon');
        return redirect()->route('signup')->with('warning', 'Payment was cancelled.');
    }

    public function processPayment(Request $request)
    {
        $leadId = Session::get('signup_lead_id');
        $lead = SignupLead::find($leadId);

        if (!$lead) {
            return response()->json(['success' => false, 'message' => 'Session expired.'], 403);
        }

        $packageId = $request->input('package_id');
        // Prefer lead's stored billing cycle if available, otherwise fallback to request or default
        $billingCycle = $lead->billing_cycle ?? $request->input('billing_cycle', 'annual');
        $package = SubscriptionPackage::with('pricings')->find($packageId);

        if (!$package)
            return response()->json(['success' => false, 'message' => 'Invalid package.'], 400);

        // Calculate amount
        $currency = $request->input('currency', 'USD');
        $pricing = $package->pricings->where('currency', $currency)->where('billing_cycle', $billingCycle)->first();
        if (!$pricing)
            return response()->json(['success' => false, 'message' => 'Pricing not found.'], 400);

        $amount = $pricing->price;
        $couponCode = $request->input('coupon_code');

        // Apply coupon logic
        if ($couponCode) {
            $coupon = SubscriptionCoupon::where('code', $couponCode)->first();
            if ($coupon && $coupon->isValid()) {
                if ($coupon->discount_type === 'percentage') {
                    $amount = $amount - ($amount * $coupon->discount_value / 100);
                } else {
                    $amount = $amount - $coupon->discount_value;
                }
            }
        }
        $amount = max(0, $amount);

        // Handle Free/Trial directly
        if ($amount <= 0) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('signup.payment.success', ['session_id' => 'free_pass_' . $leadId])
            ]);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        // Check for Trial Package (skip Stripe PaymentIntent)
        if ($package->trial_days > 0) {
            try {
                $paymentMethodId = $request->input('payment_method_id');

                // Create Stripe Customer
                $customerData = [
                    'email' => $lead->email,
                    'name' => $lead->name,
                    'metadata' => [
                        'lead_id' => $lead->id,
                        'package_id' => $package->id,
                    ],
                ];

                // Attach payment method if provided
                if ($paymentMethodId) {
                    $customerData['payment_method'] = $paymentMethodId;
                    $customerData['invoice_settings'] = ['default_payment_method' => $paymentMethodId];
                }

                $customer = Customer::create($customerData);

                // Save Stripe Customer ID
                $lead->update(['stripe_customer_id' => $customer->id]);

                // Return redirect to success page for Trial
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('signup.payment.success', ['session_id' => 'free_pass_' . $lead->id]),
                ]);
            } catch (\Exception $e) {
                Log::error('Stripe Customer Creation Failed (Trial Process)', ['error' => $e->getMessage()]);
                return response()->json(['success' => false, 'message' => 'Trial signup failed. Please try again.'], 500);
            }
        }

        try {
            $paymentMethodId = $request->input('payment_method_id');

            // Ensure Stripe Customer exists
            if (!$lead->stripe_customer_id) {
                try {
                    $customer = Customer::create([
                        'email' => $lead->email,
                        'name' => $lead->name,
                        'metadata' => [
                            'lead_id' => $lead->id,
                        ],
                    ]);
                    $lead->update(['stripe_customer_id' => $customer->id]);
                } catch (\Exception $e) {
                    Log::error('Stripe Customer Creation Failed in processPayment', ['error' => $e->getMessage()]);
                    // Proceed without customer? Or fail? Best to fail for subscription
                    return response()->json(['success' => false, 'message' => 'Failed to initialize customer.'], 500);
                }
            }

            // Create PaymentIntent
            $intent = PaymentIntent::create([
                'amount' => (int) round($amount * 100),
                'currency' => strtolower($currency),
                'customer' => $lead->stripe_customer_id, // Attach Customer
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true, // Attempt to confirm immediately
                'description' => "Subscription for {$package->name} ({$billingCycle})",
                'metadata' => [
                    'lead_id' => $leadId,
                    'package_id' => $packageId,
                    'coupon_code' => $couponCode
                ],
                'receipt_email' => $lead->email,
                'return_url' => route('signup.payment.success'),
                'setup_future_usage' => 'off_session', // Optimized for subscriptions
            ]);

            return $this->generatePaymentResponse($intent);
        } catch (CardException $e) {
            return response()->json(['success' => false, 'message' => $e->getError()->message]);
        } catch (\Exception $e) {
            Log::error('Stripe Payment Failed', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Payment failed: ' . $e->getMessage()]);
        }
    }

    private function generatePaymentResponse($intent)
    {
        if ($intent->status === 'requires_action' && $intent->next_action->type === 'use_stripe_sdk') {
            return response()->json([
                'requires_action' => true,
                'payment_intent_client_secret' => $intent->client_secret
            ]);
        } else if ($intent->status === 'succeeded') {
            return response()->json(['success' => true, 'redirect_url' => route('signup.payment.success', ['session_id' => $intent->id])]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid PaymentIntent status']);
        }
    }

    private function finalizeSignup($leadId, $paymentIntentId, $amountPaid)
    {
        $lead = SignupLead::with('package')->find($leadId);
        if (!$lead) {
            return redirect()->route('signup')->with('error', 'Lead not found.');
        }

        // Provision tenant in external system
        $provisionResult = $this->provisionExternalTenant($lead);

        if (!$provisionResult['success']) {
            // Check if it was a duplicate email error (which means they are already provisioned)
            // If so, we might still want to show success, or at least a specific error.
            // But for safety, we show the error.
            return redirect()->route('signup')->with('error', 'Payment processed, but account setup failed: ' . $provisionResult['message']);
        }

        // Determine context (Payment vs Trial)
        $isTrial = $amountPaid <= 0;
        $headerMessage = $isTrial ? 'Trial Activated Successfully!' : 'Payment Successful!';
        $bodyMessage = 'Thank you for signing up. Your account has been activated successfully.';

        // Fetch domain from external database
        $redirectUrl = 'https://' . $lead->domain_name . '.qwaiting.com'; // Default fallback

        try {
            // Try to find the domain in the external domains table
            // We match against likely variations or just the subdomain part if that's how it's stored
            $externalDomain = DB::connection('mysql_external')
                ->table('domains')
                ->where('domain', $lead->domain_name) // Check strict subdomain match first
                ->orWhere('domain', $lead->domain_name . '.qwaiting.com')
                ->orWhere('domain', $lead->domain_name . '.localhost')
                ->first();

            if ($externalDomain) {
                // Construct full URL. Assuming 'domain' column stores "foo.qwaiting.com"
                // Check if it already has http/https
                $dbDomain = $externalDomain->domain;
                if (str_starts_with($dbDomain, 'http')) {
                    $redirectUrl = $dbDomain;
                } else {
                    $redirectUrl = (app()->isLocal() ? 'http://' : 'https://') . $dbDomain;
                }
            } else {
                // If not found in domains table, construct it manually based on environment
                $baseDomain = config('app.url'); // e.g., https://qwaiting.com or http://localhost
                // This might be tricky if app.url includes path. 
                // Safest default for now:
                if (app()->isLocal()) {
                    $redirectUrl = 'http://' . $lead->domain_name . '.localhost';
                } else {
                    $redirectUrl = 'https://' . $lead->domain_name . '.qwaiting.com';
                }
            }
        } catch (\Exception $e) {
            Log::error('Failed to fetch domain for redirection', ['error' => $e->getMessage()]);
            // Keep default fallback
        }

        return view('website.auth.signup_success', [
            'lead' => $lead,
            'headerMessage' => $headerMessage,
            'bodyMessage' => $bodyMessage,
            'redirectUrl' => $redirectUrl
        ]);
    }

    /**
     * Provision tenant in external system (API call + DB sync)
     */
    private function provisionExternalTenant(SignupLead $lead)
    {
        try {
            // Extract phone_code and phone from phone_number
            $phoneNumber = trim($lead->phone_number ?? '');
            $phoneParts = explode(' ', $phoneNumber, 2);
            $phoneCode = $phoneParts[0] ?? '';
            $phone = isset($phoneParts[1]) ? trim($phoneParts[1]) : '';

            // Fallback: if no space found, try to extract code from start
            if (empty($phone) && !empty($phoneNumber)) {
                if (preg_match('/^(\+\d{1,4})\s*(.+)$/', $phoneNumber, $matches)) {
                    $phoneCode = $matches[1];
                    $phone = $matches[2];
                } else {
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
                'package_id' => $lead->package_id,
                'additional_info' => [
                    'role' => $lead->role,
                    'website' => $lead->website,
                    'usage_preference' => $lead->usage_preference,
                    'industry' => $lead->industry,
                    'footfall' => $lead->footfall,
                    'current_solution' => $lead->current_solution,
                    'signup_step' => 7,
                ],
            ];

            // Call external API
            $response = Http::post('https://qwaiting-ai.thevistiq.com/api/create/tenant', $apiData);

            if ($response->successful()) {
                // Update email_verified_at in external database users table
                try {
                    $updated = DB::connection('mysql_external')
                        ->table('users')
                        ->where('email', $lead->email)
                        ->update(['email_verified_at' => now()]);

                    if ($updated) {
                        Log::info('Updated email_verified_at in external database', [
                            'lead_id' => $lead->id,
                            'email' => $lead->email,
                        ]);
                    }
                } catch (\Exception $e) {
                    Log::error('Failed to update email_verified_at in external database', [
                        'lead_id' => $lead->id,
                        'email' => $lead->email,
                        'error' => $e->getMessage(),
                    ]);
                    // Continue execution, this is not a hard failure
                }

                // Update Stripe details in external database domains table
                if ($lead->stripe_customer_id) {
                    try {
                        $paymentData = $lead->payment_response ? json_decode($lead->payment_response, true) : [];
                        $pmType = null;
                        $pmLastFour = null;

                        // Try to extract card details from payment response
                        // Try to extract card details from payment response
                        if (!empty($paymentData)) {
                            // 1. Direct extraction from expanded object in response
                            if (isset($paymentData['charges']['data'][0]['payment_method_details']['card'])) {
                                $card = $paymentData['charges']['data'][0]['payment_method_details']['card'];
                                $pmType = $card['brand'] ?? null;
                                $pmLastFour = $card['last4'] ?? null;
                            } elseif (isset($paymentData['payment_method_details']['card'])) {
                                $card = $paymentData['payment_method_details']['card'];
                                $pmType = $card['brand'] ?? null;
                                $pmLastFour = $card['last4'] ?? null;
                            }

                            // 2. If extraction failed, try fetching via Stripe API
                            if (!$pmType || !$pmLastFour) {
                                try {
                                    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

                                    $paymentMethodId = null;

                                    // Identify Payment Method ID from response
                                    if (isset($paymentData['payment_method']) && is_string($paymentData['payment_method'])) {
                                        $paymentMethodId = $paymentData['payment_method'];
                                    } elseif (isset($paymentData['payment_intent']) && is_string($paymentData['payment_intent'])) {
                                        // It's a Session or similar with a PI reference
                                        $pi = \Stripe\PaymentIntent::retrieve($paymentData['payment_intent']);
                                        if ($pi && $pi->payment_method) {
                                            $paymentMethodId = $pi->payment_method;
                                        }
                                    } elseif (isset($paymentData['object']) && $paymentData['object'] === 'payment_intent' && isset($paymentData['id'])) {
                                        // It's a PaymentIntent object itself but maybe without expanded method
                                        $pi = \Stripe\PaymentIntent::retrieve($paymentData['id']);
                                        if ($pi && $pi->payment_method) {
                                            $paymentMethodId = $pi->payment_method;
                                        }
                                    }

                                    // Fetch PaymentMethod details
                                    if ($paymentMethodId) {
                                        $pm = \Stripe\PaymentMethod::retrieve($paymentMethodId);
                                        if ($pm && $pm->card) {
                                            $pmType = $pm->card->brand;
                                            $pmLastFour = $pm->card->last4;
                                        }
                                    } else {
                                        // Fallback: Check Customer's default payment method
                                        if ($lead->stripe_customer_id) {
                                            $customer = \Stripe\Customer::retrieve($lead->stripe_customer_id);
                                            if ($customer->invoice_settings->default_payment_method) {
                                                $pm = \Stripe\PaymentMethod::retrieve($customer->invoice_settings->default_payment_method);
                                                if ($pm && $pm->card) {
                                                    $pmType = $pm->card->brand;
                                                    $pmLastFour = $pm->card->last4;
                                                }
                                            }
                                        }
                                    }
                                } catch (\Exception $e) {
                                    Log::warning('Failed to fetch PaymentMethod from Stripe API', ['error' => $e->getMessage()]);
                                }
                            }
                        }

                        // Update domains table
                        // We check for domain variations similar to how we search for redirection
                        $domainUpdated = DB::connection('mysql_external')
                            ->table('domains')
                            ->where(function ($query) use ($lead) {
                                $query->where('domain', $lead->domain_name)
                                    ->orWhere('domain', $lead->domain_name . '.qwaiting.com')
                                    ->orWhere('domain', $lead->domain_name . '.localhost');
                            })
                            ->update([
                                'stripe_id' => $lead->stripe_customer_id,
                                'stripe_email' => $lead->email,
                                'pm_type' => $pmType,
                                'pm_last_four' => $pmLastFour
                            ]);

                        if ($domainUpdated) {
                            Log::info('Updated Stripe details in external domains table', [
                                'lead_id' => $lead->id,
                                'domain' => $lead->domain_name,
                                'stripe_id' => $lead->stripe_customer_id
                            ]);
                        } else {
                            Log::warning('Domain not found for Stripe details update', [
                                'lead_id' => $lead->id,
                                'domain' => $lead->domain_name
                            ]);
                        }
                    } catch (\Exception $e) {
                        Log::error('Failed to update Stripe details in external domains table', [
                            'lead_id' => $lead->id,
                            'error' => $e->getMessage(),
                            'trace' => $e->getTraceAsString()
                        ]);
                    }
                }

                // Store Subscription Details in External DB
                Log::info('Checking payment response for external storage', [
                    'lead_id' => $lead->id,
                    'has_payment_response' => !empty($lead->payment_response)
                ]);

                if ($lead->payment_response) {
                    $paymentData = json_decode($lead->payment_response, true);
                    if ($paymentData) {
                        Log::info('Calling storeSubscriptionDetailsInExternalDb');
                        $this->storeSubscriptionDetailsInExternalDb($lead, $paymentData);
                    } else {
                        Log::warning('Payment response decode failed', ['response' => $lead->payment_response]);
                    }
                } else {
                    Log::warning('No payment response found on lead during provisioning', ['lead_id' => $lead->id]);
                }

                // Send registration complete email
                try {
                    $sequenceService = new SequenceEmailService;
                    $lead->refresh(); // Refresh to ensure we have latest data

                    Log::info('Sending registration complete email (Payment Success)', [
                        'lead_id' => $lead->id,
                    ]);

                    $sequenceService->sendEventBasedEmails('after_verification', $lead);
                    $sequenceService->sendEventBasedEmails('immediate', $lead);
                } catch (\Exception $e) {
                    Log::error('Failed to send registration complete email', [
                        'lead_id' => $lead->id,
                        'error' => $e->getMessage(),
                    ]);
                }

                // Soft delete the lead
                $lead->delete();

                // Destroy all signup-related session data
                Session::forget('signup_lead_id');
                Session::forget('signup_form_data');
                Session::forget('completed_steps');
                Session::forget('from_verification_redirect');

                return ['success' => true];
            } else {
                Log::error('External API call failed during payment success', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'lead_id' => $lead->id,
                ]);

                $errorBody = json_decode($response->body(), true);
                $errorMessage = $errorBody['error'] ?? 'Failed to create tenant.';

                return ['success' => false, 'message' => $errorMessage];
            }
        } catch (\Exception $e) {
            Log::error('External API exception during payment success', [
                'message' => $e->getMessage(),
                'lead_id' => $lead->id,
                'trace' => $e->getTraceAsString(),
            ]);

            return ['success' => false, 'message' => 'An error occurred during account setup.'];
        }
    }

    private function recordCouponUsage($lead, $couponCode, $currency = 'USD')
    {
        // Prevent duplicate usage recording
        // We check if this lead already has a usage record for this package
        // This acts as an idempotency check for page refreshes
        $existingUsage = SubscriptionCouponUsage::where('user_email', $lead->email)
            ->where('package_id', $lead->package_id)
            ->exists();

        if ($existingUsage) {
            return;
        }

        $coupon = SubscriptionCoupon::where('code', $couponCode)->first();
        if (!$coupon) {
            return;
        }

        // Calculate discount amount
        $package = $lead->package;
        $pricing = $package->pricings
            ->where('currency', strtoupper($currency))
            ->where('billing_cycle', $lead->billing_cycle)
            ->first();

        $price = $pricing ? $pricing->price : 0;
        $discountAmount = 0;

        if ($coupon->discount_type === 'percentage') {
            $discountAmount = ($price * $coupon->discount_value) / 100;
        } else {
            $discountAmount = $coupon->discount_value;
        }

        // Cap discount
        if ($discountAmount > $price) {
            $discountAmount = $price;
        }

        SubscriptionCouponUsage::create([
            'coupon_id' => $coupon->id,
            'package_id' => $lead->package_id,
            'user_id' => null, // SignupLead is not a User yet
            'external_user_id' => null,
            'user_email' => $lead->email,
            'user_name' => $lead->name,
            'discount_amount' => $discountAmount,
            'currency' => strtoupper($currency),
            'used_at' => now(),
        ]);

        // Increment coupon usage count - REMOVED (calculated dynamically via usages relationship)
        // $coupon->increment('times_used');
    }

    public function leadDetails(Request $request)
    {
        // Get lead ID from session as preferred source of truth
        $leadId = Session::get('signup_lead_id');

        if (!$leadId) {
            return response()->json([
                'success' => false,
                'message' => 'No active signup session found.'
            ]);
        }

        $lead = SignupLead::find($leadId);

        if (!$lead) {
            return response()->json([
                'success' => false,
                'message' => 'Lead not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'lead' => [
                'id' => $lead->id,
                'name' => $lead->name,
                'email' => $lead->email,
                'company_name' => $lead->company_name,
                'phone_number' => $lead->phone_number,
                'country_code' => $lead->country_code,
                'domain_name' => $lead->domain_name,
                'usage_preference' => $lead->usage_preference,
                'industry' => $lead->industry,
                'footfall' => $lead->footfall,
                'current_solution' => $lead->current_solution,
            ]
        ]);
    }

    private function storeSubscriptionDetailsInExternalDb($lead, $paymentData)
    {
        try {
            // 1. Get Domain and Team ID from External DB
            $domainRecord = DB::connection('mysql_external')
                ->table('domains')
                ->where(function ($query) use ($lead) {
                    $query->where('domain', $lead->domain_name)
                        ->orWhere('domain', $lead->domain_name . '.qwaiting.com')
                        ->orWhere('domain', $lead->domain_name . '.localhost');
                })
                ->first();

            if (!$domainRecord) {
                Log::error('Domain not found in external DB for subscription storage', ['lead_id' => $lead->id]);
                return;
            }

            $teamId = $domainRecord->team_id ?? null;
            $domainId = $domainRecord->id;

            if (!$teamId) {
                Log::error('Team ID not found for domain in external DB', ['domain_id' => $domainId]);
                return;
            }

            // --- Stripe Logic Start ---
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            $package = $lead->package;
            $billingCycle = $lead->billing_cycle;
            $currency = $paymentData['currency'] ?? 'USD'; // Default or from payment

            // Determine Price and Interval
            // Note: We need the original package price for the Plan creation, even if user paid discounted amount
            // The subscription will charge this price in future.

            $pricing = $package->pricings->where('currency', strtoupper($currency))->where('billing_cycle', $billingCycle)->first();
            $price = $pricing ? $pricing->price : 0;

            $interval = $billingCycle === 'annual' ? 'year' : 'month'; // 'annual' is the value in DB usually? Check BuySubscription logic: it checks 'yearly'
            // In SignupController Step 6/7, we use 'annual' or 'monthly'.
            // BuySubscription uses 'yearly'. Let's normalize.
            if ($billingCycle === 'annual' || $billingCycle === 'yearly') {
                $interval = 'year';
            } else {
                $interval = 'month';
            }

            // Find or Create Plan
            $existingPlans = \Stripe\Plan::all(['limit' => 100]);
            $plan = null;
            foreach ($existingPlans->data as $existingPlan) {
                if (
                    $existingPlan->amount == ($price * 100) &&
                    $existingPlan->interval === $interval &&
                    strtolower($existingPlan->currency) === strtolower($currency)
                ) {
                    $plan = $existingPlan;
                    break;
                }
            }

            if (!$plan) {
                Log::info('Creating New Stripe Product and Plan');
                $productName = $package->name . ' ' . ucfirst($interval);
                $product = \Stripe\Product::create(['name' => $productName]);
                $plan = \Stripe\Plan::create([
                    'amount' => (int) ($price * 100),
                    'interval' => $interval,
                    'currency' => strtolower($currency),
                    'product' => $product->id,
                ]);
                $productId = $product->id;
                Log::info('New Plan Created', ['plan_id' => $plan->id, 'product_id' => $productId]);
            } else {
                $productId = $plan->product;
                Log::info('Using Existing Plan', ['plan_id' => $plan->id, 'product_id' => $productId]);
            }

            // Create Subscription (Trial / Future Billing)
            // We set trial_end to the package_end_date so it starts billing after the current paid period
            $trialEnd = $lead->package_end_date ? \Carbon\Carbon::parse($lead->package_end_date)->timestamp : now()->addMonth()->timestamp;

            // Safety check: trial_end must be in future (Stripe requires at least 48 hours for trails usually? No, just future).
            // Actually Stripe requires 'trial_end' to be at least 48 hours in the future for *Checkout Sessions*, but for API Subscription explicit creation, it just needs to be future > now.
            // If it's too close, we might skip trial or just set backdate? Use trial_end is safest for "Next Bill Date".
            if ($trialEnd <= time()) {
                $trialEnd = time() + 86400; // Force 1 day future if passed
            }

            Log::info('Attempting to create Subscription', [
                'customer' => $lead->stripe_customer_id,
                'plan' => $plan->id,
                'trial_end' => $trialEnd
            ]);

            $subscription = \Stripe\Subscription::create([
                'customer' => $lead->stripe_customer_id,
                'items' => [['plan' => $plan->id]],
                'trial_end' => $trialEnd,
            ]);

            Log::info('Created Stripe Subscription for External DB', ['subscription_id' => $subscription->id, 'plan_id' => $plan->id]);

            // --- Stripe Logic End ---

            // Use Generated Values
            $subscriptionId = $subscription->id;
            $stripeStatus = $subscription->status; // likely 'trialing'

            // Fix: For paid packages, we treat 'trialing' (used for deferred billing) as 'active'
            // Since this function is only called after a successful payment, we can enforce active status.
            if ($stripeStatus === 'trialing') {
                $stripeStatus = 'active';
            }

            $stripePriceId = $plan->id;

            // Payment Transaction (The one-time payment)
            $transactionId = $paymentData['id'] ?? $subscriptionId;
            if (isset($paymentData['payment_intent'])) {
                $transactionId = $paymentData['payment_intent'];
            }

            $amountPaid = isset($paymentData['amount']) ? $paymentData['amount'] / 100 : 0;
            if (isset($paymentData['amount_total'])) {
                $amountPaid = $paymentData['amount_total'] / 100;
            }

            // Invoice Number
            // Retrieve real invoice from subscription
            $invoiceNumber = null;
            if (!empty($subscription->latest_invoice)) {
                try {
                    $invoiceObj = \Stripe\Invoice::retrieve($subscription->latest_invoice);
                    $invoiceNumber = $invoiceObj->number;
                } catch (\Exception $e) {
                    Log::warning('Failed to retrieve invoice details from Stripe', ['error' => $e->getMessage()]);
                }
            }

            if (!$invoiceNumber) {
                $invoiceNumber = $paymentData['invoice'] ?? ('INV-' . strtoupper(uniqid()));
            }

            // Status
            $dbStatus = 'active'; // Since they paid and sub is created

            // Insert into queue_panel_upgrades
            DB::connection('mysql_external')->table('queue_panel_upgrade')->insert([
                'team_id' => $teamId,
                'inv_num' => $invoiceNumber,
                'package_id' => $lead->package_id,
                'price' => $amountPaid,
                'unit' => $interval, // Stores 'year' or 'month'
                'type' => 'QUEUE',
                'date' => now(),
                'subcription_id' => $subscriptionId,
                'status' => $dbStatus,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert into subscriptions
            $dbSubId = DB::connection('mysql_external')->table('subscriptions')->insertGetId([
                'domain_id' => $domainId,
                'type' => 'QUEUE',
                'stripe_id' => $subscriptionId,
                'stripe_status' => $stripeStatus,
                'stripe_price' => $stripePriceId, // Plan ID
                'quantity' => 1,
                'trial_ends_at' => Carbon::createFromTimestamp($trialEnd),
                'ends_at' => Carbon::createFromTimestamp($trialEnd), // Next billing matches end
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert Subscription Item
            // Get item ID from subscription object
            $stripeItemId = $subscription->items->data[0]->id ?? 'si_fallback';

            DB::connection('mysql_external')->table('subscription_items')->insert([
                'subscription_id' => $dbSubId,
                'stripe_id' => $stripeItemId,
                'stripe_product' => $productId, // Product ID
                'stripe_price' => $price, // Actual Price
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::info('Stored subscription details in external DB', ['team_id' => $teamId, 'domain_id' => $domainId]);
        } catch (\Exception $e) {
            Log::error('Failed to store subscription details in external DB', [
                'error' => $e->getMessage(),
                'lead_id' => $lead->id,
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
