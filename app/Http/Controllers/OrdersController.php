<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\{Statuses};
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Statuses::select(['name', 'status_id'])->get()->pluck('name', 'status_id')->toArray();
        $pageHeading = "Orders";
        $tabs = [
            "All" => [
                "colDefs" => [
                    [
                        "targets" => -1,
                        "title" => "Actions",
                        "orderable" => false,
                        "searchable" => false,
                        "render" => "function(e, t, a, s) {
                            const btnId = 'x-'+ parseInt(Math.random() * 1000000);
                            tableData['order_details'][btnId] = a?.order_id;
                            const aTag = document.createElement('a');
                            aTag.href = 'javascript:;';
                            aTag.setAttribute('data-bs-toggle','tooltip');
                            aTag.setAttribute('data-order-id',btnId);
                            aTag.title = 'Pay to proceed the order';
                            aTag.textContent = 'Pay';
                            return e == 'yes' ? (!a?.payment_details?.order_id ? aTag.outerHTML : 'Payment Done') : 'Order COD';
                        }",

                    ]
                ],
                "columns" => [
                    ['data' => 'order_date', 'title' => 'Order Date'],
                    ['data' => 'shopify_order_id', 'title' => 'Shopify Order Id'],
                    ['data' => 'order_number', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer.name', 'title' => 'Customer Details'],
                    ['data' => 'customer.phone', 'title' => 'Mobile'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Store Name'],
                    ['data' => 'payment_required', 'title' => 'Action'],
                ],
                "filter" => [
                    "Date Range" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "date_range",
                        "className" => " daterange"
                    ],
                    "DD Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "ddId",
                        "className" => "",
                        "placeholder" => "DD Id"
                    ],
                    "Order Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "orderKeyword",
                        "className" => "",
                        "placeholder" => "Order Id Or Awb No Or Dropshipper Order Id"
                    ],
                    "Customer Keyword" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "customerKeyword",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Product Name" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "product_name",
                        "className" => "",
                        "placeholder" => "Product Name"
                    ],
                    "Status" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => $statuses,
                        "name" => "statusId",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Payment Mode" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select payment mode",
                            "1" => "COD",
                            "2" => "Prepaid",
                        ],
                        "name" => "paymentMode",
                        "className" => "",
                        "placeholder" => ""
                    ],
                    "Search by store" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [],
                        "name" => "search_by_store",
                        "className" => "virtualSelect",
                        "placeholder" => ""
                    ],
                    "Rto Keyword Errors" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select RTO Error",
                            "true" => "Orders with RTO keywords error",
                            "false" => "Orders without RTO keywords error",
                        ],
                        "name" => "rtoKeywordErrors",
                        "className" => "",
                        "placeholder" => ""
                    ],
                ],
                "url" => route('orders.type', 'All')
            ],
            "COD" => [
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
                    ['data' => 'order_number', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer.name', 'title' => 'Customer Details'],
                    ['data' => 'customer.phone', 'title' => 'Mobile'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Store Name'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Action'],
                ],
                "filter" => [
                    "DateRange" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "date_range",
                        "className" => " daterange"
                    ],
                    "DD Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "ddId",
                        "className" => "",
                        "placeholder" => "DD Id"
                    ],
                    "Order Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "orderKeyword",
                        "className" => "",
                        "placeholder" => "Order Id Or Awb No Or Dropshipper Order Id"
                    ],
                    "Customer Keyword" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "customerKeyword",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Product Name" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "product_name",
                        "className" => "",
                        "placeholder" => "Product Name"
                    ],
                    "Status" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => $statuses,
                        "name" => "statusId",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Payment Mode" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select payment mode",
                            "1" => "COD",
                            "2" => "Prepaid",
                        ],
                        "name" => "paymentMode",
                        "className" => "",
                        "placeholder" => ""
                    ],
                    "Search by store" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [],
                        "name" => "search_by_store",
                        "className" => "virtualSelect",
                        "placeholder" => ""
                    ],
                    "Rto Keyword Errors" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select RTO Error",
                            "true" => "Orders with RTO keywords error",
                            "false" => "Orders without RTO keywords error",
                        ],
                        "name" => "rtoKeywordErrors",
                        "className" => "",
                        "placeholder" => ""
                    ],
                ],
                "url" => route('orders.type', 'COD')
            ],
            "Prepaid" => [
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
                    ['data' => 'order_number', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer.name', 'title' => 'Customer Details'],
                    ['data' => 'customer.phone', 'title' => 'Mobile'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Store Name'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Action'],
                ],
                "filter" => [
                    "Date Range" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "date_range",
                        "className" => " daterange"
                    ],
                    "DD Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "ddId",
                        "className" => "",
                        "placeholder" => "DD Id"
                    ],
                    "Order Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "orderKeyword",
                        "className" => "",
                        "placeholder" => "Order Id Or Awb No Or Dropshipper Order Id"
                    ],
                    "Customer Keyword" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "customerKeyword",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Product Name" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "product_name",
                        "className" => "",
                        "placeholder" => "Product Name"
                    ],
                    "Status" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select status",
                            "1" => "New",
                            "2" => "Confirmed",
                            "3" => "Cancelled",
                            "4" => "Pickup Initiated",
                            "5" => "Pickup Cancelled",
                            "6" => "Manifested",
                            "7" => "Pickup Pending",
                            "8" => "Pickup Completed",
                            "9" => "In Transit",
                            "10" => "Undelivered",
                            "11" => "Out For Delivery",
                            "12" => "Delivered",
                            "13" => "RTO",
                            "14" => "RTO In Transit",
                            "15" => "RTO Delivered",
                            "16" => "Booking in Process",
                            "17" => "Cancel in Process",
                            "18" => "Shipment Lost",
                            "19" => "Shipment Damaged",
                            "20" => "Order Confirmation In Process",
                            "21" => "Shipment Cancelled",
                            "22" => "Out for Pickup",
                            "200" => "Cancelled on Dropdash",
                            "201" => "Booked",
                            "202" => "Unprocessable Order",
                        ],
                        "name" => "statusId",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Payment Mode" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select payment mode",
                            "1" => "COD",
                            "2" => "Prepaid",
                        ],
                        "name" => "paymentMode",
                        "className" => "",
                        "placeholder" => ""
                    ],
                    "Search by store" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [],
                        "name" => "search_by_store",
                        "className" => "virtualSelect",
                        "placeholder" => ""
                    ],
                    "Rto Keyword Errors" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select RTO Error",
                            "true" => "Orders with RTO keywords error",
                            "false" => "Orders without RTO keywords error",
                        ],
                        "name" => "rtoKeywordErrors",
                        "className" => "",
                        "placeholder" => ""
                    ],
                ],
                "url" => route('orders.type', 'Prepaid')
            ],
            "{$statuses[2]}" => [
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
                    ['data' => 'order_number', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer.name', 'title' => 'Customer Details'],
                    ['data' => 'customer.phone', 'title' => 'Mobile'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Store Name'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Action'],
                ],
                "filter" => [
                    "Date Range" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "date_range",
                        "className" => " daterange"
                    ],
                    "DD Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "ddId",
                        "className" => "",
                        "placeholder" => "DD Id"
                    ],
                    "Order Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "orderKeyword",
                        "className" => "",
                        "placeholder" => "Order Id Or Awb No Or Dropshipper Order Id"
                    ],
                    "Customer Keyword" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "customerKeyword",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Product Name" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "product_name",
                        "className" => "",
                        "placeholder" => "Product Name"
                    ],
                    "Status" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => $statuses,
                        "name" => "statusId",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Payment Mode" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select payment mode",
                            "1" => "COD",
                            "2" => "Prepaid",
                        ],
                        "name" => "paymentMode",
                        "className" => "",
                        "placeholder" => ""
                    ],
                    "Search by store" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [],
                        "name" => "search_by_store",
                        "className" => "virtualSelect",
                        "placeholder" => ""
                    ],
                    "Rto Keyword Errors" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select RTO Error",
                            "true" => "Orders with RTO keywords error",
                            "false" => "Orders without RTO keywords error",
                        ],
                        "name" => "rtoKeywordErrors",
                        "className" => "",
                        "placeholder" => ""
                    ],
                ],
                "url" => route('orders.type', 'Confirmed')
            ],
            "{$statuses[3]}" => [
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
                    ['data' => 'order_number', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer.name', 'title' => 'Customer Details'],
                    ['data' => 'customer.phone', 'title' => 'Mobile'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Store Name'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Action'],
                ],
                "filter" => [
                    "Date Range" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "date_range",
                        "className" => " daterange"
                    ],
                    "DD Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "ddId",
                        "className" => "",
                        "placeholder" => "DD Id"
                    ],
                    "Order Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "orderKeyword",
                        "className" => "",
                        "placeholder" => "Order Id Or Awb No Or Dropshipper Order Id"
                    ],
                    "Customer Keyword" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "customerKeyword",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Product Name" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "product_name",
                        "className" => "",
                        "placeholder" => "Product Name"
                    ],
                    "Status" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => $statuses,
                        "name" => "statusId",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Payment Mode" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select payment mode",
                            "1" => "COD",
                            "2" => "Prepaid",
                        ],
                        "name" => "paymentMode",
                        "className" => "",
                        "placeholder" => ""
                    ],
                    "Search by store" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [],
                        "name" => "search_by_store",
                        "className" => "virtualSelect",
                        "placeholder" => ""
                    ],
                    "Rto Keyword Errors" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select RTO Error",
                            "true" => "Orders with RTO keywords error",
                            "false" => "Orders without RTO keywords error",
                        ],
                        "name" => "rtoKeywordErrors",
                        "className" => "",
                        "placeholder" => ""
                    ],
                ],
                "url" => route('orders.type', 'Cancelled')
            ],
            "{$statuses[25]}" => [
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
                    ['data' => 'order_number', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer.name', 'title' => 'Customer Details'],
                    ['data' => 'customer.phone', 'title' => 'Mobile'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Store Name'],
                    ['data' => 'order_item.seller.store_name', 'title' => 'Action'],
                ],
                "filter" => [
                    "Date Range" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "date_range",
                        "className" => " daterange"
                    ],
                    "DD Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "ddId",
                        "className" => "",
                        "placeholder" => "DD Id"
                    ],
                    "Order Id" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "orderKeyword",
                        "className" => "",
                        "placeholder" => "Order Id Or Awb No Or Dropshipper Order Id"
                    ],
                    "Customer Keyword" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "customerKeyword",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Product Name" => [
                        "type" => "input",
                        "subtype" => "text",
                        "name" => "product_name",
                        "className" => "",
                        "placeholder" => "Product Name"
                    ],
                    "Status" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => $statuses,
                        "name" => "statusId",
                        "className" => "",
                        "placeholder" => "Customer name"
                    ],
                    "Payment Mode" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select payment mode",
                            "1" => "COD",
                            "2" => "Prepaid",
                        ],
                        "name" => "paymentMode",
                        "className" => "",
                        "placeholder" => ""
                    ],
                    "Search by store" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [],
                        "name" => "search_by_store",
                        "className" => "virtualSelect",
                        "placeholder" => ""
                    ],
                    "Rto Keyword Errors" => [
                        "type" => "select",
                        "subtype" => "",
                        "option" => [
                            "0" => "Select RTO Error",
                            "true" => "Orders with RTO keywords error",
                            "false" => "Orders without RTO keywords error",
                        ],
                        "name" => "rtoKeywordErrors",
                        "className" => "",
                        "placeholder" => ""
                    ],
                ],
                "url" => route('orders.type', 'Unprocessable Order')
            ],
            // "Sync Error" => [
            //     "colDefs" => [
            //         [
            //             "targets" => -1,
            //             "title" => "Actions",
            //             "orderable" => false,
            //             "searchable" => false,
            //             "render" => "function(e, t, a, s) {
            //                 return `<a href='javascript:;' data-bs-toggle='tooltip' title='edit'>
            //                     Edit
            //                 </a>`;
            //             }",

            //         ]
            //     ],
            //     "columns" => [
            //         ['data' => 'order_date', 'title' => 'Order Date'],
            //         ['data' => 'shopify_order_id', 'title' => 'Shopify Order Id'],
            //         ['data' => 'order_id', 'title' => 'Order Id'],
            //         ['data' => 'price', 'title' => 'Price'],
            //         ['data' => 'payment', 'title' => 'Payment'],
            //         ['data' => 'customer', 'title' => 'Customer Details'],
            //         ['data' => 'mobile', 'title' => 'Mobile'],
            //         ['data' => 'store', 'title' => 'Store Name'],
            //         ['data' => 'store', 'title' => 'Action'],
            //     ],
            //     "filter" => [
            //         "Date Range" => [
            //             "type" => "input",
            //             "subtype" => "text",
            //             "name" => "date_range",
            //             "className" => " daterange"
            //         ],
            //         "DD Id" => [
            //             "type" => "input",
            //             "subtype" => "text",
            //             "name" => "ddId",
            //             "className" => "",
            //             "placeholder" => "DD Id"
            //         ],
            //         "Order Id" => [
            //             "type" => "input",
            //             "subtype" => "text",
            //             "name" => "orderKeyword",
            //             "className" => "",
            //             "placeholder" => "Order Id Or Awb No Or Dropshipper Order Id"
            //         ],
            //         "Customer Keyword" => [
            //             "type" => "input",
            //             "subtype" => "text",
            //             "name" => "customerKeyword",
            //             "className" => "",
            //             "placeholder" => "Customer name"
            //         ],
            //         "Product Name" => [
            //             "type" => "input",
            //             "subtype" => "text",
            //             "name" => "product_name",
            //             "className" => "",
            //             "placeholder" => "Product Name"
            //         ],
            //         "Status" => [
            //             "type" => "select",
            //             "subtype" => "",
            //             "option" => [
            //                 "0" => "Select status",
            //                 "1" => "New",
            //                 "2" => "Confirmed",
            //                 "3" => "Cancelled",
            //                 "4" => "Pickup Initiated",
            //                 "5" => "Pickup Cancelled",
            //                 "6" => "Manifested",
            //                 "7" => "Pickup Pending",
            //                 "8" => "Pickup Completed",
            //                 "9" => "In Transit",
            //                 "10" => "Undelivered",
            //                 "11" => "Out For Delivery",
            //                 "12" => "Delivered",
            //                 "13" => "RTO",
            //                 "14" => "RTO In Transit",
            //                 "15" => "RTO Delivered",
            //                 "16" => "Booking in Process",
            //                 "17" => "Cancel in Process",
            //                 "18" => "Shipment Lost",
            //                 "19" => "Shipment Damaged",
            //                 "20" => "Order Confirmation In Process",
            //                 "21" => "Shipment Cancelled",
            //                 "22" => "Out for Pickup",
            //                 "200" => "Cancelled on Dropdash",
            //                 "201" => "Booked",
            //                 "202" => "Unprocessable Order",
            //             ],
            //             "name" => "statusId",
            //             "className" => "",
            //             "placeholder" => "Customer name"
            //         ],
            //         "Payment Mode" => [
            //             "type" => "select",
            //             "subtype" => "",
            //             "option" => [
            //                 "0" => "Select payment mode",
            //                 "1" => "COD",
            //                 "2" => "Prepaid",
            //             ],
            //             "name" => "paymentMode",
            //             "className" => "",
            //             "placeholder" => ""
            //         ],
            //         "Search by store" => [
            //             "type" => "select",
            //             "subtype" => "",
            //             "option" => [],
            //             "name" => "search_by_store",
            //             "className" => "virtualSelect",
            //             "placeholder" => ""
            //         ],
            //         "Rto Keyword Errors" => [
            //             "type" => "select",
            //             "subtype" => "",
            //             "option" => [
            //                 "0" => "Select RTO Error",
            //                 "true" => "Orders with RTO keywords error",
            //                 "false" => "Orders without RTO keywords error",
            //             ],
            //             "name" => "rtoKeywordErrors",
            //             "className" => "",
            //             "placeholder" => ""
            //         ],
            //     ],
            //     "url" => route('orders.type', 'Sync Error')
            // ]
        ];

        $defaultTabs = "All";

        $firstRoute = route('orders.type', 'COD');
        return view('pages.comman-table', compact('tabs', 'firstRoute', 'defaultTabs', 'pageHeading'));
    }

    public function orderType(Request $request, $type)
    {
        $select = [
            'orders.order_id',
            'orders.order_number',
            DB::raw('orders.created_at as order_date'),
            'orders.shopify_order_id',

            // PostgreSQL-safe
            DB::raw("CONCAT('₹', orders.total_price) as price"),

            DB::raw('orders.financial_status as payment'),
            'orders.customer',

            // CASE instead of IF
            DB::raw("
            CASE 
                WHEN orders.financial_status = 'PREPAID' 
                THEN 'yes' 
                ELSE 'no' 
            END as payment_required
        "),
        ];

        $statuses = Statuses::select(['name', 'status_id'])
            ->get()
            ->pluck('status_id', 'name')
            ->toArray();

        // fixed case
        $financialStatus = ['COD', 'PREPAID'];
        $filter = null;

        if (array_key_exists($type, $statuses)) {
            $filter = ['orders.status_id' => $statuses[$type]];
        } elseif (in_array($type, $financialStatus)) {
            $filter = ['orders.financial_status' => $type];
        }

        $query = Order::select($select)
            ->join('order_items as oi', 'orders.order_id', '=', 'oi.order_id')
            ->where('oi.dropshipper_id', auth()->id())
            ->orderBy('orders.created_at', 'DESC')
            ->with([
                'orderItem' => function ($q) {
                    $q->select(['order_id', 'seller_id'])
                        ->where('dropshipper_id', auth()->id());
                },
                'orderItem.seller:user_id,store_name',
                'paymentDetails:order_id'
            ]);

        if ($filter) {
            $query->where($filter);
        }

        $data = $query->get();

        // DataTables params
        $draw = intval($request->post('draw'));
        $recordsTotal = $data->count();

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $data
        ]);
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
