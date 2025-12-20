<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShopifyWebhookController extends Controller
{
    /**
     * Verify Shopify Webhook HMAC
     */
    private function verifyHmac(Request $request): bool
    {
        $hmacHeader = $request->header('X-Shopify-Hmac-Sha256');
        $data = $request->getContent();

        $calculatedHmac = base64_encode(
            hash_hmac(
                'sha256',
                $data,
                config('services.shopify.webhook_secret'),
                true
            )
        );

        return hash_equals($hmacHeader, $calculatedHmac);
    }

    /**
     * Customers Data Request
     */
    public function customerDataRequest(Request $request)
    {
        if (!$this->verifyHmac($request)) {
            return response('Invalid HMAC', 401);
        }

        // Log for audit (optional)
        Log::info('Shopify customers/data_request webhook received', $request->all());

        // If no customer data stored, simply acknowledge
        return response()->json(['status' => 'ok'], 200);
    }

    /**
     * Customers Redact
     */
    public function customerRedact(Request $request)
    {
        if (!$this->verifyHmac($request)) {
            return response('Invalid HMAC', 401);
        }

        Log::info('Shopify customers/redact webhook received', $request->all());

        // Delete customer data if stored

        return response()->json(['status' => 'ok'], 200);
    }

    /**
     * Shop Redact
     */
    public function shopRedact(Request $request)
    {
        Log::channel('api')->info('Shopify customers/data_request webhook received', $request->all());
        // Log::info();
        if (!$this->verifyHmac($request)) {
            return response('Invalid HMAC', 401);
        }

        Log::info('Shopify shop/redact webhook received', $request->all());

        // Delete shop data if stored

        return response()->json(['status' => 'ok'], 200);
    }
}
