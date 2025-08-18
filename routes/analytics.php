<?php

Use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;

Route::prefix('analytics')->middleware('auth')->group(function(){
    Route::get('/',[AnalyticsController::class, "index"])->name('analytics');
});