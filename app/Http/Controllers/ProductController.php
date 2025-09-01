<?php

namespace App\Http\Controllers;
use App\Models\{Product,User};
use Illuminate\Http\Request;
use App\Libraries\ShopifyTraits;
use Illuminate\Support\Facades\Validator;
use Exception;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function details($product)
    {
        return view('pages.product-details');
    }

    public function categories()
    {
        return view('pages.product-categories');
    }

    public function pushToShopify(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                "product_id" => "required|numeric|exists:products,product_id"
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first(), 422);
            }

            $productId = $request->product_id;


            $productData = Product::select(["product_id", "name as title"])
                ->with([
                    "variants" => function ($q) {
                        $q->select(["product_id", "name as title", "price", "sku"]); // include FK + fields you need
                    },
                    "images" => function ($q) {
                        $q->select(["product_id",DB::raw("CONCAT('" . asset('storage') . "/', image_path) as originalSource"), "alt_text",DB::raw("'IMAGE' as mediaContentType")]); // include FK
                    }
                ])
                ->where("product_id", $productId)
                ->first()->toArray();

            /*$productData = [
                "title" => "Helmet Nova Dummy",
                "variants" => [
                    [
                        "price" => "49.99",   // Price lives here
                        "sku" => "HELMET001"
                    ]
                ],
                "images" => [
                    [
                        "src" => "https://dummyimage.com/600x400/000/fff.png&text=Helmet+Image",
                        "altText" => "Gray helmet dummy"
                    ]
                ],
                "metafields" => [
                    [
                        "key" => "material",
                        "namespace" => "specs",
                        "type" => "single_line_text_field",
                        "value" => "Polycarbonate"
                    ]
                ]
            ];*/

            // $config = auth()->user()->channelConfigs()->whereDomain($request->domain)->first();

            $config = User::where("id",1)->first()->channelConfigs()->whereDomain($request->domain)->first();

            if(!$config) {
                throw new Exception("Seller for {$request->domain} Channel Not Found!", 422);
            }
            
            //dd(json_encode($productData));
            $shopify = new ShopifyTraits($config);

            $response = $shopify->createProduct($productData);

            if(!$response['response'] ?? false) {
                throw new Exception($response['message'] ?? "Unable to get Response!", 422);
            }

            return response()->json([
                "status" => true,
                "statuscode" => 200,
                "message" => "Product Push to Shopify",
                "response" => $response['response']
            ]);

        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "statuscode" => $e->getCode(),
                "message" => $e->getMessage()
            ]);
        }

    }
}
