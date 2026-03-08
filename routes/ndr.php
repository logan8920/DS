<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NdrController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::prefix('ndr')->group(function(){
    Route::get('/',[NdrController::class, "index"])->name('ndr.index');
    Route::post('/type/{type}',[NdrController::class, "ndrType"])->name('ndr.type')->withoutMiddleware([VerifyCsrfToken::class]);
});