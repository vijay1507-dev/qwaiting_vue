<?php

namespace App\Http\Middleware;

use App\Models\SignupLead;
use Closure;
use Illuminate\Http\Request;
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
        // Get requested step from URL query parameter
        $requestedStep = $this->getStepFromQuery($request);
        
        // Step 1 is always accessible
        if ($requestedStep === 1) {
            return $next($request);
        }
        
        // Get completed steps from session
        $completedSteps = Session::get('completed_steps', []);
        
        // Check if user has completed all previous steps
        for ($i = 1; $i < $requestedStep; $i++) {
            if (!in_array($i, $completedSteps)) {
                // User hasn't completed a previous step, show 404
                abort(404);
            }
        }
        
        // For steps 2-6, email must be verified (step 1 completion includes email verification)
        if ($requestedStep >= 2) {
            $leadId = Session::get('signup_lead_id');
            if (!$leadId) {
                // No lead ID, show 404
                abort(404);
            }
            
            $lead = SignupLead::find($leadId);
            if (!$lead || !$lead->hasVerifiedEmail()) {
                // Email not verified, show 404
                abort(404);
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
        
        foreach ($queryParam as $key => $value) {
            if (isset($stepQueryMap[$key])) {
                return $stepQueryMap[$key];
            }
        }
        
        return 1; // Default to step 1
    }
}
