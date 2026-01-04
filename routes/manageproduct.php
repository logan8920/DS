<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageproductController;

Route::prefix('manageproduct')->group(function(){
    Route::get('/',[ManageproductController::class, "index"])->name('manageproduct.index');
    Route::post('/type/{type}',[ManageproductController::class, "manageproductType"])->name('manageproduct.type');
});