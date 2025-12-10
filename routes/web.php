<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('leads', function () {
    return Inertia::render('Leads/Index');
})->middleware(['auth', 'verified'])->name('leads.index');

Route::get('leads/create', function () {
    return Inertia::render('Leads/Create');
})->middleware(['auth', 'verified'])->name('leads.create');

Route::get('leads/{id}', function ($id) {
    return Inertia::render('Leads/Show', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('leads.show');

Route::get('leads/{id}/edit', function ($id) {
    return Inertia::render('Leads/Create', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('leads.edit');

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
    Route::get('/', [App\Http\Controllers\Marketing\MarketingController::class, 'index'])->name('index');
    Route::get('/campaigns', [App\Http\Controllers\Marketing\MarketingController::class, 'campaigns'])->name('campaigns');
    Route::get('/campaigns/create', [App\Http\Controllers\Marketing\MarketingController::class, 'campaignView'])->name('campaigns.create');
    Route::get('/campaigns/{id}/edit', [App\Http\Controllers\Marketing\MarketingController::class, 'campaignView'])->name('campaigns.edit');
    Route::get('/sequences', [App\Http\Controllers\Marketing\MarketingController::class, 'sequences'])->name('sequences');
    Route::get('/sequences/create', [App\Http\Controllers\Marketing\MarketingController::class, 'sequenceView'])->name('sequences.create');
    Route::get('/sequences/{id}/edit', [App\Http\Controllers\Marketing\MarketingController::class, 'sequenceView'])->name('sequences.edit');
    Route::get('/workflows', [App\Http\Controllers\Marketing\MarketingController::class, 'workflows'])->name('workflows');
    Route::get('/workflows/create', [App\Http\Controllers\Marketing\MarketingController::class, 'workflowView'])->name('workflows.create');
    Route::get('/workflows/{id}/edit', [App\Http\Controllers\Marketing\MarketingController::class, 'workflowView'])->name('workflows.edit');
    Route::get('/tracking', [App\Http\Controllers\Marketing\MarketingController::class, 'tracking'])->name('tracking');
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
    Route::get('/products', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'products'])->name('products');
    Route::get('/products/create', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'productForm'])->name('products.create');
    Route::get('/products/{id}/edit', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'productForm'])->name('products.edit');
    Route::get('/products/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'productView'])->name('products.view');
    Route::get('/bundles', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'bundles'])->name('bundles');
    Route::get('/bundles/create', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'bundleForm'])->name('bundles.create');
    Route::get('/bundles/{id}/edit', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'bundleForm'])->name('bundles.edit');
    Route::get('/cart', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'cart'])->name('cart');
    Route::get('/orders', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'orders'])->name('orders');
    Route::get('/orders/{id}', [App\Http\Controllers\Ecommerce\EcommerceController::class, 'orderView'])->name('orders.view');
});

require __DIR__.'/settings.php';
