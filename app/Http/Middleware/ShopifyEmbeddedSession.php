<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ShopifyEmbeddedSession
{
    public function handle(Request $request, Closure $next)
    {
        // Shopify admin can append: ?embedded=1&...&host=...&shop=...&id_token=...
        $idToken = $request->query('id_token');
        $shop    = $request->query('shop');
        $host    = $request->query('host');

        // If the session token isn't present (common after redirects), bounce.
        if (!$idToken) {
            return redirect()->route('shopify.session_token_bounce', [
                'shop' => $shop,
                'host' => $host,
                // reload the original path WITHOUT id_token (it could be stale)
                'shopify-reload' => $request->fullUrlWithoutQuery(['id_token']),
            ]);
        }

        try {
            // Verify JWT using your app's API secret as the signing key.
            // Install: composer require firebase/php-jwt
            $decoded = JWT::decode($idToken, new Key(config('services.shopify.api_secret'), 'HS256'));

            // Optional sanity checks (recommended):
            // - destination should match https://{shop}
            if (isset($decoded->dest) && $shop && !Str::contains($decoded->dest, "https://{$shop}")) {
                throw new \Exception('Invalid dest');
            }

            // If valid, you can store token/claims on the request for controllers to use
            $request->attributes->set('shopify_session', $decoded);

            return $next($request);
        } catch (\Throwable $e) {
            // Token invalid/expired/scopes changed → bounce to refresh for a document request
            return redirect()->route('shopify.session_token_bounce', [
                'shop' => $shop,
                'host' => $host,
                'shopify-reload' => $request->fullUrlWithoutQuery(['id_token']),
            ]);
        }
    }
}
