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
    <div class="dropdown-box">
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
                    <div class="form-group">
                        <label for="platform_price">Platform Price</label>
                        <input type="number" id="platform_price" value="" class="form-control" placeholder="Plateform Price" disabled="true"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" name="selling_price" id="selling_price" value="" class="form-control" placeholder="Selling Price"/>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="domain">Select Channel</label>
                        @php $channels = \App\Models\ChannelConfig::whereSellerId(auth()->id())->get(); @endphp
                        <select name="domain" class="form-control" id="channelDomain" required>
                            <option value="">Select Channel</option>    
                            @foreach ($channels as $channel)
                            <option value="{{$channel->domain}}">{{$channel->domain}}</option>
                            @endforeach
                        </select>
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
