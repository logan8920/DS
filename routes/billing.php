<?php 
use App\Http\Controllers\BillingController;
use Illuminate\Support\Facades\Route;

Route::prefix('billing')->group(function(){
    Route::get('/marginremittance',[BillingController::class, 'marginremittance'])->name('billing.marginremittance');
    Route::post('/marginremittance',[BillingController::class, 'marginremittanceAjax'])->name('billing.marginremittance.ajax');
    Route::get('/prepaidpayment',[BillingController::class, 'prepaidpayment'])->name('billing.prepaidpayment');
    Route::post('/prepaidpayment',[BillingController::class, 'prepaidpaymentAjax'])->name('billing.prepaidpayment.ajax');
});