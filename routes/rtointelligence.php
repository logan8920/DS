<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtoIntelligenceController;

Route::middleware('auth')->prefix('rtointelligence')->group(function(): void{
    Route::get('/rtofaqs',[RtoIntelligenceController::class, "rtofaqs"])->name('rtointelligence.rtofaqs');
    //Route::post('/type/{type}',[RtoIntelligenceController::class, "orderType"])->name('rtointelligence.type');
});