<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalordersController;

Route::middleware('auth')->prefix('externalorders')->group(function(){
    Route::get('/',[ExternalordersController::class, "index"])->name('externalorders.index');
    Route::post('/type/{type}',[ExternalordersController::class, "externalordersType"])->name('externalorders.type');
});