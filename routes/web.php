<?php

use App\Http\Controllers\website\SignupController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('website.index');
    // return Inertia::render('Welcome', [
    //     'canRegister' => Features::enabled(Features::registration()),
    // ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified', 'can:dashboard.read'])->name('dashboard');

Route::get('leads', function () {
    return Inertia::render('Leads/Index');
})->middleware(['auth', 'verified'])->name('leads.index');

Route::get('package-enquiries', [App\Http\Controllers\EnquiryController::class, 'index'])
    ->middleware(['auth', 'verified', 'can:package_enquiries.view'])
    ->name('package-enquiries.index');

Route::get('package-enquiries/{id}', [App\Http\Controllers\EnquiryController::class, 'show'])
    ->middleware(['auth', 'verified', 'can:package_enquiries.view'])
    ->name('package-enquiries.show');

Route::put('package-enquiries/{id}/status', [App\Http\Controllers\EnquiryController::class, 'updateStatus'])
    ->middleware(['auth', 'verified', 'can:package_enquiries.change_status'])
    ->name('package-enquiries.update-status');

Route::get('leads/create', function () {
    return Inertia::render('Leads/Create');
})->middleware(['auth', 'verified'])->name('leads.create');

Route::get('leads/{id}', function ($id) {
    return Inertia::render('Leads/Show', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('leads.show');

Route::get('leads/{id}/edit', function ($id) {
    return Inertia::render('Leads/Create', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('leads.edit');

Route::middleware(['auth', 'verified', 'can:clients.read'])->group(function () {
    Route::get('clients', [App\Http\Controllers\Client\ClientsController::class, 'index'])->name('clients.index');
    Route::get('clients/{id}', [App\Http\Controllers\Client\ClientsController::class, 'show'])->name('clients.show');
    Route::get('clients/{id}/edit', [App\Http\Controllers\Client\ClientsController::class, 'edit'])->name('clients.edit');
    Route::get('clients/{id}/email-logs', [App\Http\Controllers\Client\ClientsController::class, 'emailLogs'])->name('clients.email-logs');
    Route::put('clients/{id}', [App\Http\Controllers\Client\ClientsController::class, 'update'])->name('clients.update');
    Route::get('clients/{id}/reset-password', [App\Http\Controllers\Client\ClientsController::class, 'resetPasswordForm'])->name('clients.reset-password-page')->middleware('can:clients.reset_password');
    Route::post('clients/{id}/reset-password', [App\Http\Controllers\Client\ClientsController::class, 'resetPassword'])->name('clients.reset-password')->middleware('can:clients.reset_password');
});

Route::middleware(['auth', 'verified'])->prefix('user-management')->name('user-management.')->group(function () {
    Route::get('/users', [App\Http\Controllers\UserManagement\UserManagementController::class, 'employees'])->name('users')->middleware('can:user_management.users.read');
    Route::get('/users/create', [App\Http\Controllers\UserManagement\UserManagementController::class, 'create'])->name('users.create')->middleware('can:user_management.users.create');
    Route::post('/users', [App\Http\Controllers\UserManagement\UserManagementController::class, 'store'])->name('users.store')->middleware('can:user_management.users.create');
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserManagement\UserManagementController::class, 'edit'])->name('users.edit')->middleware('can:user_management.users.update');
    Route::put('/users/{id}', [App\Http\Controllers\UserManagement\UserManagementController::class, 'update'])->name('users.update')->middleware('can:user_management.users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\UserManagement\UserManagementController::class, 'destroy'])->name('users.destroy')->middleware('can:user_management.users.delete');
    Route::post('/users/{id}/reset-password', [App\Http\Controllers\UserManagement\UserManagementController::class, 'resetPassword'])->name('users.reset-password')->middleware('can:user_management.users.reset_password');
    Route::post('/users/{id}/toggle-lock', [App\Http\Controllers\UserManagement\UserManagementController::class, 'toggleLock'])->name('users.toggle-lock')->middleware('can:user_management.users.update');

    // Roles
    Route::get('/roles', [App\Http\Controllers\UserManagement\RoleController::class, 'roles'])->name('roles')->middleware('can:user_management.roles.read');
    Route::get('/roles/create', [App\Http\Controllers\UserManagement\RoleController::class, 'create'])->name('roles.create')->middleware('can:user_management.roles.create');
    Route::post('/roles', [App\Http\Controllers\UserManagement\RoleController::class, 'store'])->name('roles.store')->middleware('can:user_management.roles.create');
    Route::get('/roles/{id}/edit', [App\Http\Controllers\UserManagement\RoleController::class, 'edit'])->name('roles.edit')->middleware('can:user_management.roles.update');
    Route::put('/roles/{id}', [App\Http\Controllers\UserManagement\RoleController::class, 'update'])->name('roles.update')->middleware('can:user_management.roles.update');
    Route::delete('/roles/{id}', [App\Http\Controllers\UserManagement\RoleController::class, 'destroy'])->name('roles.destroy')->middleware('can:user_management.roles.delete');
});

Route::get('quotes', function () {
    return Inertia::render('Quotes/Index');
})->middleware(['auth', 'verified'])->name('quotes.index');

Route::get('quotes/create', function () {
    return Inertia::render('Quotes/Create');
})->middleware(['auth', 'verified'])->name('quotes.create');

Route::get('quotes/{id}/edit', function ($id) {
    return Inertia::render('Quotes/Create', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('quotes.edit');

Route::middleware(['auth', 'verified'])->prefix('marketing')->name('marketing.')->group(function () {
    Route::get('/', function () {
        $user = auth()->user();

        if ($user->can('marketing.sequences.read')) {
            return redirect()->route('marketing.sequences');
        }

        if ($user->can('marketing.system_templates.read')) {
            return redirect()->route('marketing.system-templates.index');
        }

        return redirect()->route('marketing.campaigns');
    })->name('index');

    // Campaigns (Unprotected by specific permission as marketing.read is removed, falling back to auth)
    Route::get('/campaigns', [App\Http\Controllers\Marketing\MarketingController::class, 'campaigns'])->name('campaigns');
    Route::get('/campaigns/create', [App\Http\Controllers\Marketing\MarketingController::class, 'campaignView'])->name('campaigns.create');
    Route::get('/campaigns/{id}/edit', [App\Http\Controllers\Marketing\MarketingController::class, 'campaignView'])->name('campaigns.edit');

    // Sequences
    Route::middleware(['can:marketing.sequences.read'])->group(function () {
        Route::get('/sequences', [App\Http\Controllers\Marketing\MarketingController::class, 'sequences'])->name('sequences');
        Route::post('/sequences/{id}/test-batch', [App\Http\Controllers\Marketing\MarketingController::class, 'sendBatchTestEmails'])->name('sequences.test-batch');
        Route::post('/email-templates/{id}/test', [App\Http\Controllers\Marketing\MarketingController::class, 'sendTestEmail'])->name('email-templates.test');
    });

    Route::middleware(['can:marketing.sequences.create'])->group(function () {
        Route::get('/sequences/create', [App\Http\Controllers\Marketing\MarketingController::class, 'sequenceView'])->name('sequences.create');
        Route::post('/sequences', [App\Http\Controllers\Marketing\MarketingController::class, 'storeSequence'])->name('sequences.store');
        Route::get('/workflows/create', [App\Http\Controllers\Marketing\MarketingController::class, 'workflowView'])->name('workflows.create'); // Assuming workflows fall under similar creation restrictions or just left here
    });

    Route::middleware(['can:marketing.sequences.update'])->group(function () {
        Route::get('/sequences/{id}/edit', [App\Http\Controllers\Marketing\MarketingController::class, 'sequenceView'])->name('sequences.edit');
        Route::put('/sequences/{id}', [App\Http\Controllers\Marketing\MarketingController::class, 'updateSequence'])->name('sequences.update');
        Route::get('/workflows/{id}/edit', [App\Http\Controllers\Marketing\MarketingController::class, 'workflowView'])->name('workflows.edit');
    });

    Route::delete('/sequences/{id}', [App\Http\Controllers\Marketing\MarketingController::class, 'destroySequence'])
        ->middleware('can:marketing.sequences.delete')
        ->name('sequences.destroy');

    Route::get('/workflows', [App\Http\Controllers\Marketing\MarketingController::class, 'workflows'])->name('workflows');
    Route::get('/tracking', [App\Http\Controllers\Marketing\MarketingController::class, 'tracking'])->name('tracking');

    // System Templates
    Route::middleware(['can:marketing.system_templates.read'])->group(function () {
        Route::get('/system-templates', [App\Http\Controllers\Marketing\SystemTemplateController::class, 'index'])->name('system-templates.index');
    });

    Route::middleware(['can:marketing.system_templates.update'])->group(function () {
        Route::get('/system-templates/{id}/edit', [App\Http\Controllers\Marketing\SystemTemplateController::class, 'edit'])->name('system-templates.edit');
        Route::put('/system-templates/{id}', [App\Http\Controllers\Marketing\SystemTemplateController::class, 'update'])->name('system-templates.update');
    });
});

Route::middleware(['auth', 'verified'])->prefix('api')->name('api.')->group(function () {
    Route::get('/template-variables', [App\Http\Controllers\TemplateVariableController::class, 'getAll'])->name('template-variables');
});

Route::middleware(['auth', 'verified'])->prefix('finance')->name('finance.')->group(function () {
    Route::get('/', [App\Http\Controllers\Finance\FinanceController::class, 'index'])->name('index');
    Route::get('/dashboard', [App\Http\Controllers\Finance\FinanceController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/view', [App\Http\Controllers\Finance\FinanceController::class, 'dashboardView'])->name('dashboard.view');
    Route::get('/kpis', [App\Http\Controllers\Finance\FinanceController::class, 'kpis'])->name('kpis');
    Route::get('/kpis/view', [App\Http\Controllers\Finance\FinanceController::class, 'kpisView'])->name('kpis.view');
    Route::get('/analytics', [App\Http\Controllers\Finance\FinanceController::class, 'analytics'])->name('analytics');
    Route::get('/analytics/view', [App\Http\Controllers\Finance\FinanceController::class, 'analyticsView'])->name('analytics.view');
});

Route::middleware(['auth', 'verified'])->prefix('ecommerce')->name('ecommerce.')->group(function () {
    Route::get('/', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'index'])->name('index');

    // Products
    // Products
    Route::middleware(['can:ecommerce.product_catalog.read'])->group(function () {
        Route::get('/products', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'products'])->name('products');
        Route::get('/products/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'productView'])->name('products.view');
    });

    Route::middleware(['can:ecommerce.product_catalog.create'])->group(function () {
        Route::get('/products/create', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'productForm'])->name('products.create');
        Route::post('/products', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'storeProduct'])->name('products.store');
    });

    Route::middleware(['can:ecommerce.product_catalog.update'])->group(function () {
        Route::get('/products/{id}/edit', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'productForm'])->name('products.edit');
        Route::put('/products/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'updateProduct'])->name('products.update');
    });

    Route::delete('/products/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'destroyProduct'])
        ->middleware('can:ecommerce.product_catalog.delete')
        ->name('products.destroy');

    // Bundles
    // Bundles
    Route::middleware(['can:ecommerce.bundle_offers.read'])->group(function () {
        Route::get('/bundles', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'bundles'])->name('bundles');
    });

    Route::middleware(['can:ecommerce.bundle_offers.create'])->group(function () {
        Route::get('/bundles/create', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'bundleForm'])->name('bundles.create');
        Route::post('/bundles', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'storeBundle'])->name('bundles.store');
    });

    Route::middleware(['can:ecommerce.bundle_offers.update'])->group(function () {
        Route::get('/bundles/{id}/edit', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'bundleForm'])->name('bundles.edit');
        Route::put('/bundles/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'updateBundle'])->name('bundles.update');
    });

    Route::delete('/bundles/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'destroyBundle'])
        ->middleware('can:ecommerce.bundle_offers.delete')
        ->name('bundles.destroy');

    // Cart
    Route::get('/cart', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'cart'])
        ->middleware('can:ecommerce.shopping_cart.read')
        ->name('cart');

    // Orders
    // Orders
    Route::middleware(['can:ecommerce.orders.read'])->group(function () {
        Route::get('/orders', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'orders'])->name('orders');
        Route::get('/orders/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'orderView'])->name('orders.view');
    });

    Route::post('/orders', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'storeOrder'])
        ->middleware('can:ecommerce.orders.create')
        ->name('orders.store');

    Route::put('/orders/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'updateOrder'])
        ->middleware('can:ecommerce.orders.update')
        ->name('orders.update');
});

Route::middleware(['auth', 'verified'])->prefix('api/ecommerce')->name('api.ecommerce.')->group(function () {
    Route::post('/cart/add', [App\Http\Controllers\Api\CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{id}', [App\Http\Controllers\Api\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [App\Http\Controllers\Api\CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart', [App\Http\Controllers\Api\CartController::class, 'clear'])->name('cart.clear');
});

Route::middleware(['auth', 'verified'])->prefix('subscription')->name('subscription.')->group(function () {
    Route::get('/', [App\Http\Controllers\Subscription\SubscriptionController::class, 'index'])->name('index'); // Logic for data filtering should be in Controller

    // Features
    Route::post('/features', [App\Http\Controllers\Subscription\SubscriptionController::class, 'storeFeature'])->name('features.store')->middleware('can:subscription_management.features.read');
    Route::put('/features/{feature}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'updateFeature'])->name('features.update')->middleware('can:subscription_management.features.read');
    Route::delete('/features/{feature}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'destroyFeature'])->name('features.destroy')->middleware('can:subscription_management.features.read');

    // Packages
    Route::post('/packages', [App\Http\Controllers\Subscription\SubscriptionController::class, 'storePackage'])->name('packages.store')->middleware('can:subscription_management.packages.read');
    Route::put('/packages/{package}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'updatePackage'])->name('packages.update')->middleware('can:subscription_management.packages.read');
    Route::delete('/packages/{package}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'destroyPackage'])->name('packages.destroy')->middleware('can:subscription_management.packages.read');

    // Package Configuration
    Route::get('/packages/{package}/configuration', [App\Http\Controllers\Subscription\SubscriptionController::class, 'getPackageConfiguration'])->name('packages.configuration.get')->middleware('can:subscription_management.configuration.read');
    Route::put('/packages/{package}/configuration', [App\Http\Controllers\Subscription\SubscriptionController::class, 'updatePackageConfiguration'])->name('packages.configuration.update')->middleware('can:subscription_management.configuration.read');

    // Pricing
    Route::get('/packages/{package}/pricing', [App\Http\Controllers\Subscription\SubscriptionController::class, 'getPackagePricing'])->name('packages.pricing.get')->middleware('can:subscription_management.pricing.read');
    Route::post('/packages/{package}/pricing', [App\Http\Controllers\Subscription\SubscriptionController::class, 'storePricing'])->name('packages.pricing.store')->middleware('can:subscription_management.pricing.read');
    Route::put('/packages/{package}/pricing/{pricing}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'updatePricing'])->name('packages.pricing.update')->middleware('can:subscription_management.pricing.read');
    Route::delete('/packages/{package}/pricing/{pricing}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'destroyPricing'])->name('packages.pricing.destroy')->middleware('can:subscription_management.pricing.read');

    // Coupons
    Route::post('/coupons', [App\Http\Controllers\Subscription\SubscriptionController::class, 'storeCoupon'])->name('coupons.store')->middleware('can:subscription_management.coupons.read');
    Route::put('/coupons/{coupon}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'updateCoupon'])->name('coupons.update')->middleware('can:subscription_management.coupons.read');
    Route::delete('/coupons/{coupon}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'destroyCoupon'])->name('coupons.destroy')->middleware('can:subscription_management.coupons.read');
    Route::get('/coupons/{coupon}/usage', [App\Http\Controllers\Subscription\SubscriptionController::class, 'getCouponUsage'])->name('coupons.usage')->middleware('can:subscription_management.coupons.read');

    // Preview
    Route::get('/preview', [App\Http\Controllers\Subscription\SubscriptionController::class, 'getPreviewData'])->name('preview')->middleware('can:subscription_management.preview.read');
});

require __DIR__ . '/settings.php';

// Website Routes

Route::get('/about', function () {
    return view('website.about-us.index');
});

Route::get('/partners', function () {
    return view('website.partners.index');
});

Route::get('/reseller-partner-program', function () {
    return view('website.reseller-partner-program.index');
});

Route::get('/contact', function () {
    return view('website.auth.request-demo');
});

Route::get('/refund-cancellation-policy', function () {
    return view('website.refund-policy.index');
});

Route::get('/privacy-policy', function () {
    return view('website.privacy-policy.index');
});

Route::get('/privacy', function () {
    return view('website.privacy-policy.index');
});

Route::get('/security', function () {
    return view('website.security.index');
});

Route::get('/terms-and-condition', function () {
    return view('website.terms-and-condition.index');
});

Route::get('/pricing', [App\Http\Controllers\website\PricingController::class, 'index'])->name('pricing');
Route::get('/package-enquiry', [App\Http\Controllers\EnquiryController::class, 'create'])->name('package.enquiry.create');
Route::post('/package-enquiry', [App\Http\Controllers\EnquiryController::class, 'store'])->name('package.enquiry.store');

Route::get('/roi-calculator-for-queue-system', function () {
    return view('website.roi-calculator.index');
});

Route::get('/self-guided-demo', function () {
    return view('website.self-guided-demo.index');
});

Route::get('/integrations', function () {
    return view('website.integrations.index');
});

Route::get('/videos', function () {
    return view('website.resources.video');
});

Route::get('/covid-19', function () {
    return view('website.covid-19.index');
});

Route::prefix('ebooks')->group(function () {
    Route::get('/', function () {
        return view('website.ebooks.index');
    });

    Route::get('/Ultimate-Guide-of-Qwaiting-Queue-Management-System', function () {
        return view('website.ebooks.ultimate-guide-of-qwaiting');
    });

    Route::get('/Queue-Management-System-Why-it-is-Necessary-for-Every-Industry', function () {
        return view('website.ebooks.queue-management-system-why-it-is-necessary-for-every-industry');
    });

    Route::get('/Try-These-10-Tactics-to-Drive-Traffic-to-Your-Brick-and-Mortar-Store', function () {
        return view('website.ebooks.try-these-10-tactics-to-drive-traffic-to-your-brick-and-mortar-store');
    });

    Route::get('/eight-queue-management-features-your-business-requires', function () {
        return view('website.ebooks.eight-queue-management-features-your-business-requires');
    });

    Route::get('/Self-Service-Kiosks-Everything-You-Need-to-Know', function () {
        return view('website.ebooks.self-service-kiosks-everything-you-need-to-know');
    });

    Route::get('/8-Proven-Benefits-of-Using-Digital-Signage-for-Your-Growing-Business', function () {
        return view('website.ebooks.8-proven-benefits-of-using-digital-signage-for-your-growing-business');
    });

    Route::get('/a-ceo-guide-to-virtual-queue-management', function () {
        return view('website.ebooks.a-ceo-guide-to-virtual-queue-management');
    });
});

Route::prefix('customer-stories')->group(function () {
    Route::get('/', function () {
        return view('website.customer-stories.index');
    });

    Route::get('/ram-clinics', function () {
        return view('website.customer-stories.ram-clinics');
    });

    Route::get('/psb-academy', function () {
        return view('website.customer-stories.psb-academy');
    });

    Route::get('/national-university-of-singapore', function () {
        return view('website.customer-stories.national-university-of-singapore');
    });

    Route::get('/wisma', function () {
        return view('website.customer-stories.wisma');
    });

    Route::get('/nirvana', function () {
        return view('website.customer-stories.nirvana');
    });

    Route::get('/fairprice-group', function () {
        return view('website.customer-stories.fairprice-group');
    });

    Route::get('/marina-square', function () {
        return view('website.customer-stories.marina-square');
    });

    Route::get('/changi-airport-group', function () {
        return view('website.customer-stories.changi-airport-group');
    });

    Route::get('/apollo-hospital', function () {
        return view('website.customer-stories.apollo-hospital');
    });

    Route::get('/holy-cross', function () {
        return view('website.customer-stories.holy-cross');
    });

    Route::get('/hcg', function () {
        return view('website.customer-stories.hcg');
    });

    Route::get('/healing-hospital', function () {
        return view('website.customer-stories.healing-hospital');
    });

    Route::get('/fullerton-health', function () {
        return view('website.customer-stories.fullerton-health');
    });

    Route::get('/farrer-park-hospital', function () {
        return view('website.customer-stories.farrer-park-hospital');
    });

    Route::get('/miracles-healthcare', function () {
        return view('website.customer-stories.miracles-healthcare');
    });

    Route::get('/saudia-airlines', function () {
        return view('website.customer-stories.saudia-airlines');
    });
});

// Cookie Consent
Route::post('/cookie-consent', [\App\Http\Controllers\website\CookieConsentController::class, 'store'])->name('cookie-consent.store');

// Auth / Action Routes
Route::get('/signup', [SignupController::class, 'index'])
    ->middleware(\App\Http\Middleware\ValidateSignupStep::class)
    ->name('signup');
Route::post('/signup/step{step}', [SignupController::class, 'storeStep'])
    ->where('step', '[1-6]')
    ->middleware(\App\Http\Middleware\ValidateSignupStepPost::class)
    ->name('signup.step');
Route::post('/signup/save-billing-cycle', [SignupController::class, 'saveBillingCycle'])->name('signup.save-billing-cycle');
Route::post('/signup/apply-coupon', [SignupController::class, 'applyCoupon'])->name('signup.apply-coupon');
Route::post('/signup/remove-coupon', [SignupController::class, 'removeCoupon'])->name('signup.remove-coupon');
Route::post('/signup/send-verification', [SignupController::class, 'sendVerificationEmail'])->name('signup.send-verification');
Route::get('/signup/verify/{id}/{hash}', [SignupController::class, 'verifyEmail'])->name('signup.verify');
Route::get('/signup/verify-redirect', [SignupController::class, 'verifyRedirect'])->name('signup.verify-redirect');
Route::get('/signup/verify-email-sent', [SignupController::class, 'showVerifyEmailSent'])->name('signup.verify-email-sent');
Route::post('/signup/resend-verification', [SignupController::class, 'resendVerificationEmail'])->name('signup.resend-verification');
Route::post('/signup/clear-session', [SignupController::class, 'clearSession'])->name('signup.clear-session');

Route::post('/signup/process-payment', [SignupController::class, 'processPayment'])->name('signup.process-payment');
Route::post('/signup/create-checkout-session', [SignupController::class, 'createCheckoutSession'])->name('signup.create-checkout-session');
Route::get('/signup/payment/success', [SignupController::class, 'paymentSuccess'])->name('signup.payment.success');
Route::get('/signup/payment/cancel', [SignupController::class, 'paymentCancel'])->name('signup.payment.cancel');

Route::get('/website-login', function () {
    return view('website.auth.login');
})->name('website-login');

// Social Authentication Routes
Route::get('/auth/google', [\App\Http\Controllers\website\SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [\App\Http\Controllers\website\SocialAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::get('/auth/microsoft', [\App\Http\Controllers\website\SocialAuthController::class, 'redirectToMicrosoft'])->name('auth.microsoft');
Route::get('/auth/microsoft/callback', [\App\Http\Controllers\website\SocialAuthController::class, 'handleMicrosoftCallback'])->name('auth.microsoft.callback');

Route::get('/request-demo', function () {
    return view('website.auth.request-demo');
})->name('request-demo');

// Products Routes Group
Route::prefix('products')->group(function () {
    Route::get('/', function () {
        return view('website.products.index');
    });

    Route::get('/queue-management', function () {
        return view('website.products.queue-management.index');
    });

    Route::get('/on-premises', function () {
        return view('website.products.on-premises.index');
    });

    Route::get('/self-service-kiosks', function () {
        return view('website.products.self-service-kiosks.index');
    });

    Route::get('/cloud-based-software', function () {
        return view('website.products.cloud-based-software.index');
    });

    Route::get('/face-recognition-system', function () {
        return view('website.products.face-recognition.index');
    });

    Route::get('/face-recognition-system/use-cases', function () {
        return view('website.products.face-recognition.index');
    });

    Route::get('/face-recognition-system/faq', function () {
        return view('website.products.face-recognition.index');
    });

    // Face Recognition Solution Pages
    Route::get('/face-recognition-system/government', function () {
        return view('website.products.face-recognition.solutions.government');
    });

    Route::get('/face-recognition-system/healthcare', function () {
        return view('website.products.face-recognition.solutions.healthcare');
    });

    Route::get('/face-recognition-system/banking', function () {
        return view('website.products.face-recognition.solutions.banking');
    });

    Route::get('/face-recognition-system/fintech', function () {
        return view('website.products.face-recognition.solutions.fintech');
    });

    Route::get('/face-recognition-system/education', function () {
        return view('website.products.face-recognition.solutions.education');
    });

    Route::get('/digital-signage', function () {
        return view('website.products.digital-signage.index');
    });

    Route::get('/product_details', function () {
        return view('website.products.details');
    });

    Route::get('/people-counting', function () {
        return view('website.products.people-counting.index');
    });
});

Route::get('/enterprise', function () {
    return view('website.products.enterprise.index');
});

// Solutions Routes
Route::prefix('solutions')->group(function () {
    Route::get('/', function () {
        return view('website.solutions.index');
    });

    Route::get('/healthcare', function () {
        return view('website.solutions.healthcare');
    });

    Route::get('/queue-management-solution', function () {
        return view('website.solutions.queue-management-solution');
    });

    Route::get('/appointment-scheduling-software', function () {
        return view('website.solutions.appointment-scheduling-software');
    });

    Route::get('/biometric-queue-system', function () {
        return view('website.solutions.biometric-queue-system');
    });

    Route::get('/automation', function () {
        return view('website.solutions.automation');
    });

    Route::get('/aba-appointment-scheduling', function () {
        return view('website.solutions.aba-appointment-scheduling');
    });

    Route::get('/virtual-queue-system', function () {
        return view('website.solutions.virtual-queue-system');
    });

    Route::get('/visitor-management-system', function () {
        return view('website.solutions.visitor-management-system');
    });

    Route::get('/tele-consultation', function () {
        return view('website.solutions.tele-consultation');
    });

    Route::get('/video-queue', function () {
        return view('website.solutions.video-queue');
    });

    Route::get('/messaging-services', function () {
        return view('website.solutions.messaging-services');
    });

    Route::get('/business-intelligence', function () {
        return view('website.solutions.business-intelligence');
    });

    Route::get('/customer-feedback-system', function () {
        return view('website.solutions.customer-feedback-system');
    });

    Route::get('/qr-code-queue-system', function () {
        return view('website.solutions.qr-code-queue-system');
    });

    Route::get('/online-meeting-software', function () {
        return view('website.solutions.online-meeting-software');
    });
});

// Industries Routes
Route::prefix('industries')->group(function () {
    Route::get('/', function () {
        return view('website.industries.index');
    });

    Route::get('/banking-queue-system', function () {
        return view('website.industries.banking');
    });

    Route::get('/healthcare', function () {
        return view('website.industries.healthcare');
    });

    Route::get('/retail-queue-system', function () {
        return view('website.industries.retail');
    });

    Route::get('/DMV', function () {
        return view('website.industries.dmv');
    });

    Route::get('/airport-queue-system', function () {
        return view('website.industries.airport');
    });

    Route::get('/educational-queue-system', function () {
        return view('website.industries.educational');
    });

    Route::get('/restaurant-queue-system', function () {
        return view('website.industries.restaurant');
    });

    Route::get('/public-sector-queue-system', function () {
        return view('website.industries.public-sector');
    });

    Route::get('/event-queue-management-system', function () {
        return view('website.industries.event');
    });

    Route::get('/helpdesk', function () {
        return view('website.industries.helpdesk');
    });

    Route::get('/cannabis-dispensary-queue-system', function () {
        return view('website.industries.cannabis-dispensary');
    });

    Route::get('/barbershop-queue-system', function () {
        return view('website.industries.barbershop');
    });
});

Route::post('/stripe/webhook', [\App\Http\Controllers\StripeWebhookController::class, 'handleWebhook'])->name('stripe.webhook');


Route::get('/signup/lead-details', [SignupController::class, 'leadDetails'])
    ->name('signup.lead-details');
