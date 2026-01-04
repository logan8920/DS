<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ChannelConfig;

class VerifyShopifySession
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * ─────────────────────────────────────────────
         * CASE 1: Shopify Embedded App Request
         * ─────────────────────────────────────────────
         */
        if ($request->has('shop')) {

            try {
                $shop = str_replace(['https://', '/'], '', $request->get('shop'));

                session(['shop' => $shop]);

                $channel = ChannelConfig::where('domain', $shop)->first();

                if (!$channel) {
                    return response('Shop not registered', 403);
                }

                auth()->loginUsingId($channel->seller_id);

                return $next($request);

            } catch (\Throwable $e) {
                return response('Invalid Shopify session', 403);
            }
        }

        /**
         * ─────────────────────────────────────────────
         * CASE 2: Normal Web Request → Apply Auth
         * ─────────────────────────────────────────────
         */
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
