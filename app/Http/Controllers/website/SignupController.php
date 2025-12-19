<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupStepRequest;
use App\Models\SignupLead;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SignupController extends Controller
{
    public function index(): View
    {
        return view('website.auth.signup');
    }

    public function storeStep(SignupStepRequest $request, int $step): JsonResponse
    {
        $validated = $request->validated();

        if ($step === 1) {
            $lead = SignupLead::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['country_code'].' '.$validated['phone_number'],
                'password' => Hash::make($validated['password']),
                'signup_step' => 1,
            ]);

            Session::put('signup_lead_id', $lead->id);

            return response()->json(['success' => true, 'next_step' => 2]);
        }

        $lead = SignupLead::find(Session::get('signup_lead_id'));

        if ($step === 6) {
            return DB::transaction(function () use ($lead, $validated) {
                $lead->update(array_merge($validated, ['signup_step' => 6]));

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
                ];

                // Call external API
                try {
                    $response = Http::post('https://qwaiting-ai.thevistiq.com/api/create/tenant', $apiData);

                    if ($response->successful()) {
                        // Soft delete the lead after successful API call
                        $lead->delete();

                        $user = User::create([
                            'name' => $lead->name,
                            'email' => $lead->email,
                            'password' => $lead->password,
                        ]);

                        Auth::login($user);
                        Session::forget('signup_lead_id');

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

        return response()->json(['success' => true, 'next_step' => $step + 1]);
    }
}
