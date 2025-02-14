<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\CustomAuth\AuthenticatedSessionController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MasterData\MasterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\PurchaseRequest\PurchaseRequestController;



/**
 * Clear all cache
 *
 * This route is used to clear all cache in the application.
 * It is useful when you want to clear all cache after changing some configuration.
 *
 * @return string
 */
Route::get('/clear-all', function () {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $current_date_time = Carbon::now()->toDateTimeString(); // Produces something like
    return 'exitCode: ' . $exitCode . ' Application cache cleared at ' . $current_date_time;
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

route::post('/master-data', [MasterController::class, 'store'])->middleware(['auth', 'verified'])->name('master-data.store');


route::get('/master-data/{id}', [MasterController::class, 'show'])->middleware(['auth', 'verified'])->name('master-data.show');

route::post('/master-data/update/{id}', [MasterController::class, 'update'])->middleware(['auth', 'verified'])->name('master-data.update');

route::delete('/master-data/destroy/{id}', [MasterController::class, 'destroy'])->middleware(['auth', 'verified'])->name('master-data.destroy');



//store
route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
route::get('/purchase-request/{purchase_request_number}', [PurchaseRequestController::class, 'index'])->middleware(['auth', 'verified'])->name('purchase-request.index');
route::post('/purchase-request/{purchase_request_number}', [PurchaseRequestController::class, 'store'])->middleware(['auth', 'verified'])->name('purchase-request.store');
route::get('/purchase-request/list/{id}', [PurchaseRequestController::class, 'show'])->middleware(['auth', 'verified'])->name('purchase-request-list.show');

route::post('/purchase-request/list/{id}', [PurchaseRequestController::class, 'update'])->middleware(['auth', 'verified'])->name('purchase-request-list.update');

route::delete('/purchase-request/list/destroy/{id}', [PurchaseRequestController::class, 'destroy'])->middleware(['auth', 'verified'])->name('purchase-request-list.destroy');

route::post('`/purchase-request/signature/{purchase_request_number}`', [PurchaseRequestController::class, 'signature'])->middleware(['auth', 'verified'])->name('purchase-request.signature');

route::post('/purchase-request/create-pr', [PurchaseRequestController::class, 'createPR'])->middleware(['auth', 'verified'])->name('purchase-request.createPR');



route::get('/convertion', [PurchaseRequestController::class, 'convertion'])->middleware(['auth', 'verified'])->name('purchase-request.convertion');
route::post("/purchase-request/update-uom/{id}", [PurchaseRequestController::class, 'updateUom'])->middleware(['auth', 'verified'])->name('purchase-request.updateUom');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Authentication Routes... login
require __DIR__ . '/auth.php';

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.destroy');
Route::get('login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');


// route::get('/login', function () {
//     return Route::get('login',[AuthenticatedSessionController::class, 'create']);
// });
