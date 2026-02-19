<?php

namespace App\Http\Controllers;

use App\Models\{
    Banner,
    Category
};
use Illuminate\Http\Request;

class EmbeddedAppController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::whereStatus(1)->orderBy('position','desc')->get();
        $categories = Category::where(['is_active' => 1, "parent_id" => NULL])->limit(8)->get();
        $categories5 = Category::where(['is_active' => 1, "parent_id" => NULL])->limit(3)->get();

        $apiKey = config('services.shopify.api_key');
        $host   = $request->query('host');
        return view('pages.dashboard',compact('categories','categories5','banners',"apiKey","host"));
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
