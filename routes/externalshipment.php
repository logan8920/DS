<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalshipmentController;

Route::prefix('externalshipment')->group(function(){
    Route::get('/',[ExternalshipmentController::class, "index"])->name('externalshipment.index');
    Route::post('/type/{type}',[ExternalshipmentController::class, "externalshipmentType"])->name('externalshipment.type');
});