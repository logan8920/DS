<?php
use App\Http\Controllers\ShopifyWebhookController;
Route::prefix('shopify')->group(function(){
    Route::post('/webhooks', [ShopifyWebhookController::class, 'handle']);
    Route::post('/webhooks/customers/data_request', [ShopifyWebhookController::class, 'customerDataRequest']);
    Route::post('/webhooks/customers/redact', [ShopifyWebhookController::class, 'customerRedact']);
    Route::post('/webhooks/shop/redact', [ShopifyWebhookController::class, 'shopRedact']);
});
