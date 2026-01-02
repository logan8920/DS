<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\JWK;
use Illuminate\Support\Facades\Http;

class VerifyShopifySession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->exists('shop')) {
            $token = $request->bearerToken();
            if (!$token)
                return response('Missing token', 401);

            try {
                $jwks = cache()->remember('shopify_jwks', 3600, function () {
                    return Http::get('https://identity.shopify.com/oauth2/keys')->json();
                });

                $keys = JWK::parseKeySet($jwks);
                $payload = JWT::decode($token, $keys);

                session(['shop' => str_replace('https://', '', $payload->dest)]);

            } catch (\Exception $e) {
                return response('Invalid session token', 403);
            }
        }

        return $next($request);
    }
}
