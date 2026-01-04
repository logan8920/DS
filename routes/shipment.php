<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

Route::prefix('shipment')->group(function(){
    Route::get('/',[ShipmentController::class, "index"])->name('shipment.index');
    Route::post('/type/{type}',[ShipmentController::class, "shipmentType"])->name('shipment.type');
});