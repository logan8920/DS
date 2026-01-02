<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view("welcome");
// });
Route::middleware('shopify.iframe')->group(function(){
    Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/', [DashboardController::class, "index"])->middleware(['auth', 'verified']);
    Route::get('/privacy',[DashboardController::class,'privacy']);
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    require __DIR__.'/auth.php';
    require __DIR__.'/product.php';
    require __DIR__.'/analytics.php';
    require __DIR__.'/orders.php';
    require __DIR__.'/shipment.php';
    require __DIR__.'/externalorders.php';
    require __DIR__.'/externalshipment.php';
    require __DIR__.'/manageproduct.php';
    require __DIR__.'/sourceaproduct.php';
    require __DIR__.'/rtointelligence.php';
    require __DIR__.'/ndr.php';
    require __DIR__.'/billing.php';
    require __DIR__.'/channels.php';

});

