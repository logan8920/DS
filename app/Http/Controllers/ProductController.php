<?php

namespace App\Http\Controllers;
use App\Models\{Product, User, MapShopifyProduct};
use Illuminate\Http\Request;
use App\Libraries\Shopify;
use Illuminate\Support\Facades\Validator;
use Exception;
use DB;
use PhpParser\Node\Expr\Cast\Double;

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

    public function details(Product $product)
    {
        $moreProducts = Product::where("product_id", "!=", $product->product_id)->limit(30)->get();
        return view('pages.product-details', compact('product', 'moreProducts'));
    }

    public function categories()
    {
        return view('pages.product-categories');
    }

    /*public function pushToShopify(Request $request)
    {
        // dd($request->all());
        try {

            $validator = Validator::make($request->all(), [
                "product_id" => "required|numeric|exists:products,product_id",
                "domain" => "required|exists:channel_configs,domain",
                "selling_price" => "required|numeric",
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first(), 422);
            }

            $driver = DB::connection()->getDriverName();

            if ($driver === 'mysql') {
                $filename = DB::raw("SUBSTRING_INDEX(image_path, '/', -1) as filename");
            } else { // PostgreSQL
                $filename = DB::raw("split_part(image_path, '/', array_length(string_to_array(image_path, '/'), 1)) as filename");
            }

            $data = [];
            $productId = $request->product_id;
            $domain = $request->domain;
            $sellingPrice = $request->selling_price;
            Product::$sellingPrice = $sellingPrice;
            $product = Product::select(["product_id", "name as title"])
                ->with([
                    "files" => function ($q) use ($filename) {
                        $q->select([
                            "product_id",
                            DB::raw("CONCAT('" . asset('storage') . "/', image_path) as \"originalSource\""),
                            "alt_text as alt",
                            $filename,
                            DB::raw("'IMAGE' as \"contentType\"")
                        ]);
                    },

                ])
                ->where("product_id", $productId)
                ->first();

            $product->productOptions = $product->productOptions()
            ->select([
                DB::raw('DISTINCT product_attribute_values.product_id'),
                'attributes.name as name',
                'product_attribute_values.attribute_id'
            ])
            ->leftJoin('attributes', 'attributes.attribute_id', '=', 'product_attribute_values.attribute_id')
            ->with('values')
            ->get()
            ->toArray();
            // dd($product);

            if(!count($product->productOptions ?? [])) {
                $product->productOptions = [
                    [
                        "name" => "DefaultOption",
                        "values" => [
                            [
                                "name" => "DefaultValue",
                            ]
                        ]
                    ]
                ];
            }


            // $media = $product->images()->select(["product_id",DB::raw("CONCAT('" . asset('storage') . "/', image_path) as originalSource"), "alt_text",DB::raw("'IMAGE' as mediaContentType")])->get();
            // $media = $product->files()
            //     ->select([
            //         "product_id",
            //         DB::raw("CONCAT('" . asset('storage') . "/', image_path) as \"originalSource\""),
            //         "alt_text as alt",
            //         "test.jpg as filename",
            //         DB::raw("'IMAGE' as \"contentType\"")
            //     ])
            //     ->get();
            // $media = count($media->toArray()) ? $media->toArray() : NULL;
            $product->variants();
            $data['synchronous'] = true;
            $data['productSet'] = $product->toArray();
            // response()->json($data);
            $productData = $data;
            // dd($productData);
            // $productData['product'] = array_filter($productData['product'], function($data) {
            //     return $data !== null && !empty($data);
            // });

            // $productData = array_filter($productData, function($data) {
            //     return $data !== null && !empty($data);
            // });

            $config = auth()->user()->channelConfigs()->whereDomain($domain)->first();
            // $config = User::where("id",1)->first()->channelConfigs()->whereDomain($request->domain)->first();

            if(!$config) {
                throw new Exception("Seller for {$request->domain} Channel Not Found!", 422);
            }

            //dd(json_encode($productData));
            $shopify = new Shopify($config);

            $response = $shopify->createProduct($productData,"createProduct");

            if(isset($response['response']['errors']) ||  !$response['response']) {
                throw new Exception($response['response']['errors'][0]['message'] ?? $response['response']['errors']['message'] ?? "Unable to get Response!", 422);
            }
            dd($response['response']['data']['productSet']['variants']['nodes']);
            $variants = $response['response']['data']['productSet']['variants']['nodes'] ?? [];
            $shopifyProductID = $response['response']['data']['productSet']['product']['id'] ?? '';
            $create = [];

            DB::beginTransaction();

            foreach($variants as $variant){
                $create[] = [
                    "user_id" => auth()->user(),
                    "product_id" => $productId,
                    "shopify_variant_id" => $variant['id'],
                    "shopify_product_id" => $shopifyProductID,
                    "price" => $sellingPrice,
                    "created_at" => date("Y-m-d H:i:s")
                ];
            }

            MapShopifyProduct::insert($create);

            DB::commit();

            return response()->json([
                "status" => true,
                "statuscode" => 200,
                "message" => "Product Push to Shopify",
                "response" => $response['response']
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => false,
                "statuscode" => $e->getCode(),
                "message" => $e->getMessage()
            ]);
        }

    }*/

    public function pushToShopify(Request $request)
    {
        try {
            // ✅ Validate request
            $validator = Validator::make($request->all(), [
                "product_id" => "required|numeric|exists:products,product_id",
                "domain" => "required|exists:channel_configs,domain",
                "selling_price" => "required|numeric",
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first(), 422);
            }

            $driver = DB::connection()->getDriverName();

            // ✅ Handle filename extraction for MySQL / PostgreSQL
            $filename = $driver === 'mysql'
                ? DB::raw("SUBSTRING_INDEX(image_path, '/', -1) as filename")
                : DB::raw("split_part(image_path, '/', array_length(string_to_array(image_path, '/'), 1)) as filename");

            $productId = $request->product_id;
            $domain = $request->domain;
            $sellingPrice = $request->selling_price;

            // ✅ Static variable on model (if used)
            Product::$sellingPrice = $sellingPrice;

            // ✅ Load product and related images/files
            $product = Product::select(["product_id", "name as title"])
                ->with([
                    "files" => function ($q) use ($filename) {
                        $q->select([
                            "product_id",
                            DB::raw("CONCAT('" . asset('storage') . "/', image_path) as \"originalSource\""),
                            "alt_text as alt",
                            $filename,
                            DB::raw("'IMAGE' as \"contentType\""),
                        ]);
                    },
                ])
                ->where("product_id", $productId)
                ->first();

            if (!$product) {
                throw new Exception("Product not found!", 404);
            }

            // ✅ Fetch product options
            $product->productOptions = $product->productOptions()
                ->select([
                    DB::raw('DISTINCT product_attribute_values.product_id'),
                    'attributes.name as name',
                    'product_attribute_values.attribute_id'
                ])
                ->leftJoin('attributes', 'attributes.attribute_id', '=', 'product_attribute_values.attribute_id')
                ->with('values')
                ->get()
                ->toArray();

            // ✅ Default option if none found
            if (empty($product->productOptions)) {
                $product->productOptions = [
                    [
                        "name" => "DefaultOption",
                        "values" => [
                            ["name" => "DefaultValue"]
                        ],
                    ],
                ];
            }

            // ✅ Generate product data to push
            $product->variants(); // Ensure variants relationship is loaded
            $data = [
                'synchronous' => true,
                'productSet' => $product->toArray(),
            ];

            $productData = $data;
            // dd($productData);
            // ✅ Fetch Shopify config
            $config = auth()->user()->channelConfigs()->where('domain', $domain)->first();
            if (!$config) {
                throw new Exception("Seller for {$domain} Channel Not Found!", 422);
            }

            // ✅ Push product to Shopify
            $shopify = new Shopify($config);
            $response = $shopify->createProduct($productData, "createProduct");

            $respData = $response['response']['data']['productSet']['product'] ?? [];
            $variants = $respData['variants']['nodes'] ?? [];
            $idParts = explode('/', $respData['id'] ?? '1');
            $shopifyProductID = end($idParts);

            if (empty($respData)) {
                throw new Exception($response['response']['errors'][0]['message']
                    ?? $response['response']['errors']['message']
                    ?? "Unable to get valid Shopify response!", 422);
            }

            // ✅ Save variants mapping
            DB::beginTransaction();

            $create = [];
            foreach ($variants as $variant) {

                // Extract variant ID safely
                $variantIdParts = explode('/', $variant['id'] ?? '1');

                // Convert values to float safely
                $sellingPriceFloat = floatval($sellingPrice);
                $costPriceFloat = floatval($product->price);

                $create[] = [
                    "user_id" => auth()->id(),
                    "product_id" => $productId,
                    "shopify_variant_id" => end($variantIdParts),
                    "shopify_product_id" => $shopifyProductID,
                    "price" => $sellingPriceFloat,
                    "created_at" => now(),
                    "current_price" => $costPriceFloat,
                    "profit" => $sellingPriceFloat - $costPriceFloat,
                ];
            }


            if (!empty($create)) {
                MapShopifyProduct::insert($create);
            }

            DB::commit();

            return response()->json([
                "status" => true,
                "statuscode" => 200,
                "message" => "Product successfully pushed to Shopify!",
                "response" => $response['response'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => false,
                "statuscode" => $e->getCode() ?: 500,
                "message" => $e->getMessage(),
            ]);
        }
    }


    public function categoryProductShow($parentId, $categoryId)
    {
        dd($parentId, $categoryId);
    }
}
