<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\QuoteController;

// 👇 Route for homepage (redirect to dashboard if authenticated)
Route::get('/', function () {
    return redirect('/dashboard');
});

// 👇 Dashboard and Mood Tracking Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MoodController::class, 'index'])->name('dashboard');
    Route::post('/mood', [MoodController::class, 'store'])->name('mood.store');
    Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');


    // Quote creation routes
    Route::get('/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
    Route::post('/quotes', [QuoteController::class, 'store'])->name('quotes.store');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 👇 Auth scaffolding
require __DIR__.'/auth.php';
