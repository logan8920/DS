<?php

namespace App\Http\Controllers;
use App\Models\{Product,User};
use Illuminate\Http\Request;
use App\Libraries\Shopify;
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

    public function details(Product $product)
    {
        $moreProducts = Product::where("product_id","!=",$product->product_id)->limit(30)->get();
        return view('pages.product-details',compact('product','moreProducts'));
    }

    public function categories()
    {
        return view('pages.product-categories');
    }

    public function pushToShopify(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                "product_id" => "required|numeric|exists:products,product_id",
                "domain" => "required|exists:channel_configs,domain"
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first(), 422);
            }
            $data = [];
            $productId = $request->product_id;
            $domain = $request->domain;
            $product = Product::select(["product_id", "name as title"])
                ->with([
                    "files" => function ($q) {
                        $q->select([
                            "product_id",
                            DB::raw("CONCAT('" . asset('storage') . "/', image_path) as \"originalSource\""),
                            "alt_text as alt",
                            DB::raw("SUBSTRING_INDEX(image_path, '/', -1) AS \"filename\""),
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

    public function categoryProductShow($parentId, $categoryId){
        dd($parentId,$categoryId);
    }
}
