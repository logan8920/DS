<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SourceAProduct;
use Illuminate\Support\Facades\Validator;
use Exception;

class SourceaproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.sourceaproduct');
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
        $response = [];
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    "product_name" => 'required|string',
                    "category_id" => 'required|exists:categories,category_id',
                    "expected_price" => 'nullable|numeric',
                    "expected_daily_order" => 'nullable|numeric',
                    "product_info_type" => 'required|in:image,url',
                    "image" => 'nullable|required_if:product_info_type,image|mimes:png,jpeg,jpg,gif',
                    "link" => 'nullable|required_if:product_info_type,url|url',
                ]
            );

            if($validation->fails()){
                throw new Exception($validation->errors(), 422);
            }

            $data = $validation->validated();
            $data['user_id'] = auth()->id();
            $data['created_at'] = date('Y-m-d H:i:s');

            $created = SourceAProduct::create($data);

            if(!$created) {
                throw new Exception("Unable to process your request right now :(", 422);
            }

            $response = [
                'status' => true, 
                'success'  => "Your Request Submitted Successfully :)",
                'sweetAlert' => true,
                'reloadReq' =>true,
                'statuscode' => 200 
            ];

        } catch (Exception $e) {
            $response = [
                'status' => false, 
                'error'  => $e->getMessage(),
                'statuscode' => $e->getCode() 
            ];
        }

        return response()->json($response,200);

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
}
