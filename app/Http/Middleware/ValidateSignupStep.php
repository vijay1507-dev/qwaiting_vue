<?php

namespace App\Http\Middleware;

use App\Models\SignupLead;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ValidateSignupStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Restore session from query parameters if coming from email link
        $this->restoreSessionFromQuery($request);

        // Get requested step from URL query parameter
        $requestedStep = $this->getStepFromQuery($request);

        // Step 1 is always accessible
        if ($requestedStep === 1) {
            return $next($request);
        }

        // Restore completed steps from database if available (Self-Healing)
        $leadId = Session::get('signup_lead_id');
        if ($leadId) {
            $lead = SignupLead::find($leadId);
            if ($lead && $lead->hasVerifiedEmail()) {
                $completedSteps = Session::get('completed_steps', []);
                $dbSignupStep = $lead->signup_step ?? 0;

                // Step 1 is always completed if email is verified
                if (!in_array(1, $completedSteps)) {
                    $completedSteps[] = 1;
                }

                // Restore all completed steps up to the signup_step in database
                if ($dbSignupStep >= 1) {
                    for ($s = 2; $s <= $dbSignupStep && $s <= 6; $s++) {
                        if (!in_array($s, $completedSteps)) {
                            $completedSteps[] = $s;
                        }
                    }
                }

                Session::put('completed_steps', $completedSteps);

                Log::info('ValidateSignupStep: Session synced with DB', [
                    'db_step' => $dbSignupStep,
                    'restored_steps' => $completedSteps
                ]);
            }
        }

        // Get completed steps from session
        $completedSteps = Session::get('completed_steps', []);

        Log::info('ValidateSignupStep: Checking step access', [
            'requested_step' => $requestedStep,
            'completed_steps' => $completedSteps,
            'signup_lead_id' => Session::get('signup_lead_id'),
        ]);

        // Check if user has completed all previous steps
        for ($i = 1; $i < $requestedStep; $i++) {
            if (!in_array($i, $completedSteps)) {
                // User hasn't completed a previous step, redirect to start
                Log::warning('ValidateSignupStep: Step access denied', [
                    'requested_step' => $requestedStep,
                    'missing_step' => $i,
                    'completed_steps' => $completedSteps,
                ]);
                return redirect()->route('signup');
            }
        }

        // For steps 2-6, email must be verified (step 1 completion includes email verification)
        if ($requestedStep >= 2) {
            $leadId = Session::get('signup_lead_id');
            if (!$leadId) {
                // No lead ID, redirect to start
                return redirect()->route('signup');
            }

            $lead = $lead ?? SignupLead::find($leadId);
            if (!$lead || !$lead->hasVerifiedEmail()) {
                // Email not verified, redirect to start
                return redirect()->route('signup');
            }
        }

        // User can access this step
        return $next($request);
    }

    /**
     * Get step number from URL query parameter
     */
    private function getStepFromQuery(Request $request): int
    {
        $queryParam = $request->query();
        $stepQueryMap = [
            'basic_info' => 1,
            'business_info' => 2,
            'usage_preference' => 3,
            'industry' => 4,
            'daily_footfall' => 5,
            'current_solution' => 6,
        ];

        Log::info('ValidateSignupStep: Parsing query parameters', [
            'all_query_params' => $queryParam,
        ]);

        foreach ($queryParam as $key => $value) {
            // Handle both formats: ?usage_preference and ?usage_preference=1
            if (isset($stepQueryMap[$key])) {
                Log::info('ValidateSignupStep: Found step in query', [
                    'key' => $key,
                    'step' => $stepQueryMap[$key],
                ]);

                return $stepQueryMap[$key];
            }
        }

        Log::info('ValidateSignupStep: No step found in query, defaulting to step 1');

        return 1; // Default to step 1
    }

    /**
     * Restore session from query parameters (hash only, no lead_id) if present
     */
    private function restoreSessionFromQuery(Request $request): void
    {
        $queryHash = $request->query('hash');

        Log::info('ValidateSignupStep: Checking query parameters', [
            'hash_present' => !empty($queryHash),
        ]);

        if ($queryHash) {
            // Find user by matching hash (hash = sha1(email + id + app_key))
            // Only check incomplete signups (signup_step < 6) for efficiency
            $leads = SignupLead::whereNotNull('email_verified_at')
                ->where('email', '!=', '')
                ->where('signup_step', '<', 6)
                ->get();

            $lead = null;
            foreach ($leads as $candidateLead) {
                $expectedHash = sha1($candidateLead->email . $candidateLead->id . config('app.key'));
                if ($expectedHash === $queryHash) {
                    $lead = $candidateLead;
                    break;
                }
            }

            if ($lead && $lead->hasVerifiedEmail()) {
                // Restore signup_lead_id
                Session::put('signup_lead_id', $lead->id);

                // Restore completed steps based on database signup_step
                $completedSteps = Session::get('completed_steps', []);
                $dbSignupStep = $lead->signup_step ?? 0;

                // Step 1 is always completed if email is verified
                if (!in_array(1, $completedSteps)) {
                    $completedSteps[] = 1;
                }

                // Restore all completed steps up to the signup_step in database
                if ($dbSignupStep >= 1) {
                    for ($step = 2; $step <= $dbSignupStep && $step <= 6; $step++) {
                        if (!in_array($step, $completedSteps)) {
                            $completedSteps[] = $step;
                        }
                    }
                }

                Session::put('completed_steps', $completedSteps);

                Log::info('ValidateSignupStep: Session restored', [
                    'signup_lead_id' => $lead->id,
                    'db_signup_step' => $dbSignupStep,
                    'completed_steps' => $completedSteps,
                ]);
            } else {
                Log::warning('ValidateSignupStep: Failed to restore session', [
                    'lead_found' => !is_null($lead),
                    'email_verified' => $lead ? $lead->hasVerifiedEmail() : false,
                ]);
            }
        }
    }
}
