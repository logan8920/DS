@extends('layouts.main')
@section('title')
    - Dashboard
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main">
        <section class="intro-section mb-6">
            <div class="swiper-container swiper-theme animation-slider"
                data-swiper-options="{
                        'slidesPerView' : 1,
                        'loop':true,
                        'effect':'fade',
                        'autoplay': {
                            'delay': 8000,
                            'disableOnInteraction': false
                        }
                    }">
                <div class="swiper-wrapper">
                    <div class="swiper-slide banner banner-fixed intro-slide1">
                        <figure class="banner-media">
                            <img src="assets/images/demos/demo15/sliders/slide-1.jpg" alt="Slide" width="1903"
                                height="600" style="background-color: #DBDBDD;">
                        </figure>
                        <div class="banner-content x-50 y-50 text-center">
                            <h4 class="banner-date slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInDownShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                    }">
                                2021
                            </h4>
                            <h3 class="banner-title text-dark text-uppercase slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                    }">
                                Women’s Wear
                            </h3>
                            <p class="banner-subtitle text-default pl-4 pr-4 slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                                Diam in arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu.
                            </p>
                            <a href="demo15-shop.html" class="btn btn-dark btn-rounded slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                    }">SHOP
                                COLLECTION
                            </a>

                        </div>
                        <!-- End of .banner-content -->
                    </div>
                    <!-- End of .intro-slide1 -->
                    <div class="swiper-slide banner banner-fixed intro-slide2">
                        <figure class="banner-media">
                            <img src="assets/images/demos/demo15/sliders/slide-2.jpg" alt="Slide" width="1903"
                                height="600" style="background-color: #DEE0DF;">
                        </figure>
                        <div class="banner-content y-50">
                            <h4 class="banner-subtitle text-primary text-uppercase font-weight-bold slide-animate"
                                data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '.5s', 'delay': '.5s'}">
                                This Week Only!
                            </h4>
                            <h3 class="banner-title text-dark slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                    }">
                                High quality Electric<br>Equipments
                            </h3>
                            <hr class="divider slide-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '.5s', 'delay': '.5s'}">
                            <h5 class="banner-price-info text-dark font-weight-normal slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                    }">
                                Free Shipping on all orders over $180.00
                            </h5>
                            <a href="demo15-shop.html" class="btn btn-dark btn-rounded btn-icon-right mb-1 slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                    }">
                                SHOP NOW
                                <i class="w-icon-long-arrow-right ml-1"></i>
                            </a>

                        </div>
                        <!-- End of .banner-content -->
                    </div>
                    <!-- End of .intro-slide2 -->
                    <div class="swiper-slide banner banner-fixed intro-slide3">
                        <figure class="banner-media">
                            <img src="assets/images/demos/demo15/sliders/slide-3.jpg" alt="Slide" width="1903"
                                height="600" style="background-color: #CECECE;">
                        </figure>
                        <div class="banner-content y-50 ml-4 mr-4">
                            <span class="d-block text-dark text-uppercase font-weight-normal slide-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '.5s', 'delay': '.5s'}">
                                Deals and Promotions</span>
                            <h4 class="banner-subtitle text-primary mb-0 ml-0 slide-animate"
                                data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '.5s', 'delay': '.5s'}">
                                Summer Season
                            </h4>
                            <h3 class="banner-title text-dark font-weight-bold slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                    }">
                                Fashion Lifestyle<br>Collection
                            </h3>
                            <a href="demo15-shop.html"
                                class="btn btn-dark btn-outline btn-rounded btn-icon-right mb-1 slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                    }">
                                SHOP NOW
                                <i class="w-icon-long-arrow-right"></i>
                            </a>

                        </div>
                        <!-- End of .banner-content -->
                    </div>
                    <!-- End of .intro-slide3 -->
                </div>
            </div>
            <!-- End of .swiper-container -->
        </section>
        <!-- End of .intro-section -->
        <div class="container-fluid">
            {{-- <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm bg-white mt-2 mb-8"
            data-swiper-options="{
                    'loop': false,
                    'spaceBetween': 0,
                    'breakpoints': {
                        '0': {
                            'slidesPerView': 1
                        },
                        '576': {
                            'slidesPerView': 2
                        },
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                    }">
            <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                <div class="swiper-slide icon-box icon-box-side text-dark">
                    <span class="icon-box-icon icon-shipping">
                        <i class="w-icon-truck"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Free Shipping & Returns</h4>
                        <p class="text-default">For all orders over $99</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark">
                    <span class="icon-box-icon icon-payment">
                        <i class="w-icon-bag"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Secure Payment</h4>
                        <p class="text-default">We ensure secure payment</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">
                    <span class="icon-box-icon icon-money">
                        <i class="w-icon-money"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Money Back Guarantee</h4>
                        <p class="text-default">Any back within 30 days</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat">
                    <span class="icon-box-icon icon-chat">
                        <i class="w-icon-chat"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Customer Support</h4>
                        <p class="text-default">Call or email us 24/7</p>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- End of Icon Box Wrapper -->

            <div class="top-categories-wrapper appear-animate">
                <h2 class="title title-center text-capitalize pt-7 mb-7">Top Categories of The Month</h2>
                <div class="pl-2 pr-2">
                    <div class="swiper-container swiper-theme shadow-swiper"
                        data-swiper-options="{
                            'spaceBetween': 40,
                            'breakpoints': {
                                '0': {
                                    'slidesPerView': 2
                                },
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                },
                                '992': {
                                    'slidesPerView': 6
                                },
                                '1200': {
                                    'slidesPerView': 8
                                }
                                }
                            }">
                        <div class="swiper-wrapper row cols-xl-8 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-1.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #C1C6CC;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Fashion</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-2.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #9BC4CA;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Shoes</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-3.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #5D6A73;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Kitchen</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-4.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #8692A0;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Earphone</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-5.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #E2E2E2;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Cosmetic</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-6.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #596F7C;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Cameras</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-7.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #B8BCBF;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Watches</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="swiper-slide category category-ellipse">
                                <figure class="category-media">
                                    <a href="{{ route('product.categories') }}">
                                        <img src="assets/images/demos/demo15/categories/cat-8.jpg" alt="Categroy"
                                            width="190" height="190" style="background-color: #65737C;" />
                                    </a>
                                </figure>
                                <div class="category-content">
                                    <h4 class="category-name">
                                        <a href="{{ route('product.categories') }}">Kid's</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="grey-section">
        <div class="container-fluid">
            <div class="special-offers-wrapper d-flex bg-white pt-6 pb-1">
                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-5 d-flex align-items-center justify-content-center">
                    <div>
                        <h2 class="title">Special Offers!</h2>
                        <h4 class="price-info">Up to
                            <span class="text-primary ls-25">50% OFF</span>
                        </h4>
                        <div class="product-countdown-container text-white align-items-center">
                            <label class="d-block text-default">Hurry Up! Offer End In:</label>
                            <div class="product-countdown countdown-compact font-weight-bold text-dark"
                                data-until="+10d" data-relative="true" data-compact="false"
                                data-labels-short="true">10days,00:00:00</div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-10 col-xl-9 col-lg-8 col-md-7">
                    <div class="swiper-container swiper-theme appear-animate"
                        data-swiper-options="{
                            'spaceBetween': 20,
                            'breakpoints': {
                                '0': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 4
                                },
                                '1200': {
                                    'slidesPerView': 5
                                }
                            }
                            }">
                        <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                            <div class="swiper-slide product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-1-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/1-1-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Gold Watch</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="swiper-slide product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-2-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/1-2-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">White School
                                                Bag</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$27.00</ins><del class="old-price">$28.99</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="swiper-slide product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-3-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/1-3-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Men's Suede
                                                Belt</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$75.00</ins><del class="old-price">$79.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="swiper-slide product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-4-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/1-4-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Mini Wireless
                                                Earphone</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$85.99</ins><del class="old-price">$88.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="swiper-slide product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-5-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/1-5-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Change Alarm
                                                Machine</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$48.55</ins><del class="old-price">$49.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                        </div>
                    </div>
                    <!-- End of Prodcut Deals Wrapper -->
                </div>
            </div>

            <div class="notification-wrapper d-flex bg-dark br-sm mb-10 appear-animate justify-content-center"
                style="animation-duration: 1.2s;">
                <div class="content d-flex align-items-center">
                    <i class="w-icon-mobile mr-2 mb-1"></i>
                    <p class="font-weight-normal ls-normal">Download our new app today! Dont Miss our
                        mobile-only offers and shop with Android Play.</p>
                    <a href="#"
                        class="btn btn-white btn-outline btn-rounded btn-icon-right font-weight-bold text-capitalize ml-auto">
                        Download<i class="w-icon-long-arrow-down"></i>
                    </a>
                </div>
            </div>
            <!-- End of Notification Wrapper -->
            <div class="vendor-wrapper">
                <h4 class="title">Top Selling Vendors</h4>
                <div class="bg-white">
                    <div class="swiper-container swiper-theme appear-animate"
                        data-swiper-options="{
                                'spaceBetween': 20,
                                'breakpoints': {
                                    '0': {
                                        'slidesPerView': 1
                                    },
                                    '576': {
                                        'slidesPerView': 2
                                    },
                                    '768': {
                                        'slidesPerView': 3
                                    },
                                    '996': {
                                        'slidesPerView': 4
                                    },
                                    '1200': {
                                        'slidesPerView': 5
                                    }
                                }
                                }">
                        <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                            <div class="swiper-slide">
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-1.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 1</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-2.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 2</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-3.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 3</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-4.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 4</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-5.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 5</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-6.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 6</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-7.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 7</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-8.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 8</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-9.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 9</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <div class="vendor-details">
                                            <figure class="vendor-logo">
                                                <a href="vendor-dokan-store.html">
                                                    <img src="assets/images/demos/demo15/vendors/vendor-10.jpg"
                                                        alt="Vendor Logo" width="111" height="111" />
                                                </a>
                                            </figure>
                                            <div class="vendor-personal">
                                                <h4 class="vendor-name">
                                                    <a href="vendor-dokan-store.html">Vendor 10</a>
                                                </h4>
                                                <span class="vendor-product-count">(3 Products)</span>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 0%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Vendor Widget 3 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of vendor Wrapper -->

        </div>
    </div> --}}
        <div class="container-fluid">
            {{-- <div class="swiper-container swiper-theme category-banner-wrapper appear-animate pt-2 pb-2 mt-10 mb-10"
            data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 3,
                    'breakpoints': {
                        '0': {
                            'slidesPerView': 1
                        },
                        '768': {
                            'slidesPerView': 2
                        },
                        '1200': {
                            'slidesPerView': 3
                        }
                    }
                    }">
            <div class="swiper-wrapper row cols-md-3 cols-sm-2 cols-1">
                <div class="swiper-slide banner banner-1 banner-fixed br-sm">
                    <figure class="banner-media">
                        <img src="assets/images/demos/demo15/banner/banner-1.jpg" alt="Category Banner"
                            width="580" height="300" style="background-color: #EAEAEA;" />
                    </figure>
                    <div class="banner-content y-50 text-right">
                        <h4 class="banner-subtitle text-capitalize font-weight-normal">New Collection
                        </h4>
                        <h3 class="banner-title text-capitalize mb-0">Summer Sale</h3>
                        <h5 class="banner-price-info font-weight-normal ls-25">up to <span
                                class="text-primary font-weight-bolder">30% OFF</span></h5>
                        <a href="demo15-shop.html" class="btn btn-dark btn-outline btn-rounded btn-icon-right">
                            Shop Now<i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide banner banner-2 banner-fixed br-sm">
                    <figure class="banner-media">
                        <img src="assets/images/demos/demo15/banner/banner-2.jpg" alt="Category Banner"
                            width="580" height="300" style="background-color: #EAEAEA;" />
                    </figure>
                    <div class="banner-content x-50 y-50 text-center">
                        <h5 class="banner-price-info text-primary text-capitalize font-secondary">Get 30% Off
                            Your Entire Order!</h5>
                        <h3 class="banner-title text-uppercase text-white ls-25">Black Friday Sale</h3>
                        <h4 class="banner-subtitle font-weight-normal">Use code <span
                                class="text-white font-weight-bolder">BLKFRl40 </span> at checkout.
                        </h4>
                        <a href="shop-banner-sidebar.html" class="btn btn-primary btn-rounded">
                            Discover Now
                        </a>
                    </div>
                </div>
                <div class="swiper-slide banner banner-3 banner-fixed br-sm">
                    <figure class="banner-media">
                        <img src="assets/images/demos/demo15/banner/banner-3.jpg" alt="Category Banner"
                            width="580" height="300" style="background-color: #EAEAEA;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h4 class="banner-subtitle text-capitalize font-weight-normal">New Arrivals</h4>
                        <h3 class="banner-title text-capitalize ls-25 mb-0">Men’s Collection</h3>
                        <h5 class="banner-price-info font-weight-normal ls-25">up to <span
                                class="text-primary font-weight-bolder">50% OFF</span></h5>
                        <a href="demo15-shop.html" class="btn btn-dark btn-outline btn-rounded btn-icon-right">
                            Shop Now<i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- End of Category Banner Wrapper -->

            <div class="row banner-product-wrapper appear-animate pb-1 mb-10">
                <div class="banner-product col-xl-3 col-md-4 mb-4 mb-md-0">
                    <h2 class="title pt-3 mb-5 appear-animate">Featured Products</h2>
                    <div class="banner banner-fixed overlay-zoom br-xs">
                        <figure class="banner-media h-100">
                            <img src="assets/images/demos/demo15/banner/banner-4.jpg" alt="Product Banner" width="431"
                                height="610" style="background-color: #E2E2E2;" />
                        </figure>
                        <div class="banner-content">
                            <h5 class="banner-subtitle text-uppercase font-weight-bold">Accessories</h5>
                            <h3 class="banner-title text-capitalize ls-25">All Smartwatches<br>Discount</h3>
                            <a href="demo15-shop.html" class="btn btn-dark btn-md btn-outline btn-rounded btn-icon-right">
                                Shop Now<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper col-xl-9 col-md-8">
                    <ul class="nav-links list-style-none d-flex flex-wrap filter-random-order">
                        <li><a href="demo15-shop.html">Watches</a></li>
                        <li><a href="demo15-shop.html">Digital</a></li>
                        <li><a href="demo15-shop.html">Handbag</a></li>
                        <li><a href="demo15-shop.html">Speaker</a></li>
                        <li><a href="demo15-shop.html">Shirts</a></li>
                        <li><a href="demo15-shop.html">Shoes</a></li>
                        <li><a href="demo15-shop.html">Accessories</a></li>
                    </ul>
                    <div class="swiper-container swiper-theme"
                        data-swiper-options="{
                            'spaceBetween': 20,
                            'breakpoints': {
                                '0': {
                                    'slidesPerView': 2
                                },
                                '992': {
                                    'slidesPerView': 3
                                },
                                '1200': {
                                    'slidesPerView': 4
                                },
                                '1520': {
                                    'slidesPerView': 6
                                }
                            }
                            }">
                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                            <div class="swiper-slide product-col">
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-1-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-1-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Sound
                                                    Maker</a>
                                            </h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-2-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-2-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Women's
                                                    Comforter</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                            </div>
                            <!-- End of Product Col -->
                            <div class="swiper-slide product-col">
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-3-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-3-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Cup</a>
                                            </h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-4-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-4-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Wireless
                                                    Recorder</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                            </div>
                            <!-- End of Product Col -->
                            <div class="swiper-slide product-col">
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-5-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-5-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-sale">12% off</label>
                                            </div>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                            <div class="product-countdown-container">
                                                <div class="product-countdown countdown-compact" data-until="2021, 9, 9"
                                                    data-format="DHMS" data-compact="false"
                                                    data-labels-short="Days, Hours, Mins, Secs">
                                                    00:00:00:00
                                                </div>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Gold
                                                    Watch</a>
                                            </h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-6-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-6-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Magnetic
                                                    Charger
                                                    Box</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                            </div>
                            <!-- End of Product Col -->
                            <div class="swiper-slide product-col">
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-7-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-7-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-label-group">
                                                <label class="product-label label-sale">19% off</label>
                                            </div>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                            <div class="product-countdown-container">
                                                <div class="product-countdown countdown-compact" data-until="2021, 9, 9"
                                                    data-format="DHMS" data-compact="false"
                                                    data-labels-short="Days, Hours, Mins, Secs">
                                                    00:00:00:00
                                                </div>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Mass
                                                    Capacity
                                                    Battery</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-8-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-8-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Measure
                                                    Watch</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                            </div>
                            <!-- End of Product Col -->
                            <div class="swiper-slide product-col">
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-9-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-9-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Men's
                                                    Sport
                                                    Bag</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-10-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-10-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Mini
                                                    Wireless
                                                    Earphone</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                            </div>
                            <!-- End of Product Col -->
                            <div class="swiper-slide product-col">
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-11-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-11-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Mobile
                                                    Electronic Recorder</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="{{ route('product.details', 1) }}">
                                                <img src="assets/images/demos/demo15/products/2-12-1.jpg" alt="Product"
                                                    width="300" height="337">
                                                <img src="assets/images/demos/demo15/products/2-12-2.jpg" alt="Product"
                                                    width="300" height="337">
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a
                                                    href="{{ route('product.details', 1) }}">Professional
                                                    Camera Set</a></h4>
                                            <div class="product-price">
                                                <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Wrap -->
                            </div>
                            <!-- End of Product Col -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Banner Product Wrapper -->
            {{-- <div class="category-banner-wrapper2 row cols-md-2 appear-animate">
            <div class="banner banner-1 banner-fixed br-sm mb-4">
                <figure class="banner-media br-sm">
                    <img src="assets/images/demos/demo15/banner/banner-5.jpg" alt="Category Banner" width="880"
                        height="300" style="background-color: #31343B;" />
                </figure>
                <div class="banner-content y-50">
                    <h4 class="banner-subtitle text-white text-uppercase font-weight-bold">New Arrivals</h4>
                    <h3 class="banner-title text-white ls-25">Camera <span class="text-primary">4K</span></h3>
                    <h5 class="banner-price-info text-white font-weight-normal ls-25">From $160.00</h5>
                    <a href="demo15-shop.html" class="btn btn-white btn-rounded btn-icon-right">
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="banner banner-2 banner-fixed br-sm mb-4">
                <figure class="banner-media br-sm">
                    <img src="assets/images/demos/demo15/banner/banner-6.jpg" alt="Category Banner" width="880"
                        height="300" style="background-color: #DEDEDE;" />
                </figure>
                <div class="banner-content y-50">
                    <h4 class="banner-subtitle text-uppercase font-weight-bold">Best Seller</h4>
                    <h3 class="banner-title ls-25">Fashion <span class="text-primary">Sale</span></h3>
                    <h5 class="banner-price-info font-weight-normal ls-25">Up to 70% Off</h5>
                    <a href="demo15-shop.html" class="btn btn-dark btn-rounded btn-icon-right">
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div> --}}
            <!-- End of Category Banner Wrapper -->
            {{-- <div class="row banner-product-wrapper banner-product-wrapper2 appear-animate pb-1 mb-10">
            <div class="banner-product col-xl-3 col-md-4 mb-4 mb-md-0">
                <h2 class="title pt-3 mb-5 appear-animate">Best Seller Products</h2>
                <div class="banner banner-fixed overlay-zoom br-xs">
                    <figure class="banner-media h-100">
                        <img src="assets/images/demos/demo15/banner/banner-7.jpg" alt="Product Banner"
                            width="431" height="610" style="background-color: #ECECEC;" />
                    </figure>
                    <div class="banner-content">
                        <h5 class="banner-subtitle text-uppercase font-weight-bold">Top Seller</h5>
                        <h3 class="banner-title text-capitalize ls-25">Kitchen Utensils<br>&amp; Tools, Dining
                        </h3>
                        <a href="demo15-shop.html"
                            class="btn btn-dark btn-md btn-outline btn-rounded btn-icon-right">
                            Shop Now<i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product-wrapper col-xl-9 col-md-8">
                <ul class="nav-links list-style-none d-flex flex-wrap">
                    <li><a href="demo15-shop.html">Accessories</a></li>
                    <li><a href="demo15-shop.html">Sportswear</a></li>
                    <li><a href="demo15-shop.html">Appliances</a></li>
                    <li><a href="demo15-shop.html">kettle</a></li>
                    <li><a href="demo15-shop.html">Backpack</a></li>
                    <li><a href="demo15-shop.html">Lighting</a></li>
                </ul>
                <div class="swiper-container swiper-theme"
                    data-swiper-options="{
                            'spaceBetween': 20,
                            'breakpoints': {
                                '0': {
                                    'slidesPerView': 2
                                },
                                '992': {
                                    'slidesPerView': 3
                                },
                                '1200': {
                                    'slidesPerView': 4
                                },
                                '1520': {
                                    'slidesPerView': 6
                                }
                            }
                            }">
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                        <div class="swiper-slide product-col">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-9-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-9-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Men's Sport
                                                Bag</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-10-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-10-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Mini Wireless
                                                Earphone</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                        </div>
                        <!-- End of Product Col -->
                        <div class="swiper-slide product-col">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-11-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-11-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Mobile
                                                Electronic Recorder</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-12-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-12-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Professional
                                                Camera Set</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                        </div>
                        <!-- End of Product Col -->
                        <div class="swiper-slide product-col">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-1-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-1-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Mobile
                                                Recorder</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-2-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-2-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Women's
                                                Comforter</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                        </div>
                        <!-- End of Product Col -->
                        <div class="swiper-slide product-col">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-3-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-3-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-sale">40% off</label>
                                        </div>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                        <div class="product-countdown-container">
                                            <div class="product-countdown countdown-compact" data-until="2021, 9, 9"
                                                data-format="DHMS" data-compact="false"
                                                data-labels-short="Days, Hours, Mins, Secs">
                                                00:00:00:00
                                            </div>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Cup</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-4-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-4-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Wireless
                                                Recorder</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                        </div>
                        <!-- End of Product Col -->
                        <div class="swiper-slide product-col">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-5-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-5-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-sale">12% off</label>
                                        </div>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Gold Watch</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-6-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-6-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Magnetic Charger
                                                Box</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                        </div>
                        <!-- End of Product Col -->
                        <div class="swiper-slide product-col">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-7-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-7-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-label-group">
                                            <label class="product-label label-sale">12% off</label>
                                        </div>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Mass Capacity
                                                Battery</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-8-1.jpg" alt="Product"
                                                width="300" height="337">
                                            <img src="assets/images/demos/demo15/products/2-8-2.jpg" alt="Product"
                                                width="300" height="337">
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Compare"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quick View"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('product.details',1) }}">Measure
                                                Watch</a></h4>
                                        <div class="product-price">
                                            <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Product Wrap -->
                        </div>
                        <!-- End of Product Col -->

                    </div>
                </div>
            </div>
        </div> --}}
            <!-- End of Banner Product Wrapper -->
        </div>
        {{-- <div class="banner banner-fashion appear-animate mb-8" style="background-color: #D3D3D4;">
        <div class="banner-content align-items-center">
            <div class="content-left d-flex align-items-center mb-2">
                <div class="banner-price-info text-primary text-uppercase font-weight-bolder lh-1">
                    25
                    <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                </div>
                <hr class="banner-divider mt-0 mb-0">
            </div>
            <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                <div class="banner-info mr-auto pr-4">
                    <h3 class="banner-title text-dark text-uppercase ls-25">For Today’s Fashion</h3>
                    <p class="mb-0">Use code
                        <span class="text-white bg-dark font-weight-bold ls-50 d-inline-block">Black
                            12345</span> to get best offer.
                    </p>
                </div>
                <a href="demo15-shop.html" class="btn btn-white btn-rounded btn-icon-right mb-3">
                    Shop Now<i class="w-icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
        <figure class="banner-media skrollable">
            <img src="assets/images/demos/demo15/banner/floating.png" alt="Banner" width="431"
                height="610" style="background-color: #D3D3D3;" data-bottom-top="transform: translateY(4vh);"
                data-top-bottom="transform: translateY(-4vh);" />
        </figure>
    </div> --}}
        <!-- End of Banner Fashion -->
        <div class="container-fluid">
            <div class="title-link-wrapper latest-title after-none pt-6 mb-0 appear-animate">
                <h2 class="title font-size-xl mr-auto mb-3">Latest Products</h2>
                <ul class="nav-links list-style-none d-flex align-items-center flex-wrap">
                    <li><a href="demo15-shop.html">Accessories</a></li>
                    <li><a href="demo15-shop.html">Watches</a></li>
                    <li><a href="demo15-shop.html">iPad</a></li>
                    <li><a href="demo15-shop.html">Drone</a></li>
                    <li><a href="demo15-shop.html">Headphone</a></li>
                    <li><a href="demo15-shop.html">Cameras</a></li>
                </ul>
            </div>
            <div class="swiper-container swiper-theme pb-1 mb-8 appear-animate"
                data-swiper-options="{
                    'spaceBetween': 20,
                    'breakpoints': {
                        '0': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 6
                        },
                        '1200': {
                            'slidesPerView': 8
                        }
                    }
                    }">
                <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/2-1-2.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/2-1-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Sound Maker</a></h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/2-3-1.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/2-3-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Cup</a></h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/1-1-2.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/1-1-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Gold Watch</a></h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/1-3-1.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/1-3-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Men's Suede Belt</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/1-4-1.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/1-4-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-label-group">
                                    <label class="product-label label-sale">12% off</label>
                                </div>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Mini Wireless
                                        Earphone</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/1-5-1.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/1-5-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Charge Alarm
                                        Machine</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/1-2-1.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/1-2-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-label-group">
                                    <label class="product-label label-sale">12% off</label>
                                </div>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">White School Bag</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/2-10-2.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/2-10-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Mini Wireless
                                        Earphone</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/2-9-2.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/2-9-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-label-group">
                                    <label class="product-label label-sale">40% off</label>
                                </div>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                                <div class="product-countdown-container">
                                    <div class="product-countdown countdown-compact" data-until="2021, 9, 9"
                                        data-format="DHMS" data-compact="false"
                                        data-labels-short="Days, Hours, Mins, Secs">
                                        00:00:00:00
                                    </div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Men's Sport Bag</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/2-8-2.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/2-8-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Measure Watch</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/2-7-2.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/2-7-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Mass Capacity
                                        Battery</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="swiper-slide product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', 1) }}">
                                    <img src="assets/images/demos/demo15/products/2-6-1.jpg" alt="Product"
                                        width="300" height="337">
                                    <img src="assets/images/demos/demo15/products/2-6-2.jpg" alt="Product"
                                        width="300" height="337">
                                </a>
                                <div class="product-action-horizontal">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Compare"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ route('product.details', 1) }}">Magnetic Charger
                                        Box</a>
                                </h4>
                                <div class="product-price">
                                    <ins class="new-price">$60.54</ins><del class="old-price">$65.25</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                </div>
            </div>
            <!-- End of Banner Product Wrapper -->
            {{-- <h2 class="title title-brands text-left title-client pb-1 mt-3 mb-4 appear-animate">Our Clients</h2>
        <div class="swiper-container swiper-theme brands-wrapper bg-white br-sm mb-10 appear-animate"
            data-swiper-options="{
                    'autoplay': false,
                    'autoplayTimeout': 4000,
                    'loop': false,
                    'spaceBetween': 0,
                    'breakpoints': {
                        '0': {
                            'slidesPerView': 2
                        },
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 6
                        },
                        '1200': {
                            'slidesPerView': 8
                        }
                    }
                    }">
            <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2">
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/1.png" alt="Brand" width="310"
                        height="180" />
                </figure>
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/2.png" alt="Brand" width="310"
                        height="180" />
                </figure>
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/3.png" alt="Brand" width="310"
                        height="180" />
                </figure>
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/4.png" alt="Brand" width="310"
                        height="180" />
                </figure>
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/5.png" alt="Brand" width="310"
                        height="180" />
                </figure>
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/6.png" alt="Brand" width="310"
                        height="180" />
                </figure>
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/7.png" alt="Brand" width="310"
                        height="180" />
                </figure>
                <figure class="swiper-slide">
                    <img src="assets/images/demos/demo15/brands/8.png" alt="Brand" width="310"
                        height="180" />
                </figure>
            </div>
        </div> --}}
            <!-- End of Brands Wrapper -->
            {{-- <div class="category-banner-wrapper3 row cols-md-2 pt-2 appear-animate">
            <div class="banner banner-1 banner-fixed br-sm mb-4">
                <figure class="banner-media br-sm">
                    <img src="assets/images/demos/demo15/banner/banner-8.jpg" alt="Category Banner" width="880"
                        height="300" style="background-color: #DEDEDE;" />
                </figure>
                <div class="banner-content y-50">
                    <h3 class="banner-title text-uppercase font-weight-normal">
                        Shop The Newest <span class="font-weight-bolder">Sport Goods</span>
                    </h3>
                    <span class="d-block divider"></span>
                    <h5 class="banner-price-info font-weight-normal">Starting at <span
                            class="text-primary font-weight-bolder ls-50">$170.00</span></h5>
                </div>
            </div>
            <div class="banner banner-2 banner-fixed br-sm mb-4">
                <figure class="banner-media br-sm">
                    <img src="assets/images/demos/demo15/banner/banner-9.jpg" alt="Category Banner" width="880"
                        height="300" style="background-color: #434446;" />
                </figure>
                <div class="banner-content y-50">
                    <h3 class="banner-title text-white text-uppercase font-weight-normal">
                        The New Earphone <span class="font-weight-bolder">For Pop Song</span>
                    </h3>
                    <span class="d-block divider"></span>
                    <h5 class="banner-price-info text-white font-weight-normal">Only From <span
                            class="text-primary font-weight-bolder ls-50">$150.00</span></h5>
                </div>
            </div>
        </div> --}}
            <!-- End of Category Banner Wrapper -->
            {{-- <div class="widget-wrapper row appear-animate">
            <div class="widget widget-products col-lg-3 mb-5 appear-animate">
                <h4 class="title">New Arrivals</h4>
                <div class="swiper">
                    <div class="swiper-container swiper-theme nav-top"
                        data-swiper-options="{
                                'nav': true,
                                'slidesPerView': 1,
                                'spaceBetween': 0
                                }">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide widget-col">
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-1-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Sound Maker</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$132.62</ins><del class="old-price">$155.00</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-2-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Women's Comforter</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$95.01</ins><del class="old-price">$96.12</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-3-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Cup</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$48.25</ins><del class="old-price">$51.76</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                            </div>
                            <!-- End of Widget Col -->
                            <div class="swiper-slide widget-col">
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-1-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Gold Watch</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$132.62</ins><del class="old-price">$155.00</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-2-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">White School Bag</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$95.01</ins><del class="old-price">$96.12</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/1-3-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Men's Suede Belt</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$48.25</ins><del class="old-price">$51.76</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                            </div>
                            <!-- End of Widget Col -->
                        </div>
                        <button class="swiper-button-next font-weight-normal"></button>
                        <button class="swiper-button-prev font-weight-normal"></button>
                    </div>
                </div>
            </div>
            <!-- Widget Products -->
            <div class="banner banner-1 widget-banner banner-fixed col-lg-6 br-sm mb-6">
                <figure class="banner-media br-sm">
                    <img src="assets/images/demos/demo15/banner/banner-10.jpg" alt="Category Banner"
                        width="880" height="665" style="background-color: #DBDBDB;" />
                </figure>
                <div class="banner-content d-flex flex-column">
                    <h5 class="banner-date text-primary">2021</h5>
                    <h4 class="banner-subtitle font-weight-normal">Collection</h4>
                    <h3 class="banner-title text-uppercase font-weight-bold ls-25 mb-0">
                        Women's
                    </h3>
                    <p class="text-dark font-weight-normal">best seller clothing</p>
                    <span class="d-block divider mb-6"></span>
                    <a href="shop-banner-sidebar.html" class="btn btn-dark-light btn-rounded">
                        View Our Collection
                    </a>
                </div>
            </div>
            <div class="widget widget-products col-lg-3 mb-5 appear-animate">
                <h4 class="title">On Sale</h4>
                <div class="swiper">
                    <div class="swiper-container swiper-theme nav-top"
                        data-swiper-options="{
                                'nav': true,
                                'slidesPerView': 1,
                                'spaceBetween': 0
                                }">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide widget-col">
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-4-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Wireless Recorder</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$132.62</ins><del class="old-price">$155.00</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-5-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Gold Watch</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$95.01</ins><del class="old-price">$96.12</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-6-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Mobile Charger Box</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$48.25</ins><del class="old-price">$51.76</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                            </div>
                            <!-- End of Widget Col -->
                            <div class="swiper-slide widget-col">
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-7-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Mass Capacity Battery</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$132.62</ins><del class="old-price">$155.00</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-8-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Measure Watch</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$95.01</ins><del class="old-price">$96.12</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details',1) }}">
                                            <img src="assets/images/demos/demo15/products/2-9-1.jpg" alt="Product"
                                                width="300" height="337" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product.details',1) }}">Men's Sport Bag</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$48.25</ins><del class="old-price">$51.76</del>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Product Widget -->
                            </div>
                            <!-- End of Widget Col -->
                        </div>
                        <button class="swiper-button-next font-weight-normal"></button>
                        <button class="swiper-button-prev font-weight-normal"></button>
                    </div>
                </div>
            </div>
            <!-- Widget Products -->
        </div>
        <div class="title-link-wrapper after-none mt-6 mb-3 appear-animate">
            <h2 class="title title-post font-size-xl mb-0 pt-2">From Our Blog</h2>
            <a href="blog-listing.html" class="mb-0 font-weight-bold ls-25">View All Articles<i
                    class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="swiper-container swiper-theme post-wrapper mb-9 appear-animate"
            data-swiper-options="{
                    'spaceBetween': 20,

                    'breakpoints': {
                        '0': {
                            'slidesPerView': 1
                        },
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 4
                        }
                        }
                    }">
            <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2">
                <div class="swiper-slide post text-center">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo15/blog/post-1.jpg" alt="Post" width="430"
                                height="278" style="background-color: #A8A7A6;">
                        </a>
                        <div class="post-calendar">
                            <span class="post-day">30</span>
                            <span class="post-month">JUN</span>
                        </div>
                    </figure>
                    <div class="post-details">
                        <h4 class="post-title"><a href="post-single.html">Aliquam tincidunt mauris eurisus</a>
                        </h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="swiper-slide post text-center">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo15/blog/post-2.jpg" alt="Post" width="430"
                                height="278" style="background-color: #95A0A6;">
                        </a>
                        <div class="post-calendar">
                            <span class="post-day">30</span>
                            <span class="post-month">JUN</span>
                        </div>
                    </figure>
                    <div class="post-details">
                        <h4 class="post-title"><a href="post-single.html">Cras ornare tristique elit</a></h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="swiper-slide post text-center">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo15/blog/post-3.jpg" alt="Post" width="430"
                                height="278" style="background-color: #EDF1F2;">
                        </a>
                        <div class="post-calendar">
                            <span class="post-day">30</span>
                            <span class="post-month">JUN</span>
                        </div>
                    </figure>
                    <div class="post-details">
                        <h4 class="post-title"><a href="post-single.html">Vivamus vestibulum ntulla nec ante</a>
                        </h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="swiper-slide post text-center">
                    <figure class="post-media br-sm">
                        <a href="post-single.html">
                            <img src="assets/images/demos/demo15/blog/post-4.jpg" alt="Post" width="430"
                                height="278" style="background-color: #F6F6F6;">
                        </a>
                        <div class="post-calendar">
                            <span class="post-day">30</span>
                            <span class="post-month">JUN</span>
                        </div>
                    </figure>
                    <div class="post-details">
                        <h4 class="post-title"><a href="post-single.html">Fusce lacinia arcuet nulla</a></h4>
                        <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div> --}}
            <!-- Post Wrapper -->
        </div>
    </main>
    <!-- End of Main -->
@endsection
