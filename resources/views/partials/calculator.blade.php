<style>
    .mfp-content:has(#calculator-popup) {
        width: 88% !important;
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

    .net-profit {
        border: 3px solid #05c605;
    }

    .net-profit h5::before,
    .net-profit p:not(:first-child)::before {
        content: "Net Profit ";
    }

    .net-loss {
        border: 3px solid #c60505;
    }

    .net-loss h5::before,
    .net-loss p:not(:first-child)::before {
        content: "Net Loss ";
    }
</style>
<!-- Hidden popup content -->
<div id="calculator-popup" class="mfp-hide">
    <div class="bg-white br-lg container p-relative pb-8 pl-8 pr-8 pt-8">
        <h3 class="mb-4">Profit Calculator</h3>

        <div class="row align-items-center mb-4">
            <div class="col-3">
                <img width="36%" src="your-product.jpg" alt="Product" class="br-sm" />
            </div>
            <div class="col-3">
                <p class="text-dark mb-1">App Price</p>
                <h5 class="font-weight-bold app-price">₹ 205</h5>
                <input type="hidden" value="" id="appPrice">
            </div>
            <div class="col-3">
                <p class="text-dark mb-1">RTO Charges</p>
                <h5 class="font-weight-bold">₹ 70</h5>
                <input type="hidden" value="70" id="rtoCharges">
            </div>
            <div class="col-3">
                <p class="text-dark mb-1">Weight</p>
                <h5 class="font-weight-bold">500 g</h5>
            </div>
        </div>

        <div class="row gutter-sm mb-3">
            <div class="col-2 mb-3">
                <label>Selling Price (₹)*</label>
                <input type="number" class="form-control" id="sellPrice" />
            </div>
            <div class="col-2 mb-3">
                <label>Expected Orders*</label>
                <input type="number" class="form-control" id="expOrders" />
            </div>
            <div class="col-2 mb-3">
                <label>Confirm Orders (✓)*</label>
                <input type="number" class="form-control" id="confOrders" />
            </div>
            <div class="col-2 mb-3">
                <label>Expected Delivery (✓)*</label>
                <input type="number" class="form-control" id="expDelivery" />
            </div>
            <div class="col-2 mb-3">
                <label>Ad Spends per order*</label>
                <input type="number" class="form-control" id="adSpend" />
            </div>
            <div class="col-2 mb-3">
                <label>Total Misc. Charges</label>
                <input type="number" class="form-control" id="miscCharges" />
            </div>
        </div>

        <div class="text-center mb-4">
            <button id="calcBtn" class="btn btn-primary w-100">Calculate</button>
        </div>
        <div class="row gutter-sm mb-3">
            <div class="col-6 mb-3">
                <div class="bg-grey br-sm pb-3 pl-3 pr-3 pt-3" id="profitLoss">
                    <h5 class="text-dark mb-0"></h5>
                    <p>Total Earnings – Total Spends <span style="float: inline-end;" class="text-primary"
                            id="netLoss">₹ N/A</span></p>

                    <h5 class="text-dark mt-3 mb-0"> (Per Order)</h5>
                    <p class="mb-0"> / Expected Orders <span style="float: inline-end;" class="text-primary"
                            id="netLossPerOrder">₹ N/A</span></p>
                </div>
            </div>

            <div class="col-6 mb-3">
                <section class="filters card">
                    <div class="filter-header" onclick="toggleFilters(this)">
                        <h3>Orders</h3>
                        <button id="toggleBtn" type="button">▼</button>
                    </div>

                    <div id="orderDiv" style="display: none" class="filter-body">
                        <ul>
                            <li>
                                Confirmed Orders
                                <span style="float: right;">N/A</span>
                            </li>
                            <li>
                                Delivered Orders
                                <span style="float: right;">N/A</span>
                            </li>
                            <li>
                                (+)RTO Orders
                                <span style="float: right;">N/A</span>
                            </li>
                            <li>
                                Cancelled Orders
                                <span style="float: right;">N/A</span>
                            </li>

                        </ul>
                    </div>
                </section>

                <section class="filters card">
                    <div class="filter-header" onclick="toggleFilters(this)">
                        <h3>Total Earnings</h3>
                        <button id="toggleBtn" type="button">▼</button>
                    </div>

                    <div id="marginPerOrderDiv" style="display:none" class="filter-body">
                        <ul>
                            <li>
                                Margin per orders
                                <span style="float: right;">N/A</span>
                            </li>
                            <li>
                                (x)Delivered orders
                                <span style="float: right;">N/A</span>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="filters card">
                    <div class="filter-header" onclick="toggleFilters(this)">
                        <h3> Total Spends</h3>
                        <button id="toggleBtn" type="button">▼</button>
                    </div>

                    <div id="totalSpends" style="display:none" class="filter-body">
                        <ul>
                            <li>
                                Total Ad Spends
                                <span style="float: right;">N/A</span>
                            </li>
                            <li>
                                (+)Total RTO Charges
                                <span style="float: right;">N/A</span>
                            </li>

                            <li>
                                (+)Total Misc. Charges
                                <span style="float: right;">N/A</span>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
