<style>
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

    table.rto-table tr td,
    table.rto-table tr th {
        border: 1px solid #e0e0e2;
        padding: 10px !important;
    }
</style>
<div class="cart-dropdown cart-offcanvas d-flex dropdown mr-0 mr-lg-2">
    <div class="cart-overlay"></div>
    {{-- <a href="#" class="cart-toggle label-down link">
        <span class="cart-label d-flex flex-column justify-content-center text-right d-lg-show">Shopping
            Cart
            <b class="cart-price d-block font-weight-bolder">$0.00</b>
        </span>
        <i class="w-icon-cart">
            <span class="cart-count">2</span>
        </i>
    </a> --}}
    <div class="dropdown-box" style="overflow: scroll;width: 461px;max-width: 500px;">
        <div class="cart-header">
            <span>Shopping Cart</span>
            <a href="javascript:;" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products">
            <div class="product product-cart">
                <div class="product-detail">
                    <a href="product-default.html" class="product-name">Beige knitted
                        elas<br>tic
                        runner shoes</a>
                    <div class="price-box">
                        {{-- <span class="product-quantity">1</span> --}}
                        <span class="product-price">$25.68</span>
                    </div>
                </div>
                <figure class="product-media">
                    <a href="product-default.html">
                        <img src="assets/images/cart/product-1.jpg" alt="product" height="84" width="94">
                    </a>
                </figure>
                {{-- <button class="btn btn-link btn-close">
                    <i class="fas fa-times"></i>
                </button> --}}
            </div>
        </div>

        <div class="cart-total">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="platform_price">Platform Price</label>
                        <input type="number" id="platform_price" value="" class="form-control mt-1"
                            placeholder="Plateform Price" disabled="true" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" 
                            name="selling_price" 
                            oninput="this.value ? (priceMargin.textContent = `₹ ${parseFloat(this.value - platform_price.value).toFixed(2)}`) : priceMargin.textContent = `₹ 0.00`" 
                            id="selling_price"
                            class="form-control mt-1" placeholder="Selling Price" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="domain">Select Channel</label>
                        @php $channels = \App\Models\ChannelConfig::whereSellerId(auth()->id())->get(); @endphp
                        <select name="domain" class="form-control mt-1" id="channelDomain" required>
                            <option value="">Select Channel</option>
                            @foreach ($channels as $channel)
                                <option value="{{ $channel->domain }}">{{ $channel->domain }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="bg-primary card pb-3 pl-3 pr-3 pt-3 text-white mb-4" style="border-radius: 10px;">
                        <div class="float">
                            Your margin <span id="priceMargin" style="float: inline-end;">₹ 0.00</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <section class="filters card">
                        <div class="filter-header" onclick="toggleFilters(this)">
                            <h5 class="mb-0">RTO & RVP charges are applicable and vary depending on the Product weight
                            </h5>
                            <button id="toggleBtn" type="button">▼</button>
                        </div>

                        <div id="filterBodys" style="display: none" class="filter-body">
                            <table class="rto-table text-center">
                                <thead>
                                    <tr>
                                        <th>Charges<br><small>(For this product)</small></th>
                                        <th>RTO Charges<br><small>(All inclusive)</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>All 3PLs</td>
                                        <td>
                                            <a style="justify-content: center;" href="javascript:;">Please Contact Admin</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="cart-action">
            <a href="javascript:;" class="btn btn-dark btn-outline btn-rounded btn-push">Push To Shoptiy</a>
            <a href="javascript:;" class="btn btn-primary  btn-rounded btn-close">cancel</a>
        </div>
    </div>
    <!-- End of Dropdown Box -->
</div>
