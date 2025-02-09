<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\CustomAuth\AuthenticatedSessionController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MasterData\MasterController;
use App\Http\Controllers\InputData\InputDataController;
use App\Http\Controllers\FormPurchase\FormPurchaseController;



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


route::get('/', function () {
    return view('welcome');
});




// route::get('/master-data', function () {
//     return view('/master-data');
// })->middleware(['auth', 'verified'])->name('master-data');


// route::get('/form-purchase', function () {
//     return view('/form-purchase');
// })->middleware(['auth', 'verified'])->name('form-purchase');


// route::get('/input-data', function () {
//     return view('/input-data');
// })->middleware(['auth', 'verified'])->name('input-data');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
route::get('/master-data', [MasterController::class, 'index'])->middleware(['auth', 'verified'])->name('master-data');
route::get('/input-data', [InputDataController::class, 'index'])->middleware(['auth', 'verified'])->name('input-data');
route::get('/form-purchase', [FormPurchaseController::class, 'index'])->middleware(['auth', 'verified'])->name('form-purchase');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Authentication Routes... login
require __DIR__.'/auth.php';

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.destroy');
Route::get('login',[AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login',[AuthenticatedSessionController::class, 'store'])->name('login.store');


// route::get('/login', function () {
//     return Route::get('login',[AuthenticatedSessionController::class, 'create']);
// });
