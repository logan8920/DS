<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::prefix('orders')->group(function(){
    Route::get('/',[OrdersController::class, "index"])->name('orders');
    Route::post('/type/{type}',[OrdersController::class, "orderType"])->name('orders.type')->withoutMiddleware([VerifyCsrfToken::class]);
});