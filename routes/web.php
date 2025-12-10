<?php

use App\Http\Controllers\LeadController;
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

Route::resource('leads', LeadController::class)->middleware(['auth', 'verified']);
Route::put('leads/{lead}/stage', [LeadController::class, 'updateStage'])->middleware(['auth', 'verified'])->name('leads.updateStage');

Route::get('quotes', function () {
    return Inertia::render('Quotes/Index');
})->middleware(['auth', 'verified'])->name('quotes.index');

Route::get('quotes/create', function () {
    return Inertia::render('Quotes/Create');
})->middleware(['auth', 'verified'])->name('quotes.create');

Route::get('quotes/{id}/edit', function ($id) {
    return Inertia::render('Quotes/Create', ['id' => $id]);
})->middleware(['auth', 'verified'])->name('quotes.edit');

require __DIR__.'/settings.php';
