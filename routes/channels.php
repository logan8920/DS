<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\ChannelsController;

Route::prefix('channels')->group(function(){
    Route::get("/allChannels",[ChannelsController::class, "index"])->name("channels.allChannels");
    Route::post("/get/allChannels",[ChannelsController::class, "show"])->name("channels.allChannels.get")->withoutMiddleware([VerifyCsrfToken::class]);
    Route::get("/addChannels",[ChannelsController::class,"create"])->name("channels.create");
    Route::post("create/channels",[ChannelsController::class, "store"])->name("channels.store");
});