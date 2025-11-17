@extends('layouts.main2')
@section('title')
    - Analytics
@endsection
@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            padding: 20px;
        }

        .main {
            display: flex;
            flex-direction: column;
            gap: 20px;
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
            grid-column: span 2;
            display: flex;
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

        .kpis {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .charts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
        }

        h4 {
            margin: 0 0 10px 0;
            font-size: 16px;
            font-weight: bold;
        }

        table.dataTable {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <!-- Start of Main -->
    <main class="main mb-10 pb-1 mt-5">
        <!-- 🔹 Filters -->
        <section class="filters card">
            <div class="filter-header" onclick="toggleFilters()">
                <h3>Orders</h3>
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

        <!-- 🔹 KPI Cards -->
        <section class="kpis">
            <div class="card">
                <h4>Orders</h4>
                <p id="orders">0</p>
            </div>
            <div class="card">
                <h4>GMV</h4>
                <p id="gmv">₹0</p>
            </div>
            <div class="card">
                <h4>Margin %</h4>
                <p id="margin">0%</p>
            </div>
            <div class="card">
                <h4>Delivered %</h4>
                <p id="delivered">0%</p>
            </div>
            <div class="card">
                <h4>RTO %</h4>
                <p id="rto">0%</p>
            </div>
        </section>

        <!-- 🔹 Charts -->
        <section class="charts">
            <div class="card">
                <h4>Orders & GMV</h4>
                <div id="ordersGmvChart"></div>
            </div>
            <div class="card">
                <h4>Orders & Margin</h4>
                <div id="ordersMarginChart"></div>
            </div>
            <div class="card">
                <h4>Orders by Status</h4>
                <div id="ordersStatusChart"></div>
            </div>
            <div class="card">
                <h4>Delivery vs RTO</h4>
                <div id="deliveryRtoChart"></div>
            </div>
            <div class="card">
                <h4>Delivery by Product</h4>
                <div id="deliveryProductChart"></div>
            </div>
            <div class="card">
                <h4>Delivery by State</h4>
                <div id="deliveryStateChart"></div>
            </div>
        </section>

        <!-- 🔹 Data Table -->
        <section class="card">
            <h4>Delivery by Margin</h4>
            <table id="marginTable" class="display">
                <thead>
                    <tr>
                        <th>Margin % (Applicable)</th>
                        <th>Your Analysis Order Share %</th>
                        <th>Your Analysis Delivered %</th>
                        <th>Platform Order Share %</th>
                        <th>Platform Delivered %</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1%-100%</td>
                        <td>0%</td>
                        <td>0%</td>
                        <td>5.8%</td>
                        <td>6.9%</td>
                    </tr>
                    <tr>
                        <td>101%-150%</td>
                        <td>0%</td>
                        <td>0%</td>
                        <td>9.2%</td>
                        <td>8.6%</td>
                    </tr>
                    <tr>
                        <td>151%-200%</td>
                        <td>0%</td>
                        <td>0%</td>
                        <td>9.6%</td>
                        <td>11.8%</td>
                    </tr>
                    <tr>
                        <td>201%-300%</td>
                        <td>0%</td>
                        <td>0%</td>
                        <td>56.4%</td>
                        <td>51.3%</td>
                    </tr>
                    <tr>
                        <td>Above 300%</td>
                        <td>0%</td>
                        <td>0%</td>
                        <td>18.7%</td>
                        <td>20.7%</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <!-- End of Main -->
@endsection
@section('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {

            // Demo KPI values
            $('#orders').text("1245");
            $('#gmv').text("₹8,52,000");
            $('#margin').text("12.5%");
            $('#delivered').text("92%");
            $('#rto').text("4.3%");

            // Highcharts - Orders & GMV
            Highcharts.chart('ordersGmvChart', {
                chart: {
                    zoomType: 'xy'
                },
                title: {
                    text: ''
                },
                xAxis: [{
                    categories: ['Jan', 'Feb', 'Mar']
                }],
                yAxis: [{
                    title: {
                        text: 'Orders'
                    }
                }, {
                    title: {
                        text: 'GMV'
                    },
                    opposite: true
                }],
                series: [{
                        type: 'column',
                        name: 'Orders',
                        data: [120, 150, 180]
                    },
                    {
                        type: 'spline',
                        name: 'GMV',
                        data: [20000, 25000, 30000],
                        yAxis: 1
                    }
                ]
            });

            // Orders & Margin
            Highcharts.chart('ordersMarginChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar']
                },
                series: [{
                    name: 'Margin %',
                    data: [12, 14, 13]
                }]
            });

            // Orders by Status
            Highcharts.chart('ordersStatusChart', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                series: [{
                    name: 'Orders',
                    data: [{
                            name: 'Delivered',
                            y: 120
                        },
                        {
                            name: 'RTO',
                            y: 10
                        },
                        {
                            name: 'Pending',
                            y: 5
                        }
                    ]
                }]
            });

            // Delivery vs RTO
            Highcharts.chart('deliveryRtoChart', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                series: [{
                    name: 'Count',
                    data: [{
                            name: 'Delivered',
                            y: 92
                        },
                        {
                            name: 'RTO',
                            y: 8
                        }
                    ]
                }]
            });

            // Delivery by Product
            Highcharts.chart('deliveryProductChart', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['Shoes', 'Shirts', 'Bags']
                },
                series: [{
                    name: 'Orders',
                    data: [40, 25, 35]
                }]
            });

            // Delivery by State
            Highcharts.chart('deliveryStateChart', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['Odisha', 'MH', 'WB']
                },
                series: [{
                    name: 'Orders',
                    data: [50, 30, 20]
                }]
            });

            // DataTable init
            $('#marginTable').DataTable({
                paging: true,
                searching: false,
                info: false
            });

        });

    </script>
@endsection
