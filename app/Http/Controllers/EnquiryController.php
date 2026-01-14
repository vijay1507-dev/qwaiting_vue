<?php

namespace App\Http\Controllers;

use App\Mail\AdminNewEnquiry;
use App\Mail\EnquirySubmitted;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PackageEnquiry;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'mobile_number' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'interested_package' => 'required|string|max:255',
            'expected_start_date' => 'required|date',
            'num_users_branches' => 'required|string|max:255',
            'billing_cycle' => 'required|in:Monthly,Yearly',
            'features_required' => 'nullable|array',
            'custom_notes' => 'nullable|string',
            'contact_method' => 'required|in:Call,Email,WhatsApp',
            'best_time_to_contact' => 'required|string|max:255',
            'consent' => 'accepted',
        ]);

        try {
            // Store enquiry
            $enquiry = PackageEnquiry::create([
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'mobile_number' => $validated['mobile_number'],
                'company_name' => $validated['company_name'],
                'interested_package' => $validated['interested_package'],
                'expected_start_date' => $validated['expected_start_date'],
                'num_users_branches' => $validated['num_users_branches'],
                'billing_cycle' => $validated['billing_cycle'],
                'features_required' => $validated['features_required'] ?? [],
                'custom_notes' => $validated['custom_notes'] ?? null,
                'contact_method' => $validated['contact_method'],
                'best_time_to_contact' => $validated['best_time_to_contact'] ?? null,
                'consent' => true,
            ]);

            /**
             * ==========================
             * Send User Confirmation Mail (Queued - send immediately)
             * ==========================
             */
            try {
                Mail::to($enquiry->email)
                    ->later(now()->addSeconds(5), new EnquirySubmitted($enquiry));

                Log::info('User confirmation email queued for: ' . $enquiry->email);
            } catch (\Exception $e) {
                Log::warning('Failed to queue user enquiry email: ' . $e->getMessage());
            }

            /**
             * ==========================
             * Send Admin Notification Mail (Queued with 2 minute delay)
             * ==========================
             */
            try {
                $adminEmails = User::where('role', 'Administrator')
                    ->pluck('email')
                    ->toArray();

                Log::info('Admin enquiry emails:', $adminEmails);

                if (!empty($adminEmails)) {
                    // Delay admin email by 2 minutes to ensure rate limit compliance
                    Mail::to($adminEmails)
                        ->later(now()->addMinutes(2), new AdminNewEnquiry($enquiry));

                    Log::info('Admin notification email queued for ' . count($adminEmails) . ' admin(s)');
                } else {
                    Log::warning('No administrators found to send enquiry notification');
                }
            } catch (\Exception $e) {
                Log::warning('Failed to queue admin enquiry email: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Your enquiry has been successfully submitted.',
            ]);
        } catch (\Exception $e) {
            Log::error('Enquiry Submission Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }
    public function create()
    {
        $packages = \App\Models\SubscriptionPackage::where('status', 'active')->get(['id', 'name']);
        $features = \App\Models\SubscriptionFeature::where('status', 'active')->get(['id', 'name']);

        return view('website.enquiry.index', compact('packages', 'features'));
    }


    public function index()
    {
        $enquiries = PackageEnquiry::latest()->paginate(10);
        return Inertia::render('PackageEnquiries/Index', [
            'enquiries' => $enquiries
        ]);
    }

    public function show($id)
    {
        $enquiry = PackageEnquiry::findOrFail($id);
        return Inertia::render('PackageEnquiries/Show', [
            'enquiry' => $enquiry
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Open,Closed',
        ]);

        $enquiry = PackageEnquiry::findOrFail($id);
        $enquiry->update(['status' => $request->status]);

        return to_route('package-enquiries.index');
    }
}
