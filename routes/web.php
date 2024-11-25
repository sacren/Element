<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return View::first([
        'bogus.view',
        'welcome',
        'home',
    ]);
});

Route::get('/home', function () {
    return View::make('home', [
        'message' => 'Howdy',
        'exclamation' => '!',
    ]);
})->middleware(['auth', 'verified'])->name('home');

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
