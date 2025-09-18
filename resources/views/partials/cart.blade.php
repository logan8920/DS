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
                        <input type="number" name="selling_price" id="selling_price" value="" class="form-control mt-1"
                            placeholder="Selling Price" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="domain">Select Channel</label>
                        @php $channels = \App\Models\ChannelConfig::whereSellerId(auth()->id())->get(); @endphp
                        <select name="domain" class="form-control mt-1" id="channelDomain" required>
                            <option value="">Select Channel</option>
                            @foreach ($channels as $channel)
                                <option value="{{$channel->domain}}">{{$channel->domain}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="float">
                            Your margin
                        </div>
                        <div class="float-right margin-amt">
                            0.00
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Collapsible Group Item #1
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Some placeholder content for the first accordion panel. This panel is shown by
                                    default, thanks to the <code>.show</code> class.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Collapsible Group Item #2
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Some placeholder content for the second accordion panel. This panel is hidden by
                                    default.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    And lastly, the placeholder content for the third and final accordion panel. This
                                    panel is hidden by default.
                                </div>
                            </div>
                        </div>
                    </div>
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