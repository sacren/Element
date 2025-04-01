<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('static.welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('jobs')->controller(JobController::class)->name('jobs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{job}', 'show')->name('show');
        Route::get('/{job}/edit', 'edit')->name('edit');
        Route::patch('/{job}', 'update')->name('update');
        Route::delete('/{job}', 'destroy')->name('destroy');
    });

    Route::get('/joblistings', function () {
        return redirect()->route('jobs.index');
    })->name('joblistings');

    Route::get('/about', fn () => view('static.about'))->name('about');
    Route::get('/contact', fn () => view('static.contact'))->name('contact');
    Route::get('/download', DownloadController::class)->name('download');
    Route::get('/dashboard', fn () => view('static.dashboard'))->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::fallback(fn () => abort(404));
