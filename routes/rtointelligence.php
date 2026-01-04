<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtoIntelligenceController;

Route::prefix('rtointelligence')->group(function(): void{
    Route::get('/rtofaqs',[RtoIntelligenceController::class, "rtofaqs"])->name('rtointelligence.rtofaqs');
    Route::get('/highrtopincodelist',[RtoIntelligenceController::class, "highrtopincodelist"])->name('rtointelligence.highrtopincodelist');
});