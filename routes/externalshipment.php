<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalshipmentController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::prefix('externalshipment')->group(function(){
    Route::get('/',[ExternalshipmentController::class, "index"])->name('externalshipment.index');
    Route::post('/type/{type}',[ExternalshipmentController::class, "externalshipmentType"])->name('externalshipment.type')->withoutMiddleware([VerifyCsrfToken::class]);;
});