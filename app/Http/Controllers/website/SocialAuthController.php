<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\SignupLead;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            return $this->handleSocialUser($googleUser, 'google');
        } catch (\Exception $e) {
            Log::error('Google OAuth error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return redirect()->route('website-login')
                ->with('error', 'Failed to authenticate with Google: ' . $e->getMessage());
        }
    }

    /**
     * Redirect to Microsoft OAuth
     */
    public function redirectToMicrosoft(): RedirectResponse
    {
        return Socialite::driver('microsoft')->redirect();
    }

    /**
     * Handle Microsoft OAuth callback
     */
    public function handleMicrosoftCallback(): RedirectResponse
    {
        try {
            $microsoftUser = Socialite::driver('microsoft')->user();
            
            return $this->handleSocialUser($microsoftUser, 'microsoft');
        } catch (\Exception $e) {
            Log::error('Microsoft OAuth error: ' . $e->getMessage());
            return redirect()->route('website-login')
                ->with('error', 'Failed to authenticate with Microsoft. Please try again.');
        }
    }

    /**
     * Handle social user authentication
     */
    private function handleSocialUser($socialUser, string $provider): RedirectResponse
    {
        try {
            $email = $socialUser->getEmail();
            $name = $socialUser->getName();
            
            if (!$email) {
                return redirect()->route('website-login')
                    ->with('error', 'Unable to retrieve email from ' . ucfirst($provider) . ' account.');
            }

            // Validate email domain (only Gmail and work emails allowed)
            $domain = substr(strrchr($email, "@"), 1);
            $domain = strtolower($domain);
            
            // Check if it's Gmail
            $isGmail = in_array($domain, ['gmail.com', 'googlemail.com']);
            
            // Check if it's Microsoft (outlook.com, hotmail.com, live.com, etc.)
            $microsoftDomains = ['outlook.com', 'hotmail.com', 'live.com', 'msn.com'];
            $isMicrosoftPersonal = in_array($domain, $microsoftDomains);
            
            // For Microsoft provider, allow work emails (not personal Microsoft emails)
            if ($provider === 'microsoft' && $isMicrosoftPersonal) {
                return redirect()->route('website-login')
                    ->with('error', 'Please use a work email address or Gmail account. Personal Microsoft email accounts are not allowed.');
            }
            
            // For Google provider, only allow Gmail
            if ($provider === 'google' && !$isGmail) {
                return redirect()->route('website-login')
                    ->with('error', 'Please use a Gmail account or work email address.');
            }
            
            // Check if it's a work email (not in free email providers list)
            $freeEmailProviders = [
                'yahoo.com', 'yahoo.co.uk', 'yahoo.fr',
                'aol.com', 'icloud.com', 'me.com', 'mac.com',
                'protonmail.com', 'proton.me', 'zoho.com',
                'mail.com', 'gmx.com', 'gmx.de', 'gmx.net',
            ];
            
            $isWorkEmail = !in_array($domain, $freeEmailProviders) && !$isGmail && !$isMicrosoftPersonal;
            
            // Only allow Gmail or work emails
            if (!$isGmail && !$isWorkEmail) {
                return redirect()->route('website-login')
                    ->with('error', 'Please use a Gmail account or work email address.');
            }

            // Check if a SignupLead already exists with this email (including soft-deleted)
            $lead = SignupLead::withTrashed()->where('email', $email)->first();

            if (!$lead) {
                try {
                    // Create new SignupLead record (step 1 data)
                    $lead = SignupLead::create([
                        'name' => $name ?? 'User',
                        'email' => $email,
                        'phone_number' => null, // Not available from social login
                        'password' => Hash::make(Str::random(32)), // Random password for social login users
                        'signup_step' => 1,
                        'email_verified_at' => now(), // Social login emails are pre-verified
                    ]);
                    
                    // Verify the record was created
                    if (!$lead || !$lead->id) {
                        throw new \Exception('SignupLead was not created successfully');
                    }
                    
                    Log::info('SignupLead created via social login', [
                        'lead_id' => $lead->id,
                        'email' => $email,
                        'provider' => $provider,
                        'name' => $name,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to create SignupLead via social login', [
                        'email' => $email,
                        'provider' => $provider,
                        'name' => $name,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                    ]);
                    throw $e; // Re-throw to be caught by outer catch
                }
            } else {
                // Update existing lead if needed
                try {
                    $updateData = [];
                    
                    if (!$lead->email_verified_at) {
                        $updateData['email_verified_at'] = now();
                    }
                    
                    // Update name if it's different
                    if ($lead->name !== $name && $name) {
                        $updateData['name'] = $name;
                    }
                    
                    // Update signup_step if it's not set or is 0
                    if (!$lead->signup_step || $lead->signup_step < 1) {
                        $updateData['signup_step'] = 1;
                    }
                    
                    if (!empty($updateData)) {
                        $lead->update($updateData);
                        $lead->refresh(); // Refresh to get updated data
                        Log::info('SignupLead updated via social login', [
                            'lead_id' => $lead->id,
                            'email' => $email,
                            'provider' => $provider,
                            'updates' => $updateData,
                        ]);
                    }
                    
                    // If lead was soft-deleted, restore it
                    if ($lead->trashed()) {
                        $lead->restore();
                        Log::info('SignupLead restored via social login', [
                            'lead_id' => $lead->id,
                            'email' => $email,
                            'provider' => $provider,
                        ]);
                    }
                } catch (\Exception $e) {
                    Log::error('Failed to update SignupLead via social login', [
                        'lead_id' => $lead->id ?? null,
                        'email' => $email,
                        'provider' => $provider,
                        'error' => $e->getMessage(),
                    ]);
                    throw $e; // Re-throw to be caught by outer catch
                }
            }

            // Verify lead exists and has an ID
            if (!$lead || !$lead->id) {
                Log::error('SignupLead is invalid after creation/update', [
                    'email' => $email,
                    'provider' => $provider,
                    'lead_exists' => $lead ? 'yes' : 'no',
                    'lead_id' => $lead->id ?? 'null',
                ]);
                throw new \Exception('Failed to create or retrieve SignupLead record');
            }

            // Store lead ID in session
            Session::put('signup_lead_id', $lead->id);
            
            // Mark step 1 as completed since email is verified
            $completedSteps = Session::get('completed_steps', []);
            if (!in_array(1, $completedSteps)) {
                $completedSteps[] = 1;
                Session::put('completed_steps', $completedSteps);
            }

            Log::info('Social login successful, redirecting to step 2', [
                'lead_id' => $lead->id,
                'email' => $email,
                'provider' => $provider,
            ]);

            // Redirect to step 2 of signup process
            return redirect()->route('signup', ['business_info']);
            
        } catch (\Exception $e) {
            Log::error('Social authentication error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'provider' => $provider ?? 'unknown',
                'email' => $email ?? 'unknown',
            ]);
            return redirect()->route('website-login')
                ->with('error', 'An error occurred during authentication: ' . $e->getMessage());
        }
    }
}
