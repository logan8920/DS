<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SourceaproductController;

Route::middleware('auth')->prefix('sourceaproduct')->group(function() {
   Route::get('/',[SourceaproductController::class, 'index'])->name('sourceaproduct.index');
   Route::post('/store',[SourceaproductController::class, 'store'])->name('sourceaproduct.store');
});