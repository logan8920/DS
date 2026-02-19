<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmbeddedAppController extends Controller
{
    public function index(Request $request)
    {
        // Your embedded app page
        return view('app', [
            'apiKey' => config('services.shopify.api_key'),
            'host'   => $request->query('host'),
        ]);
    }

    public function sessionTokenBounce(Request $request)
    {
        // This is the URL we want App Bridge to reload after it’s initialized.
        $reload = $request->query('shopify-reload', '/app');

        return response()->view('session-token-bounce', [
            'apiKey' => config('services.shopify.api_key'),
            'host'   => $request->query('host'),
            'reload' => $reload,
        ]);
    }
}
