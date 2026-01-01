<?php

namespace App\Http\Middleware;

use App\Models\SignupLead;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ValidateSignupStepPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get step from route parameter
        $step = (int) $request->route('step');

        // Step 1 is always accessible
        if ($step === 1) {
            return $next($request);
        }

        // Restore completed steps from database if available
        $leadId = Session::get('signup_lead_id');
        Log::info('ValidateSignupStepPost Check:', ['step' => $step, 'session_lead_id' => $leadId]);

        if ($leadId) {
            $lead = SignupLead::find($leadId);
            if ($lead && $lead->hasVerifiedEmail()) {
                $completedSteps = Session::get('completed_steps', []);
                $dbSignupStep = $lead->signup_step ?? 0;

                Log::info('ValidateSignupStepPost Restoration:', [
                    'db_step' => $dbSignupStep,
                    'current_session_steps' => $completedSteps
                ]);

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
                Log::info('ValidateSignupStepPost Restored Steps:', ['steps' => $completedSteps]);
            }
        } else {
            $completedSteps = Session::get('completed_steps', []);
        }

        // Check if user has completed all previous steps
        for ($i = 1; $i < $step; $i++) {
            if (!in_array($i, $completedSteps)) {
                Log::warning('ValidateSignupStepPost Failed:', ['missing_step' => $i, 'completed' => $completedSteps]);
                // User hasn't completed a previous step
                return response()->json([
                    'success' => false,
                    'message' => 'Please complete previous steps first.',
                    'redirect' => route('signup', ['basic_info']),
                ], 403);
            }
        }

        // For steps 2-6, email must be verified (step 1 completion includes email verification)
        if ($step >= 2) {
            if (!$leadId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please complete step 1 and verify your email first.',
                    'redirect' => route('signup', ['basic_info']),
                ], 403);
            }

            $lead = $lead ?? SignupLead::find($leadId);
            if (!$lead || !$lead->hasVerifiedEmail()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please verify your email first.',
                    'redirect' => route('signup', ['basic_info']),
                ], 403);
            }
        }

        // User can access this step
        return $next($request);
    }
}

