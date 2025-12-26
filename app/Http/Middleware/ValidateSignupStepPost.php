<?php

namespace App\Http\Middleware;

use App\Models\SignupLead;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        
        // Get completed steps from session
        $completedSteps = Session::get('completed_steps', []);
        
        // Check if user has completed all previous steps
        for ($i = 1; $i < $step; $i++) {
            if (!in_array($i, $completedSteps)) {
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
        
        // User can access this step
        return $next($request);
    }
}

