@extends('layouts.main')
@section('title')
    - {{ $pageHeading }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/virtual-select.min.css') }}" />
    <style>
        /* ============================
                                                                                                                           Orders Section
                                                                                                                        ============================ */
        .orders.card {
            border-radius: 12px;
            padding: 30px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            margin-top: 20px;
            font-family: "Inter", sans-serif;
        }

        /* Header with actions */
        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .order-actions button {
            margin-left: 10px;
            padding: 6px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-cancel {
            background: #ffe0e0;
            color: #d33;
        }

        .btn-cancel:hover {
            background: #ffcccc;
        }

        .btn-confirm {
            background: #e0ffe0;
            color: #2a7;
        }

        .btn-confirm:hover {
            background: #c9f7c9;
        }

        .btn-export {
            background: #fff;
            border: 1px solid #aaa;
            color: #333;
        }

        .btn-export:hover {
            background: #f9f9f9;
        }

        /* ============================
                                                                                                                           Tabs
                                                                                                                        ============================ */
        .order-tabs {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .order-tabs button {
            background: #f4f4f9;
            border: 1px solid #ddd;
            padding: 6px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .order-tabs button:hover {
            background: #ececec;
        }

        .order-tabs button.active {
            background: #6a11cb;
            color: #fff;
            border: 1px solid #6a11cb;
        }

        /* ============================
                                                                                                                           Counters (Total / Selected)
                                                                                                                        ============================ */
        .order-counters {
            margin-bottom: 15px;
            display: flex;
            gap: 10px;
        }

        .order-counters span {
            display: inline-block;
            padding: 6px 12px;
            border: 1px solid #6a11cb;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #6a11cb;
            background: #fafafa;
        }

        /* ============================
                            Table Styling
                        ============================ */
        .table-responsive {
            margin-top: 10px;
        }

        #ordersTable {
            width: 100%;
            border-collapse: collapse;
        }

        #ordersTable thead th {
            background: #fafafa;
            font-weight: 600;
            font-size: 13px;
            color: #444;
            padding: 10px;
            border-bottom: 1px solid #eaeaea;
        }

        #ordersTable tbody td {
            font-size: 13px;
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
        }

        #ordersTable tbody tr:hover {
            background: #f9f9ff;
        }

        .btn-view {
            background: #6a11cb;
            color: #fff;
            border: none;
            padding: 4px 10px;
            font-size: 12px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-view:hover {
            background: #541a91;
        }

        /* Filter container */
        .filters.card {
            border-radius: 12px;
            padding: 0;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            background: #fff;
        }

        /* Header bar */
        .filter-header {
            background: #f4f4f9;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            border-bottom: 1px solid #e0e0e0;
        }

        .filter-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .filter-header button {
            background: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
            color: #6a11cb;
            font-weight: 600;
        }

        /* Body grid */
        .filter-body {
            padding: 15px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .filter-body label {
            display: block;
            font-size: 12px;
            margin-bottom: 5px;
            color: #555;
        }

        .filter-body input,
        .filter-body select {
            width: 100%;
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        .filter-body input:focus,
        .filter-body select:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 4px rgba(106, 17, 203, 0.3);
        }

        /* Actions (Reset/Apply buttons) */
        .filter-body .actions {
            /* grid-column: span 2;
                                                                display: flex; */
            gap: 10px;
            justify-content: flex-end;
        }

        .filter-body .reset {
            background: #e0e0e0;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
        }

        .filter-body .apply {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid #f5f2f2 !important;
            padding: 10px;
        }

        .dataTables_processing {
            position: absolute !important;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
            font-size: 18px;
            color: #333;
            font-weight: 500;
        }

        /* spinner animation */
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .card-channel, .channel-all {
            border: 1px solid #e1e1e2;
            padding: 12px 20px 12px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        label.channel-all:has(input[type=radio]:checked)::after {
            content: "✔";
            font-size: 19px;
            position: absolute;
            right: -10px;
            top: -11px;
            background: #ec7a5c;
            height: 30px;
            width: 30px;
            text-align: center;
            color: #fff;
            border-radius: 50px;
        }
    </style>
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main pb-5 pl-5 pr-5 mt-5 pt-5 bg-grey">
        <form method="post" action="{{ route('channels.store') }}" autocomplete="off" id="regForm">
            @csrf
            {{-- Order Section --}}
            <section class="orders card">
                <div class="orders-header">
                    <h3>{{ $pageHeading ?? 'Title' }}</h3>
                </div>

                <div class="row">
                    @foreach ($channels as $channel)
                        <label for="input-{{ $channel->id }}" class="col-md-1 col-sm-3 channel-all mr-1 mb-1"
                            data-tab="#tab-{{ $channel->id }}" style="cursor: pointer">
                            <img src="{{ asset(Storage::url($channel->image)) }}" alt="{{ $channel->image }}"
                                onerror="this.src = `{{ asset('assets/images/No_image_available.png') }}`">
                            <input type="radio" id="input-{{ $channel->id }}" {{ $loop->first ? 'checked' : '' }} hidden
                                name="channel_id" value="{{ $channel->id }}">
                        </label>
                    @endforeach
                </div>

            </section>
            @foreach ($channels as $channel)
                <section class="orders card channel-section" id="tab-{{ $channel->id }}">
                    <div class="orders-header">
                        <div class="form-group">
                            <label for="private-{{ $channel->id }}" class="mr-3">
                                <input type="radio" checked name="channel_type" value="0"
                                    id="private-{{ $channel->id }}"> Private
                            </label>
                            <label for="public-{{ $channel->id }}">
                                <input type="radio" name="channel_type" id="public-{{ $channel->id }}" value="1">
                                Public
                            </label>
                        </div>
                    </div>

                    <div class="row channel-type" id="box-0">
                        <div class="col-md-3 col-sm-12"> 
                            <div class="form-group mb-2">
                                <label class="mb-2" for="domain">
                                    <i class="w-icon-visit"></i>&nbsp; Domain Name
                                    <span class="text-danger">*</span></label>
                                <input required type="text" name="domain" id="domain" class="form-control"
                                    placeholder="Enter you shopify domain..." value="rmspn9-sg.myshopify.com">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group mb-2">
                                <label class="mb-2" for="api_key">
                                    <i class="w-icon-lightning"></i>&nbsp; Api Key
                                    <span class="text-danger">*</span>
                                </label>
                                <input required type="text" name="api_key" id="api_key" class="form-control"
                                    placeholder="Enter you shopify Api Key..." value="a1a7bdfea27c0bbd2208e213d1934b70">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group mb-2">
                                <label class="mb-2" for="api_key_secret">
                                    <i class="w-icon-bag"></i>&nbsp; Api key Secret
                                    <span class="text-danger">*</span></label>
                                <input required type="text" name="api_key_secret" id="api_key_secret" class="form-control"
                                    placeholder="Enter Api key Secret..." value="a1a7bdfea27c0bbd2208e213d1934b70">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="form-group mb-2">
                                <label class="mb-2" for="access_token">
                                    <i class="w-icon-bag"></i>&nbsp;Access Token
                                    <span class="text-danger">*</span></label>
                                <input required type="text" name="access_token" id="access_token" class="form-control"
                                    placeholder="Enter Access Token..." value="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">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mt-2">
                            <button class="btn btn-success" type="submit"> Submit&nbsp;<i class="w-icon-truck2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row channel-type" id="box-1">
                        <div class="col-md-2 col-sm-12 card-channel text-center">
                            <img src="{{ asset(Storage::url($channel->image)) }}" alt="{{ $channel->image }}"
                                onerror="this.src = `{{ asset('assets/images/No_image_available.png') }}`">
                                <h5>{{ $channel->name }}</h5>
                                <a href="{{ $channel->callback }}" class="btn btn-dark" > <i class="w-icon-truck2"></i>&nbsp; Add</a>
                        </div>
                    </div>
                </section>
            @endforeach
        </form>
    </main>
    <!-- End of Main -->
@endsection
@section('js')
    <script src="{{ asset('assets/js/virtual-select.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $(".channel-all").on("click", function(e) {
                $("section.channel-section").each(function() {
                    $(this).hide();
                    $(this).find("input:not(input[type=radio])").val("");
                    $(this).find("input").removeAttr("required").prop("disabled", true);
                });
                //console.log(this);
                const tabId = $(this).data("tab");

                if(!tabId) return;

                console.log(tabId);
                $(tabId).show();
                $(tabId).find("input").attr("required", true).prop("disabled", false);
            });

            $('input[name=channel_type]').on("change",function(e){

                $(".channel-type").hide();

                const rowId = `#box-${this.value}`;
                console.log(rowId);
                $(rowId).show();


            });

            $('input[name=channel_type]:checked').trigger("change");

            $('.label[data-tab]:checked').trigger("click");
        });
    </script>
@endsection
