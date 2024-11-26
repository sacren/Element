<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return View::make('welcome');
});

Route::get('/jobs', function () {
    return View::make('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Photographer',
                'salary' => '$50,000',
                'location' => 'San Francisco, CA',
            ],
            [
                'id' => 2,
                'title' => 'Mason',
                'salary' => '$25,000',
                'location' => 'New York, NY',
            ],
            [
                'id' => 3,
                'title' => 'Sous Chef',
                'salary' => '$75,000',
                'location' => 'Seattle, WA',
            ],
        ],
    ]);
})->middleware(['auth', 'verified'])->name('jobs');

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Photographer',
            'salary' => '$50,000',
            'location' => 'San Francisco, CA',
        ],
        [
            'id' => 2,
            'title' => 'Mason',
            'salary' => '$25,000',
            'location' => 'New York, NY',
        ],
        [
            'id' => 3,
            'title' => 'Sous Chef',
            'salary' => '$75,000',
            'location' => 'Seattle, WA',
        ],
    ];

    $job = Arr::first($jobs, fn ($job) => $job['id'] == $id);

    if (!$job) {
        abort(404);
    }

    return View::make('job', [
        'job' => $job,
    ]);
})->middleware(['auth', 'verified'])->name('jobs.show');

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
