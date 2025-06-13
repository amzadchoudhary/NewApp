<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'getDashboardStatsReal'])
    ->middleware(['auth', 'admin'])
    ->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/user/{id}', [\App\Http\Controllers\ProfileController::class, 'deleteUserProfile'])->name('user.destroy');
    Route::get('/users', [\App\Http\Controllers\ProfileController::class, 'usersList'])->name('users');
    Route::get('/users/export', [\App\Http\Controllers\DashboardController::class, 'export'])->name('users.export');

});

require __DIR__.'/auth.php';
