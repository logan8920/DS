<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix("product")->group(function () {
    Route::post("push-to-shopify",[ProductController::class, "pushToShopify"]);
});

require __DIR__.'/webhook.php';