<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth')->prefix("product")->group(function () {
    Route::get("{product}/details",[ProductController::class, "details"])->name("product.details");
    Route::get("/categories",[ProductController::class, "categories"])->name("product.categories");
    Route::get("/category/{parent}/{id}",[ProductController::class, "categoryProductShow"])->name("product.category.show");
    Route::post("push-to-shopify",[ProductController::class, "pushToShopify"])->name("product.push");
});