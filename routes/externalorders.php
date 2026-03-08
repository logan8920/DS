<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalordersController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::prefix('externalorders')->group(function(){
    Route::get('/',[ExternalordersController::class, "index"])->name('externalorders.index');
    Route::post('/type/{type}',[ExternalordersController::class, "externalordersType"])->name('externalorders.type')->withoutMiddleware([VerifyCsrfToken::class]);
});