@extends('layouts.main')
@section('title')
    - COD {{$pageHeading}}
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <!-- Buttons Extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/virtual-select.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
    </style>
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main pb-5 pl-5 pr-5 mt-5 pt-5 bg-grey">
        {{-- Filter --}}
        <section class="filters card">
            <div class="filter-header" onclick="toggleFilters()">
                <h3>Filters</h3>
                <button id="toggleBtn" type="button">▲</button>
            </div>

            <div id="filterBody" class="filter-body">
                <div>
                    <label>Order Status</label>
                    <select>
                        <option>Select</option>
                        <option>Pending</option>
                        <option>Delivered</option>
                        <option>RTO</option>
                    </select>
                </div>
                <div>
                    <label>Payment Method</label>
                    <select>
                        <option>Select</option>
                        <option>COD</option>
                        <option>Prepaid</option>
                    </select>
                </div>
                <div>
                    <label>Product Name</label>
                    <input type="text" placeholder="Enter product name">
                </div>
                <div>
                    <label>Store</label>
                    <select>
                        <option>Select</option>
                        <option>Amazon</option>
                        <option>Flipkart</option>
                    </select>
                </div>
                <div>
                    <label>Date</label>
                    <input type="date">
                </div>
                <div>
                    <label>Order Group</label>
                    <select>
                        <option>All Orders</option>
                        <option>Synced Orders</option>
                        <option>Un-synced Orders</option>
                    </select>
                </div>
                <div class="actions">
                    <button class="reset">Reset</button>
                    <button class="apply">Apply</button>
                </div>
            </div>
        </section>

        {{-- Order Section --}}
        <section class="orders card">
            <div class="orders-header">
                <h3>{{$pageHeading ?? 'Title'}}</h3>
                <div class="order-actions">
                    {{-- <button class="btn-cancel">Cancel</button>
                    <button class="btn-confirm">Confirm</button> 
                    <button class="btn-export">Export CSV</button> --}}
                </div>
            </div>

            <!-- Tabs -->
            <div class="order-tabs">
                @php $index = 0; @endphp
                @foreach ($tabs as $tab => $data)
                    <button {!! !$index ? `class="active"` : '' !!} data-filter="{{ $tab }}">{{ $tab }}</button>
                    @php $index++; @endphp
                @endforeach
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" style="width:100%"></table>
            </div>

        </section>
    </main>
    <!-- End of Main -->
@endsection
@section('js')
    <script>
        let CONFIG = {!! json_encode($tabs) !!};
        let NEWCONFIG = {};
        Object.keys(CONFIG).forEach(tab => {
            CONFIG[tab].colDefs = CONFIG[tab].colDefs.map((def) => {
                if (typeof def.render === "string" && def.render.trim().startsWith("function")) {
                    def.render = eval("(" + def.render + ")");
                }
                return def;
            });
            NEWCONFIG[tab] = CONFIG[tab]
        });

        // Data Table Config
        let tableData = {};
        let cols = [];
        let ajaxUrl = '{{ $firstRoute }}';
        let colDefs = [];
        let cTab = '{{ $defaultTabs }}';
        let configuration = () => {
            return {
                ajax: {
                    url: NEWCONFIG[cTab]?.url,
                    type: 'POST',
                    data: function(d) {
                        [...filterBody.querySelectorAll('input,select')].forEach(ele => {
                            d[ele.name] = ele.value;
                        });
                        d._token = '{{ csrf_token() }}';
                    },
                },
                columns: NEWCONFIG[cTab]?.columns || [],
                columnDefs: NEWCONFIG[cTab]?.colDefs || [],
                lengthChange: true,
                ordering: true,
                order: [],
                info: true,
                dom: 'Bfrtip', // B = Buttons
                buttons: [{
                    extend: 'csvHtml5',
                    text: 'Export CSV',
                    className: 'btn-export'
                }],
                processing: true,
                serverSide: true,
                initComplete: function() {
                    let filter = NEWCONFIG[cTab]?.filter;
                    if (filter) {
                        makeFilter(filter);
                    }
                }
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="{{ asset('assets/js/virtual-select.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
    <script>
        $(document).ready(function() {
            table.buttons().container().appendTo('.order-actions');
            table.buttons().container().find('button').removeClass("dt-button");
            // 🔹 Move the button into your custom header area


            // 🔹 Tab click filter
            $('.order-tabs button').on('click', function() {
                $('.order-tabs button').removeClass('active');
                $(this).addClass('active');

                // $('.table-responsive').hide();

                var filterValue = $(this).data('filter');
                table.destroy();
                cTab = filterValue;
                $('title').text(`Wolmart - ${cTab} Orders`);
                table = $('#dataTable').DataTable(configuration());
                table.buttons().container().appendTo('.order-actions');
                table.buttons().container().find('button').removeClass("dt-button");
                //filterValue && ;

            });
            // setTimeout(() => {
            //     $('.table-responsive').hide();
            //     $('.order-tabs button.active').click();
            // }, 1000)
        });

        function makeFilter(filterData) {
            filterBody.innerHTML = "";
            Object.keys(filterData).forEach(filter => {
                let $div = $('<div>');
                $div.append($('<lable>').text(filter));
                let filterType = filterData[filter].type;
                let $filter;
                if (filterType === "input") {
                    $filter = $(
                        `<${filterType} type="${filterData[filter]?.subtype}" name="${filterData[filter]?.name}" placeholder="${filterData[filter]?.placeholder}" class="${filterData[filter]?.className}">`
                    )
                } else {
                    $filter = $(
                        `<${filterType} name="${filterData[filter]?.name}" class="${filterData[filter]?.className}">`
                    );
                    let options = {
                        ...filterData[filter]?.option
                    }
                    $.each(options, function(val, text) {
                        $filter.append(new Option(text, val));
                    });
                }

                $div.append($filter);
                $(filterBody).append($div);

                if ($filter.hasClass("daterange")) {
                    var start = moment().subtract(10, 'days');
                    var end = moment();

                    function cb(start, end) {
                        $filter.html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                            'MMMM D, YYYY'));
                    }

                    $filter.daterangepicker({
                        startDate: start,
                        endDate: end,
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                                .subtract(1, 'month').endOf('month')
                            ]
                        }
                    }, cb);

                    cb(start, end);

                }

                if ($filter.hasClass("virtualSelect")) {
                    VirtualSelect.init({
                        ele: $filter[0],
                    });
                }

            });

            $(filterBody).append($(
                '<div class="actions"><br><button class="reset">Reset</button><button class="apply">Apply</button></div>'
            ));
        }

        $(document).on("click","#filterBody button.apply",function(e){
            e.preventDefault();
            table.ajax.reload();
        });

        $(document).on("click","#filterBody button.reset",function(e){
            e.preventDefault();
            [...filterBody.querySelectorAll('select,input')].forEach(ele => ele.reset());
            table.ajax.reload();
        });
    </script>
@endsection
