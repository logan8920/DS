<?php

namespace App\Http\Controllers;
use App\Models\{
    Banner,
    Category
};
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\JWK;
use Illuminate\Support\Facades\Http;
use App\Models\ChannelConfig;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::whereStatus(1)->orderBy('position','desc')->get();
        $categories = Category::where(['is_active' => 1, "parent_id" => NULL])->limit(8)->get();
        $categories5 = Category::where(['is_active' => 1, "parent_id" => NULL])->limit(3)->get();
        return view('pages.dashboard',compact('categories','categories5','banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function privacy() {
        return view('pages.privacy');
    }

    public function bootstrap(Request $request)
    {
        $jwt = substr($request->header('Authorization'), 7);

        $jwks = cache()->remember('shopify_jwks', 3600, function () {
            return Http::get('https://identity.myshopify.com/oauth2/keys')->json();
        });

        $payload = JWT::decode($jwt, JWK::parseKeySet($jwks));

        $shop = str_replace(['https://','/'], '', $payload->dest);

        session(['shop' => $shop]);

        $channel = ChannelConfig::where('domain', $shop)->first();

        if ($channel) {
            auth()->loginUsingId($channel->seller_id);
        }

        return response()->json(['ok' => true]);
    }

}
