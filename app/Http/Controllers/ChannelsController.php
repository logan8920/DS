<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageHeading = "All Channels";
        $tabs = [
            "All Channels" => [
                "colDefs" => [
                    [
                        "targets" => -1,
                        "title" => "Actions",
                        "orderable" => false,
                        "searchable" => false,
                        "render" => "function(e, t, a, s) {
                            return `<a href='javascript:;' data-bs-toggle='tooltip' title='edit'>
                                Edit
                            </a>`;
                        }",

                    ]
                ],
                "columns" => [
                    ['data' => 'order_date', 'title' => 'Order Date'],
                    ['data' => 'shopify_order_id', 'title' => 'Shopify Order Id'],
                    ['data' => 'order_id', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer', 'title' => 'Customer Details'],
                    ['data' => 'mobile', 'title' => 'Mobile'],
                    ['data' => 'store', 'title' => 'Store Name'],
                    ['data' => 'store', 'title' => 'Action'],
                ],
                "url" => route('channels.allChannels.get')
            ]
        ];

        $defaultTabs = "All Channels";

        $firstRoute = route('channels.allChannels.get');
        return view('pages.channels.allChannels', compact('tabs', 'firstRoute', 'defaultTabs', 'pageHeading'));
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
    public function show(Request $request)
    {
        $data = [
            [
                'order_date' => '2025-08-16',
                'shopify_order_id' => '#SH12345',
                'order_id' => 'ORD001',
                'price' => '₹2500',
                'payment' => 'COD',
                'customer' => 'John Doe',
                'mobile' => '9876543210',
                'store' => 'Amazon',
            ],
            [
                'order_date' => '2025-08-15',
                'shopify_order_id' => '#SH12346',
                'order_id' => 'ORD002',
                'price' => '₹1800',
                'payment' => 'Prepaid',
                'customer' => 'Vishal Kumar',
                'mobile' => '9998887776',
                'store' => 'Flipkart',
            ]
        ];



        $order = $request->post('order');
        $start = $request->post('start') ?? 0;
        $length = $request->post('length') ?? 10;
        $search = $request->post('search')['value'] ?? null;

        // $query = User::selectRaw('(@rownum := @rownum + 1) AS s_no, users.id, users.name, users.firmname, business_name, users.username, users.status, users.datetime, users.created_by, users.email, users.created_at, users.phone')
        //     ->crossJoin(DB::raw('(SELECT @rownum := 0) r'))
        //     ->where('api_partner', 1)->with(['createdBy:id,name', 'apiCredentials:user_id,ipaddress','apiConfig:user_id,pg_company_id']);

        // if (auth()->user()->api_partner) {
        //     $query->where('id', auth()->user()->id);
        // }
        // // Search filter
        // if ($search) {
        //     $query->where(function ($q) use ($dbColumns, $search) {
        //         foreach ($dbColumns as $key => $column) {
        //             if ($key === 0) {
        //                 $q->where($column, 'like', "%$search%");
        //             } else {
        //                 $q->orWhere($column, 'like', "%$search%");
        //             }
        //         }
        //     });
        // }

        // // Order
        // if (isset($order[0]['dir'])) {
        //     $dir = $order[0]['dir'];
        //     $colIndex = $order[0]['column'] ?? false;
        //     $col = $dbColumns[$colIndex] ?? false;
        //     if ($col) {
        //         $query->orderBy($col, $dir);
        //     }
        // } else {
        //     $query->orderBy('users.id', 'desc');
        // }

        // // Count recordsFiltered before applying limit & offset
        // $recordsFiltered = $query->count(DB::raw('1'));

        // // Pagination
        // $data = $query->offset($start)->limit($length)->get()->toArray();

        // // Total records
        // $recordsTotal = User::count();

        // Prepare response
        $draw = $request->post('draw');
        $recordsTotal = count($data);
        $recordsFiltered = $data;
        $response = [
            'draw' => intval($draw),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data
        ];

        return response()->json($response);
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
