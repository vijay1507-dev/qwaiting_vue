<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\StoreCouponRequest;
use App\Http\Requests\Subscription\StoreFeatureRequest;
use App\Http\Requests\Subscription\StorePackageRequest;
use App\Http\Requests\Subscription\StorePricingRequest;
use App\Http\Requests\Subscription\UpdateCouponRequest;
use App\Http\Requests\Subscription\UpdateFeatureRequest;
use App\Http\Requests\Subscription\UpdatePackageConfigurationRequest;
use App\Http\Requests\Subscription\UpdatePackageRequest;
use App\Models\SubscriptionCoupon;
use App\Models\SubscriptionCouponUsage;
use App\Models\SubscriptionFeature;
use App\Models\SubscriptionPackage;
use App\Models\SubscriptionPackageFeature;
use App\Models\SubscriptionPricing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class SubscriptionController extends Controller
{
    /**
     * Display the subscription management index page.
     */
    public function index(Request $request): Response
    {
        $features = SubscriptionFeature::orderBy('name')->get()->map(function ($feature) {
            return [
                'id' => (string) $feature->id,
                'name' => $feature->name,
                'key' => $feature->key,
                'dataType' => $feature->data_type,
                'metered' => (bool) $feature->is_metered,
                'description' => $feature->description,
                'status' => $feature->status,
            ];
        });

        $packages = SubscriptionPackage::orderBy('sort_order')->orderBy('name')
            ->get()
            ->map(function ($package) {
                return [
                    'id' => (string) $package->id,
                    'name' => $package->name,
                    'code' => $package->code,
                    'subtitle' => $package->subtitle,
                    'status' => $package->status,
                    'description' => $package->description,
                    'monthlyEnabled' => $package->monthly_enabled,
                    'annualEnabled' => $package->annual_enabled,
                    'trialDays' => $package->trial_days,
                    'creditCardRequired' => $package->credit_card_required,
                ];
            });

        $coupons = SubscriptionCoupon::orderBy('created_at', 'desc')
            ->get()
            ->map(function ($coupon) {
                $discountDisplay = $coupon->discount_type === 'percentage'
                    ? "{$coupon->discount_value}%"
                    : ($coupon->currency ? "{$coupon->currency}{$coupon->discount_value}" : "\${$coupon->discount_value}");

                return [
                    'id' => (string) $coupon->id,
                    'code' => $coupon->code,
                    'discount' => $discountDisplay,
                    'discountType' => $coupon->discount_type,
                    'discountValue' => (float) $coupon->discount_value,
                    'type' => $coupon->duration_type,
                    'validFrom' => $coupon->valid_from->format('Y-m-d'),
                    'validTo' => $coupon->valid_until->format('Y-m-d'),
                    'usage' => $coupon->usage_count,
                    'usageLimit' => $coupon->usage_limit,
                    'status' => $coupon->status,
                ];
            });

        return Inertia::render('Subscription/Index', [
            'features' => $features,
            'packages' => $packages,
            'coupons' => $coupons,
        ]);
    }

    // ==================== FEATURES CRUD ====================

    /**
     * Store a newly created feature.
     */
    public function storeFeature(StoreFeatureRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        // Ensure is_metered is boolean
        $validated['is_metered'] = filter_var($validated['is_metered'] ?? false, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;

        $feature = SubscriptionFeature::create($validated);

        return back()->with('success', 'Feature created successfully.');
    }

    /**
     * Update the specified feature.
     */
    public function updateFeature(UpdateFeatureRequest $request, string $id): RedirectResponse
    {
        // dd($request->all());
        $validated = $request->validated();
        // Ensure is_metered is boolean
        $validated['is_metered'] = filter_var($validated['is_metered'] ?? false, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;

        $feature = SubscriptionFeature::findOrFail($id);
        $feature->update($validated);

        return back()->with('success', 'Feature updated successfully.');
    }

    /**
     * Remove the specified feature.
     */
    public function destroyFeature(string $id): RedirectResponse
    {
        $feature = SubscriptionFeature::findOrFail($id);
        $feature->delete();

        return back()->with('success', 'Feature deleted successfully.');
    }

    // ==================== PACKAGES CRUD ====================

    /**
     * Store a newly created package.
     */
    public function storePackage(StorePackageRequest $request): RedirectResponse
    {
        $package = SubscriptionPackage::create($request->validated());

        return back()->with('success', 'Package created successfully.');
    }

    /**
     * Update the specified package.
     */
    public function updatePackage(UpdatePackageRequest $request, string $id): RedirectResponse
    {
        $package = SubscriptionPackage::findOrFail($id);
        $package->update($request->validated());

        return back()->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified package.
     */
    public function destroyPackage(string $id): RedirectResponse
    {
        $package = SubscriptionPackage::findOrFail($id);
        $package->delete();

        return back()->with('success', 'Package deleted successfully.');
    }

    // ==================== PACKAGE CONFIGURATION ====================

    /**
     * Get package configuration (features with limits).
     */
    public function getPackageConfiguration(string $id): JsonResponse
    {
        $package = SubscriptionPackage::with('features')->findOrFail($id);
        $allFeatures = SubscriptionFeature::where('status', 'active')->orderBy('name')->get();

        $configuration = $allFeatures->map(function ($feature) use ($package) {
            $packageFeature = SubscriptionPackageFeature::where('package_id', $package->id)
                ->where('feature_id', $feature->id)
                ->first();

            return [
                'feature_id' => (string) $feature->id,
                'feature_name' => $feature->name,
                'limit_type' => $packageFeature?->limit_type ?? 'disabled',
                'limit_value' => $packageFeature?->limit_value ?? 0,
            ];
        });

        return response()->json([
            'package' => [
                'id' => (string) $package->id,
                'name' => $package->name,
            ],
            'configuration' => $configuration,
        ]);
    }

    /**
     * Update package configuration (features with limits).
     */
    public function updatePackageConfiguration(UpdatePackageConfigurationRequest $request, string $id): RedirectResponse
    {
        $package = SubscriptionPackage::findOrFail($id);

        DB::transaction(function () use ($package, $request) {
            // Delete existing package features
            $package->packageFeatures()->delete();

            // Create new package features
            foreach ($request->features as $featureData) {
                SubscriptionPackageFeature::create([
                    'package_id' => $package->id,
                    'feature_id' => $featureData['feature_id'],
                    'limit_type' => $featureData['limit_type'],
                    'limit_value' => $featureData['limit_type'] === 'limited' ? $featureData['limit_value'] : null,
                ]);
            }
        });

        return back()->with('success', 'Package configuration updated successfully.');
    }

    // ==================== PRICING CRUD ====================

    /**
     * Get pricing for a package.
     */
    public function getPackagePricing(string $id): JsonResponse
    {
        $package = SubscriptionPackage::findOrFail($id);
        $pricing = SubscriptionPricing::where('package_id', $id)
            ->orderBy('currency')
            ->orderBy('billing_cycle')
            ->get()
            ->map(function ($price) {
                return [
                    'id' => (string) $price->id,
                    'currency' => $price->currency,
                    'billingCycle' => $price->billing_cycle,
                    'price' => (float) $price->price,
                    'status' => $price->status,
                ];
            });

        return response()->json([
            'package' => [
                'id' => (string) $package->id,
                'name' => $package->name,
            ],
            'pricing' => $pricing,
        ]);
    }

    /**
     * Store pricing for a package.
     */
    public function storePricing(StorePricingRequest $request, string $id): RedirectResponse
    {
        SubscriptionPricing::create([
            'package_id' => $id,
            ...$request->validated(),
        ]);

        return back()->with('success', 'Pricing added successfully.');
    }

    /**
     * Update pricing.
     */
    public function updatePricing(Request $request, string $packageId, string $pricingId): RedirectResponse
    {
        $request->validate([
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $pricing = SubscriptionPricing::where('package_id', $packageId)
            ->findOrFail($pricingId);
        $pricing->update($request->only('price', 'status'));

        return back()->with('success', 'Pricing updated successfully.');
    }

    /**
     * Remove pricing.
     */
    public function destroyPricing(string $packageId, string $pricingId): RedirectResponse
    {
        $pricing = SubscriptionPricing::where('package_id', $packageId)
            ->findOrFail($pricingId);
        $pricing->delete();

        return back()->with('success', 'Pricing deleted successfully.');
    }

    // ==================== COUPONS CRUD ====================

    /**
     * Store a newly created coupon.
     */
    public function storeCoupon(StoreCouponRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $coupon = SubscriptionCoupon::create($request->only([
                'code',
                'discount_type',
                'discount_value',
                'currency',
                'duration_type',
                'number_of_months',
                'usage_limit',
                'valid_from',
                'valid_until',
                'status',
            ]));

            // Attach packages if applicable_packages is 'specific'
            if ($request->applicable_packages === 'specific' && $request->has('package_ids')) {
                $coupon->packages()->attach($request->package_ids);
            }
        });

        return back()->with('success', 'Coupon created successfully.');
    }

    /**
     * Update the specified coupon.
     */
    public function updateCoupon(UpdateCouponRequest $request, string $id): RedirectResponse
    {
        $coupon = SubscriptionCoupon::findOrFail($id);

        DB::transaction(function () use ($coupon, $request) {
            $coupon->update($request->only([
                'code',
                'discount_type',
                'discount_value',
                'currency',
                'duration_type',
                'number_of_months',
                'usage_limit',
                'valid_from',
                'valid_until',
                'status',
            ]));

            // Sync packages
            if ($request->applicable_packages === 'specific' && $request->has('package_ids')) {
                $coupon->packages()->sync($request->package_ids);
            } else {
                $coupon->packages()->detach();
            }
        });

        return back()->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified coupon.
     */
    public function destroyCoupon(string $id): RedirectResponse
    {
        $coupon = SubscriptionCoupon::findOrFail($id);
        $coupon->packages()->detach();
        $coupon->delete();

        return back()->with('success', 'Coupon deleted successfully.');
    }

    /**
     * Get coupon usage history.
     */
    public function getCouponUsage(string $id): JsonResponse
    {
        $coupon = SubscriptionCoupon::findOrFail($id);
        $usages = SubscriptionCouponUsage::where('coupon_id', $id)
            ->with('package')
            ->orderBy('used_at', 'desc')
            ->get()
            ->map(function ($usage) {
                return [
                    'id' => (string) $usage->id,
                    'customerName' => $usage->user_name ?? 'N/A',
                    'customerEmail' => $usage->user_email,
                    'package' => $usage->package->name ?? 'N/A',
                    'discount' => (float) $usage->discount_amount,
                    'currency' => $usage->currency,
                    'date' => $usage->used_at->format('Y-m-d'),
                    'relativeDate' => $usage->used_at->diffForHumans(),
                ];
            });

        return response()->json([
            'coupon' => [
                'id' => (string) $coupon->id,
                'code' => $coupon->code,
            ],
            'usages' => $usages,
            'stats' => [
                'totalUses' => $usages->count(),
                'usageLimit' => $coupon->usage_limit,
                'totalDiscount' => $usages->sum('discount'),
                'uniqueCustomers' => $usages->pluck('customerEmail')->unique()->count(),
            ],
        ]);
    }

    // ==================== PREVIEW DATA ====================

    /**
     * Get preview data for packages with features and pricing.
     */
    public function getPreviewData(Request $request): JsonResponse
    {
        $currency = $request->get('currency', 'USD');

        $packages = SubscriptionPackage::where('status', 'active')
            ->with([
                'features',
                'pricings' => function ($query) use ($currency) {
                    $query->where('currency', $currency)->where('status', 'active');
                },
            ])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(function ($package) {
                $monthlyPricing = $package->pricings->firstWhere('billing_cycle', 'monthly');
                $annualPricing = $package->pricings->firstWhere('billing_cycle', 'annual');

                $features = $package->features->map(function ($feature) use ($package) {
                    $packageFeature = SubscriptionPackageFeature::where('package_id', $package->id)
                        ->where('feature_id', $feature->id)
                        ->first();
                    $limitType = $packageFeature->limit_type ?? 'disabled';

                    return [
                        'name' => $feature->name,
                        'included' => $limitType !== 'disabled',
                        'limit_type' => $limitType,
                        'limit_value' => $packageFeature->limit_value ?? 0,
                    ];
                });

                return [
                    'id' => (string) $package->id,
                    'name' => $package->name,
                    'description' => $package->description,
                    'isMostPopular' => $package->is_most_popular,
                    'trialDays' => $package->trial_days,
                    'monthlyPrice' => $monthlyPricing ? (float) $monthlyPricing->price : null,
                    'annualPrice' => $annualPricing ? (float) $annualPricing->price : null,
                    'features' => $features,
                ];
            });

        return response()->json([
            'packages' => $packages,
            'currency' => $currency,
        ]);
    }
}
