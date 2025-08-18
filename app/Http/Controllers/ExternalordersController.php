<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalordersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageHeading = "Externalorders";
        $tabs = [
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
                    ['data' => 'order_id', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer', 'title' => 'Customer Details'],
                    ['data' => 'mobile', 'title' => 'Mobile'],
                    ['data' => 'store', 'title' => 'Store Name'],
                    ['data' => 'store', 'title' => 'Action'],
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
                "url" => route('shipment.type', 'COD')
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
                    ['data' => 'order_id', 'title' => 'Order Id'],
                    ['data' => 'price', 'title' => 'Price'],
                    ['data' => 'payment', 'title' => 'Payment'],
                    ['data' => 'customer', 'title' => 'Customer Details'],
                    ['data' => 'mobile', 'title' => 'Mobile'],
                    ['data' => 'store', 'title' => 'Store Name'],
                    ['data' => 'store', 'title' => 'Action'],
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
                "url" => route('shipment.type', 'Prepaid')
            ],
            "Confirmed" => [
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
                "url" => route('shipment.type', 'Confirmed')
            ],
            "Cancelled" => [
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
                "url" => route('shipment.type', 'Cancelled')
            ],
            "Unprocessable Order" => [
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
                "url" => route('shipment.type', 'Unprocessable Order')
            ],
            "All" => [
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
                "url" => route('shipment.type', 'All')
            ],
            "Sync Error" => [
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
                "url" => route('shipment.type', 'Sync Error')
            ]
        ];

        $defaultTabs = "COD";

        $firstRoute = route('shipment.type', 'COD');
        return view('pages.comman-table', compact('tabs', 'firstRoute', 'defaultTabs', 'pageHeading'));
    }

    public function shipmentType(Request $request)
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
