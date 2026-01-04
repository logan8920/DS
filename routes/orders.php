<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;

Route::prefix('orders')->group(function(){
    Route::get('/',[OrdersController::class, "index"])->name('orders');
    Route::post('/type/{type}',[OrdersController::class, "orderType"])->name('orders.type');
});