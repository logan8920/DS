<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Exception;
use DB;

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
                    ['data' => 'name', 'title' => 'Store Name'],
                    ['data' => 'callback_url', 'title' => 'Store Url'],
                    ['data' => 'domain', 'title' => 'Channel Name'],
                    ['data' => 'is_active', 'title' => 'IS Active'],
                    ['data' => 'created_at', 'title' => 'Pull Date'],
                    ['data' => 'created_at', 'title' => 'Created on'],
                    ['data' => 'name', 'title' => 'Action'],
                ],
                "url" => route('channels.allChannels.get')
            ]
        ];

        $defaultTabs = "All Channels";

        $firstRoute = route('channels.allChannels.get');
        return view('pages.channels.allchannels', compact('tabs', 'firstRoute', 'defaultTabs', 'pageHeading'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $channels = Channel::all();
        $pageHeading = "Add Channel";
        return view('pages.channels.createchannel', compact('channels', 'pageHeading'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                "channel_id" => "required|numeric|exists:channels,id",
                "domain" => "required|unique:channel_configs,domain",
                "api_key" => "required",
                "api_key_secret" => "required",
                "access_token" => "required"
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first(), 422);
            }

            $data = $validator->validated();

            $data['created_at'] = now();
            $data['seller_id'] = auth()->id();

            $result = ChannelConfig::create($data);

            if(!$result) {
                throw new Exception("Unable to create channel!", 422);
            } 

            return response()->json([
                "success" => "Channel Created Successfully!",
                "sweetAlert" => true,
                "redirect" => route('channels.allChannels') 
            ],200);

        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                //"redirect" => route('channels.allChannels') 
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
        $order = $request->post('order');
        $start = $request->post('start') ?? 0;
        $length = $request->post('length') ?? 10;
        $search = $request->post('search')['value'] ?? null;

        $dbColumns = [
            'channel_configs.domain', 
            'callback_url', 
            'channels.name', 
            'channel_configs.created_at'
        ];

        $query = ChannelConfig::selectRaw("domain, callback_url, channels.name, channel_configs.created_at, 'Active' as is_active")
        ->join('channels', 'channels.id', '=', 'channel_configs.channel_id');

        $query->where('seller_id', auth()->user()->id);
        // Search filter
        if ($search) {
            $query->where(function ($q) use ($dbColumns, $search) {
                foreach ($dbColumns as $key => $column) {
                    if ($key === 0) {
                        $q->where($column, 'like', "%$search%");
                    } else {
                        $q->orWhere($column, 'like', "%$search%");
                    }
                }
            });
        }

        // Order
        if (isset($order[0]['dir'])) {
            $dir = $order[0]['dir'];
            $colIndex = $order[0]['column'] ?? false;
            $col = $dbColumns[$colIndex] ?? false;
            if ($col) {
                $query->orderBy($col, $dir);
            }
        } else {
            $query->orderBy('channel_configs.id', 'desc');
        }

        // Count recordsFiltered before applying limit & offset
        $recordsFiltered = $query->count(DB::raw('1'));

        // Pagination
        $data = $query->offset($start)->limit($length)->get()->toArray();

        // Total records
        $recordsTotal = ChannelConfig::count();

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
