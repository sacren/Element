<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return View::make('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('jobs', JobController::class)->only([
        'index', 'create', 'store', 'show', 'edit', 'destroy'
    ]);

    // Explicit PATCH route for certainty, overriding the default resource behavior
    Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
});

Route::get('/about', function () {
    return View::make('about');
})->middleware(['auth', 'verified'])->name('about');

Route::get('/contact', function () {
    return View::make('contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
