<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\VerifyShopifySession;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\ShopifyEmbeddedSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'shopify.iframe' => VerifyShopifySession::class,
            'shopify.embedded.session' => ShopifyEmbeddedSession::class,
        ]);

        VerifyCsrfToken::except([
            'auth/bootstrap'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
