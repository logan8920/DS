<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NdrController;

Route::prefix('ndr')->group(function(){
    Route::get('/',[NdrController::class, "index"])->name('ndr.index');
    Route::post('/type/{type}',[NdrController::class, "ndrType"])->name('ndr.type');
});