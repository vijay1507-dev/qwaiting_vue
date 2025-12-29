<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPackage;
use App\Models\SubscriptionPackageFeature;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PricingController extends Controller
{
    /**
     * Display the pricing page with dynamic data.
     */
    public function index(Request $request): View
    {
        $currency = $request->get('currency', 'USD');

        // Get all active packages with their features and pricing
        $packages = SubscriptionPackage::where('status', 'active')
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
                $features = $package->features->map(function ($feature) use ($package) {
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
                    'features' => $features,
                ];
            });

        // Get all unique features for comparison table
        $allFeatures = \App\Models\SubscriptionFeature::where('status', 'active')
            ->orderBy('name')
            ->get();

        // Build comparison data structure
        $comparisonData = [];
        $packagesArray = $packages->toArray();

        foreach ($allFeatures as $feature) {
            $row = [$feature->name];
            $checkmarkCount = 0; // Count how many packages have this feature enabled
            $hasNumericValue = false; // Track if this feature has numeric values

            foreach ($packagesArray as $package) {
                $packageFeature = SubscriptionPackageFeature::where('package_id', $package['id'])
                    ->where('feature_id', $feature->id)
                    ->first();

                if ($packageFeature) {
                    $limitType = $packageFeature->limit_type;
                    if ($limitType === 'disabled') {
                        $row[] = false;
                    } elseif ($limitType === 'unlimited') {
                        $row[] = true;
                        $checkmarkCount++;
                    } elseif ($limitType === 'limited') {
                        // For numeric features, show the limit value
                        if ($feature->data_type === 'Number') {
                            $row[] = (string) $packageFeature->limit_value;
                            $checkmarkCount++; // Numeric values count as checkmarks
                            $hasNumericValue = true; // Mark as numeric feature
                        } elseif ($feature->data_type === 'Text') {
                            // For text features, show the text value
                            $row[] = (string) $packageFeature->limit_value;
                            $checkmarkCount++;
                        } else {
                            $row[] = true;
                            $checkmarkCount++;
                        }
                    } else {
                        $row[] = false;
                    }
                } else {
                    $row[] = false;
                }
            }

            // Store metadata for sorting
            $row['_checkmark_count'] = $checkmarkCount;
            $row['_has_numeric'] = $hasNumericValue;
            $comparisonData[] = $row;
        }

        // Sort comparison data: numeric features first, then by checkmark count, then alphabetically
        usort($comparisonData, function ($a, $b) {
            // First priority: numeric features come first
            if ($a['_has_numeric'] !== $b['_has_numeric']) {
                return $b['_has_numeric'] <=> $a['_has_numeric']; // true (1) comes before false (0)
            }

            // Second priority: sort by checkmark count (descending - more checkmarks first)
            if ($a['_checkmark_count'] !== $b['_checkmark_count']) {
                return $b['_checkmark_count'] <=> $a['_checkmark_count'];
            }

            // Third priority: sort alphabetically by feature name
            return strcmp($a[0], $b[0]);
        });

        // Remove the sort keys from each row
        foreach ($comparisonData as &$row) {
            unset($row['_checkmark_count']);
            unset($row['_has_numeric']);
        }
        unset($row);

        return view('website.pricing.index', [
            'packages' => $packages,
            'comparisonData' => $comparisonData,
            'currency' => $currency,
        ]);
    }
}
