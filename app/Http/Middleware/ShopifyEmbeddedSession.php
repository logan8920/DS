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
        $shop = $request->query('shop');
        $host = $request->query('host');

        // 1) Prefer session token from the Authorization header (App Bridge adds it)
        $authHeader = $request->header('authorization'); // Laravel normalizes header names
        $bearerToken = null;

        if (is_string($authHeader) && Str::startsWith($authHeader, 'Bearer ')) {
            $bearerToken = Str::after($authHeader, 'Bearer ');
        }

        // 2) Fallback: token in URL param (initial load from Shopify admin)
        $urlToken = $request->query('id_token');

        $token = $bearerToken ?: $urlToken;

        // 3) If no token, bounce (document) or 401 (XHR)
        if (!$token) {
            return $this->handleInvalidSession($request, $shop, $host);
        }

        try {
            // Session tokens are signed with your app's API secret (HS256)
            $decoded = JWT::decode(
                $token,
                new Key(config('services.shopify.api_secret'), 'HS256')
            );

            // Optional sanity check (destination should be the shop domain)
            if (isset($decoded->dest) && $shop && !Str::contains($decoded->dest, "https://{$shop}")) {
                throw new \Exception('Invalid dest');
            }

            // Make claims available to controllers
            $request->attributes->set('shopify_session', $decoded);

            return $next($request);
        } catch (\Throwable $e) {
            // expired / invalid / scopes changed
            return $this->handleInvalidSession($request, $shop, $host);
        }
    }

    private function handleInvalidSession(Request $request, ?string $shop, ?string $host)
    {
        // If this is an XHR/fetch request, return 401 + retry header so App Bridge refreshes the token
        if ($request->expectsJson() || $request->ajax()) {
            return response('Unauthorized', 401)
                ->header('X-Shopify-Retry-Invalid-Session-Request', '1');
        }

        // Document request: redirect to bounce page so App Bridge can re-establish token
        return redirect()->route('shopify.session_token_bounce', [
            'shop' => $shop,
            'host' => $host,
            'shopify-reload' => $request->fullUrlWithoutQuery(['id_token']),
        ]);
    }
}
