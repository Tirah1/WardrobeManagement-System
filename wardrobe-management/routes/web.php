<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClothingItemController; // Add this line
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Home route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Clothing Item Routes
    Route::get('/clothing-items', [ClothingItemController::class, 'index'])->name('clothing-items.index'); // Get all clothing items
    Route::get('/clothing-items/create', [ClothingItemController::class, 'create'])->name('clothing-items.create'); // Show create form
    Route::post('/clothing-items', [ClothingItemController::class, 'store'])->name('clothing-items.store'); // Create a new clothing item
    Route::get('/clothing-items/{id}', [ClothingItemController::class, 'show'])->name('clothing-items.show'); // Get a specific clothing item
    Route::get('/clothing-items/{id}/edit', [ClothingItemController::class, 'edit'])->name('clothing-items.edit'); // Show edit form
    Route::put('/clothing-items/{id}', [ClothingItemController::class, 'update'])->name('clothing-items.update'); // Update a clothing item
    Route::delete('/clothing-items/{id}', [ClothingItemController::class, 'destroy'])->name('clothing-items.destroy'); // Delete a clothing item
});

require __DIR__.'/auth.php';