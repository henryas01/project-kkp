<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

use App\Http\Controllers\About\AboutController;



/**
 * Clear all cache
 *
 * This route is used to clear all cache in the application.
 * It is useful when you want to clear all cache after changing some configuration.
 *
 * @return string
 */
Route::get('/clear-all', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $current_date_time = Carbon::now()->toDateTimeString(); // Produces something like
    return 'exitCode: '.$exitCode.' Application cache cleared at '.$current_date_time;
});



Route::group(['prefix' => 'about'], function () {
    Route::get('/', [AboutController::class, 'index'])->name('about.index');
});








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
