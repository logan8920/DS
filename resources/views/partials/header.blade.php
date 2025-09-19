<!-- Start of Header -->
<header class="header">
    {{-- <div class="header-top">
        <div class="container-fluid">
            <div class="header-left mr-4">
                <a href="#" class="d-flex mr-2 mr-lg-6">
                    <i class="w-icon-map-marker"></i>
                    <span class="d-md-show">Find Wolmart Store</span>
                </a>
                <a href="#" class="d-flex">
                    <i class="w-icon-info"></i>
                    <span class="d-md-show">Free Standard Shipping</span>
                </a>
            </div>
            <div class="header-right pr-0">
                <div class="dropdown">
                    <a href="#currency">USD</a>
                    <div class="dropdown-box">
                        <a href="#USD">USD</a>
                        <a href="#EUR">EUR</a>
                    </div>
                </div>
                <!-- End of DropDown Menu -->

                <div class="dropdown">
                    <a href="#language"><img src="{{asset('assets/images/flags/eng.png') }}" alt="ENG Flag" width="14"
                            height="8" class="dropdown-image" /> ENG
                    </a>
                    <div class="dropdown-box">
                        <a href="#ENG">
                            <img src="{{asset('assets/images/flags/eng.png') }}" alt="ENG Flag" width="14" height="8"
                                class="dropdown-image" />
                            ENG
                        </a>
                        <a href="#FRA">
                            <img src="{{asset('assets/images/flags/fra.png') }}" alt="FRA Flag" width="14" height="8"
                                class="dropdown-image" />
                            FRA
                        </a>
                    </div>
                </div>
                <!-- End of Dropdown Menu -->
                <span class="divider d-lg-show"></span>
                <a href="blog.html" class="d-lg-show">Blog</a>
                <a href="become-a-vendor.html" class="d-lg-show">Become a Vendor</a>
                <a href="contact-us.html" class="d-lg-show">Contact Us</a>
                <a href="assets/ajax/login.html" class="d-lg-show login sign-in"><i class="w-icon-account mr-1"></i>Sign
                    In</a>
                <span class="delimiter d-lg-show bg-">/</span>
                <a href="assets/ajax/login.html" class="ml-0 d-lg-show login register">Register</a>
            </div>
        </div>
    </div> --}}
    <!-- End of Header Top -->
    <div class="header-middle">
        <div class="container-fluid">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                </a>
                <a href="{{ route('dashboard') }}" class="logo ml-lg-0">
                    <img src="{{asset('assets/brand_logo_hor.png')}}" alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="#"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category" class="pb-0">
                            <option value="">All Categories</option>
                            <option value="4">Fashion</option>
                            <option value="5">Furniture</option>
                            <option value="6">Shoes</option>
                            <option value="7">Sports</option>
                            <option value="8">Games</option>
                            <option value="9">Computers</option>
                            <option value="10">Electronics</option>
                            <option value="11">Kitchen</option>
                            <option value="12">Clothing</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."
                        required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal text-light mb-0">
                            <a href="https://portotheme.com/cdn-cgi/l/email-protection#eccf">Live Chat
                                <span class="ls-normal">or :</span>
                            </a>
                        </h4>
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                        @include('partials.cart')
                    </div>

                </div>
                <div class="pr-0">

                    <div class="dropdown">
                        <a href="#language">
                            <i class="fa-2x mr-1 w-icon-account"></i>
                        </a>
                        <div class="dropdown-box">
                            <a href="javascript:;">
                                Hi! {{ auth()->user()->name }}
                            </a>
                            <a href="javascript:;">
                                Settings
                            </a>
                        </div>
                    </div>
                    <!-- End of Dropdown Menu -->
                    <span class="divider d-lg-show"></span>
                    {{-- <a href="blog.html" class="d-lg-show">Blog</a>
                        <a href="become-a-vendor.html" class="d-lg-show">Become a Vendor</a>
                        <a href="contact-us.html" class="d-lg-show">Contact Us</a> --}}
                    {{-- <a href="assets/ajax/login.html" class="d-lg-show login sign-in"><i
                                class="w-icon-account mr-1"></i>Sign
                            In</a>
                        <span class="delimiter d-lg-show bg-">/</span>
                        <a href="assets/ajax/login.html" class="ml-0 d-lg-show login register">Register</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->
    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container-fluid">
            <div class="inner-wrap">
                <div class="header-left">
                    <nav class="main-nav ml-0">
                        <ul class="menu">
                            <li class="active">
                                <a href="{{ route('dashboard') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('analytics') }}">Analytics</a>
                                {{-- <ul>
                                    <li>
                                        <a href="vendor-dokan-store-list.html">Store Listing</a>
                                        <ul>
                                            <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                            <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                            <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                            <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="vendor-dokan-store.html">Vendor Store</a>
                                        <ul>
                                            <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                            <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a>
                                            </li>
                                            <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a>
                                            </li>
                                            <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul> --}}
                            </li>
                            <li>
                                <a href="{{ route('orders') }}">Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('shipment.index') }}">Shipment</a>
                            </li>
                            <li>
                                <a href="{{ route('externalorders.index') }}">External Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('externalshipment.index') }}">External Shipment</a>
                            </li>
                            <li>
                                <a href="{{ route('manageproduct.index') }}">Manage Product</a>
                            </li>
                            <li>
                                <a href="{{ route('sourceaproduct.index') }}">Source A Product</a>
                            </li>
                            <li>
                                <a href="javascript:;">RTO Intelligence</a>
                                <ul>
                                    <li><a href="{{ route('rtointelligence.rtofaqs') }}">RTO FAQs</a></li>
                                    <li><a href="{{ route('rtointelligence.highrtopincodelist') }}">High RTO Pincode
                                            List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('ndr.index') }}">NDR</a>
                            </li>
                            <li>
                                <a href="javascript:;">Billing</a>
                                <ul>
                                    <li><a href="{{ route('billing.marginremittance') }}">Marginremittance</a></li>
                                    <li><a href="{{ route('billing.prepaidpayment') }}">Prepaid Payment</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('channels.allChannels') }}">Channels</a>
                            </li>

                        </ul>
                    </nav>
                </div>
                {{-- <div class="header-right pr-0">
                    <a href="#">
                        <i class="w-icon-lightning mt-0"></i>
                        <span>Flash Sale</span>
                    </a>
                    <a href="#">
                        <i class="w-icon-sale"></i>
                        <span>Special Offers</span>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->
