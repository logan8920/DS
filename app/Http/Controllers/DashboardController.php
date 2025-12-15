<?php

namespace App\Http\Controllers;
use App\Models\{
    Banner,
    Category
};
use Illuminate\Http\Request;

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
}
