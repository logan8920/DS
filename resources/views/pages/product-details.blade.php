@extends('layouts.main')
@section('title')
    - {{ strtoupper($product->name) }}
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
            <ul class="breadcrumb bb-no">
                <li><a href="demo1.html">Home</a></li>
                <li>Products</li>
            </ul>
            <ul class="product-nav list-style-none">
                <li class="product-nav-prev">
                    <a href="{{ $product?->previous() ? route('product.details', $product?->previous()?->product_id ?? 1) : '#' }}"
                        {{ !$product?->previous() ? 'disabled' : '' }}>
                        <i class="w-icon-angle-left"></i>
                    </a>
                    @if ($product?->previous())
                        <span class="product-nav-popup">
                            <img src="{{ storage_path($product?->previous()?->image?->image_path) }}"
                                alt="{{ $product?->previous()?->image?->alt_text }}" width="110" height="110"
                                onerror="this.src = `{{ asset('assets/brand_logo_500x500.png') }}`" />
                            <span class="product-name">{{ ucwords($product?->previous()?->name) }}</span>
                        </span>
                    @endif
                </li>
                <li class="product-nav-next">
                    <a href="{{ $product?->next() ? route('product.details', $product?->next()?->product_id ?? 1) : '#' }}">
                        <i class="w-icon-angle-right"></i>
                    </a>
                    @if ($product?->next())
                        <span class="product-nav-popup">
                            <img src="{{ storage_path($product?->next()?->image?->image_path) }}"
                                alt="{{ $product?->next()?->image?->alt_text }}" width="110" height="110"
                                onerror="this.src = `{{ asset('assets/brand_logo_500x500.png') }}`" />
                            <span class="product-name">{{ ucwords($product?->next()?->name) }}</span>
                        </span>
                    @endif
                </li>
            </ul>
        </nav>
        <!-- End of Breadcrumb -->
        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div class="swiper-container product-single-swiper swiper-theme nav-inner"
                                        data-swiper-options="{
                                                'navigation': {
                                                    'nextEl': '.swiper-button-next',
                                                    'prevEl': '.swiper-button-prev'
                                                }
                                            }">
                                        <div class="swiper-wrapper row cols-1 gutter-no">
                                            @forelse($product->images as $image)
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset(Storage::url($image->image_path)) }}"
                                                            data-zoom-image="{{ "storage/".$image->image_path }}"
                                                            alt="{{ $image->alt_text }}" width="800" height="900"
                                                            onerror="(this.src = `{{ asset('assets/brand_logo_500x500.png') }}`),(this.dataset.zoomImage = `{{ asset('assets/brand_logo_500x500.png') }}`)">
                                                    </figure>
                                                </div>
                                            @empty
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset('assets/brand_logo_500x500.png') }}"
                                                            data-zoom-image="{{ asset('assets/brand_logo_500x500.png') }}"
                                                            alt="Dropshipx" width="488" height="549">
                                                    </figure>
                                                </div>
                                            @endforelse
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                        <a href="#" class="product-gallery-btn product-image-full"><i
                                                class="w-icon-zoom"></i></a>
                                    </div>
                                    <div class="product-thumbs-wrap swiper-container"
                                        data-swiper-options="{
                                                'navigation': {
                                                    'nextEl': '.swiper-button-next',
                                                    'prevEl': '.swiper-button-prev'
                                                }
                                            }">
                                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                            @forelse($product->images as $image)
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{ asset(Storage::url($image->image_path)) }}"
                                                        alt="{{ $image->alt_text }}" width="800" height="900">
                                                </div>
                                            @empty
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{ asset('assets/brand_logo_500x500.png') }}" alt="Dropshipx"
                                                        width="800" height="900">
                                                </div>
                                            @endforelse
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title">{{ $product->name }}</h1>
                                    @if ($product->category)
                                        <div class="product-bm-wrapper">
                                            <figure class="brand">
                                                <img src="{{ storage_path($product?->category?->icon) }}"
                                                    alt="{{ $product?->category?->name }}"
                                                    onerror="this.src = `{{ asset('assets/brand_logo_500x500.png') }}`"
                                                    width="102" height="48" />
                                            </figure>
                                            <div class="product-meta">
                                                <div class="product-categories">
                                                    Category:
                                                    <span class="product-category"><a
                                                            href="{{ route('product.category.show', ['parent' => $product?->category?->parent ? $product?->category?->parent : 0, 'id' => $product?->category?->category_id]) }}">{{ $product?->category?->name }}</a></span>
                                                </div>
                                                <div class="product-sku">
                                                    SKU: <span>{{ $product?->sku }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <hr class="product-divider">

                                    <div class="product-price"><ins class="new-price">₹ {{ $product?->price }}</ins></div>

                                    {{-- <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                            Reviews)</a>
                                    </div> --}}

                                    <div class="product-short-desc">
                                        {!! $product?->description !!}
                                    </div>

                                    <hr class="product-divider">
                                    @forelse($product?->attributes as $attribute)
                                        <div class="product-form product-variation-form product-color-swatch">
                                            <label>{{ ucfirst($attribute?->label?->name) }}:</label>
                                            <div class="d-flex align-items-center product-variations">
                                                @forelse ($attribute->values as $value)
                                                    <a href="#">{{ $value->value }}</a>
                                                @empty
                                                    <a href="#">No Specified Value</a>
                                                @endforelse
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Attribute Present</p>
                                    @endforelse
                                    <hr class="product-divider">
                                    <div class="sticky-content-wrapper">
                                        <div class="fix-bottom product-sticky-content sticky-content">
                                            <div class="product-form container">
                                                <button class="btn btn-secondary btn-calculator" type="button">
                                                    <i class="w-icon-calculator"></i>
                                                    <span>Calculator</span>
                                                </button>
                                                &nbsp;&nbsp;
                                                <button class="btn btn-primary">
                                                    <i class="w-icon-visit"></i>
                                                    <span>Push to Shopify</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-specification" class="nav-link">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-5">
                                            <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt arcu cursus vitae congue mauris.
                                                Sagittis id consectetur purus ut. Tellus rutrum tellus pelle Vel
                                                pretium lectus quam id leo in vitae turpis massa.</p>
                                            <ul class="list-type-check">
                                                <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis
                                                    elit.
                                                </li>
                                                <li>Vivamus finibus vel mauris ut vehicula.</li>
                                                <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <div class="banner banner-video product-video br-xs">
                                                <figure class="banner-media">
                                                    <a href="#">
                                                        <img src="assets/images/products/video-banner-610x300.jpg"
                                                            alt="banner" width="610" height="300"
                                                            style="background-color: #bebebe;">
                                                    </a>
                                                    <a class="btn-play-video btn-iframe"
                                                        href="assets/video/memory-of-a-woman.mp4"></a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row cols-md-3">
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                                Shipping &amp; Return</h5>
                                            <p class="detail pl-5">We offer free shipping for products on orders
                                                above 50$ and offer free delivery for all orders in US.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                                Returns</h5>
                                            <p class="detail pl-5">We guarantee our products and you could get back
                                                all of your money anytime you want in 30 days.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                            </h5>
                                            <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                                                over 250$ for a year with our special credit card.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tab-specification">
                                    <ul class="list-none">
                                        <li>
                                            <label>Model</label>
                                            <p>Skysuite 320</p>
                                        </li>
                                        <li>
                                            <label>Color</label>
                                            <p>Black</p>
                                        </li>
                                        <li>
                                            <label>Size</label>
                                            <p>Large, Small</p>
                                        </li>
                                        <li>
                                            <label>Guarantee Time</label>
                                            <p>3 Months</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="product-tab-vendor">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-4">
                                            <figure class="vendor-banner br-sm">
                                                <img src="assets/images/products/vendor-banner.jpg" alt="Vendor Banner"
                                                    width="610" height="295" style="background-color: #353B55;" />
                                            </figure>
                                        </div>
                                        <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                            <div class="vendor-user">
                                                <figure class="vendor-logo mr-4">
                                                    <a href="#">
                                                        <img src="assets/images/products/vendor-logo.jpg"
                                                            alt="Vendor Logo" width="80" height="80" />
                                                    </a>
                                                </figure>
                                                <div>
                                                    <div class="vendor-name"><a href="#">Jone Doe</a></div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 90%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#" class="rating-reviews">(32 Reviews)</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="vendor-info list-style-none">
                                                <li class="store-name">
                                                    <label>Store Name:</label>
                                                    <span class="detail">OAIO Store</span>
                                                </li>
                                                <li class="store-address">
                                                    <label>Address:</label>
                                                    <span class="detail">Steven Street, El Carjon, CA 92020, United
                                                        States (US)</span>
                                                </li>
                                                <li class="store-phone">
                                                    <label>Phone:</label>
                                                    <a href="#tel:">1234567890</a>
                                                </li>
                                            </ul>
                                            <a href="vendor-dokan-store.html"
                                                class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                                Store<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <p class="mb-5"><strong class="text-dark">L</strong>orem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua.
                                        Venenatis tellus in metus vulputate eu scelerisque felis. Vel pretium
                                        lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam.
                                        Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies
                                        mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                                        mattis ullamcorper velit sed. A arcu cursus vitae congue mauris.
                                    </p>
                                    <p class="mb-2"><strong class="text-dark">A</strong> arcu cursus vitae congue
                                        mauris. Sagittis id consectetur purus
                                        ut. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla.
                                        Diam in
                                        arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu. In
                                        fermentum et sollicitudin ac orci phasellus. A condimentum vitae sapien
                                        pellentesque
                                        habitant morbi tristique senectus et. In dictum non consectetur a erat. Nunc
                                        scelerisque viverra mauris in aliquam sem fringilla.</p>
                                </div>
                                <div class="tab-pane" id="product-tab-reviews">
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-lg-5 mb-4">
                                            <div class="ratings-wrapper">
                                                <div class="avg-rating-container">
                                                    <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                    <div class="avg-rating">
                                                        <p class="text-dark mb-1">Average Rating</p>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                                    <span class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                                        class="count">(2 of 3)</span>
                                                </div>
                                                <div class="ratings-list">
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>70%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>30%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>40%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 40%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>0%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 20%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>0%</mark>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 mb-4">
                                            <div class="review-form-wrapper">
                                                <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                    Review</h3>
                                                <p class="mb-3">Your email address will not be published. Required
                                                    fields are marked *</p>
                                                <form action="#" method="POST" class="review-form">
                                                    <div class="rating-form">
                                                        <label for="rating">Your Rating Of This Product :</label>
                                                        <span class="rating-stars">
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>
                                                        <select name="rating" id="rating" required=""
                                                            style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>
                                                    <textarea cols="30" rows="6" placeholder="Write Your Review Here..." class="form-control"
                                                        id="review"></textarea>
                                                    <div class="row gutter-md">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Name" id="author">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Email" id="email_1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="checkbox" class="custom-checkbox"
                                                            id="save-checkbox">
                                                        <label for="save-checkbox">Save my name, email, and website
                                                            in this browser for the next time I comment.</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark">Submit
                                                        Review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a href="#show-all" class="nav-link active">Show All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-positive" class="nav-link">Most Helpful
                                                    Positive</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-negative" class="nav-link">Most Helpful
                                                    Negative</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="show-all">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/1-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:54 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>pellentesque habitant morbi tristique senectus
                                                                    et. In dictum non consectetur a erat.
                                                                    Nunc ultrices eros in cursus turpis massa
                                                                    tincidunt ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-1.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-1-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/2-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:52 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>Nullam a magna porttitor, dictum risus nec,
                                                                    faucibus sapien.
                                                                    Ultrices eros in cursus turpis massa tincidunt
                                                                    ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-2.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-2.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-3.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-3.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/3-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:21 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>In fermentum et sollicitudin ac orci phasellus. A
                                                                    condimentum vitae
                                                                    sapien pellentesque habitant morbi tristique
                                                                    senectus et. In dictum
                                                                    non consectetur a erat. Nunc scelerisque viverra
                                                                    mauris in aliquam sem fringilla.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (0)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (1)
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="helpful-positive">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/1-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:54 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>pellentesque habitant morbi tristique senectus
                                                                    et. In dictum non consectetur a erat.
                                                                    Nunc ultrices eros in cursus turpis massa
                                                                    tincidunt ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-1.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-1.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/2-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:52 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>Nullam a magna porttitor, dictum risus nec,
                                                                    faucibus sapien.
                                                                    Ultrices eros in cursus turpis massa tincidunt
                                                                    ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-2.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-3.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="helpful-negative">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/3-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:21 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>In fermentum et sollicitudin ac orci phasellus. A
                                                                    condimentum vitae
                                                                    sapien pellentesque habitant morbi tristique
                                                                    senectus et. In dictum
                                                                    non consectetur a erat. Nunc scelerisque viverra
                                                                    mauris in aliquam sem fringilla.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (0)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (1)
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="highest-rating">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/2-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:52 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>Nullam a magna porttitor, dictum risus nec,
                                                                    faucibus sapien.
                                                                    Ultrices eros in cursus turpis massa tincidunt
                                                                    ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-2.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-3.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="lowest-rating">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="assets/images/agents/1-100x100.png"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:54 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>pellentesque habitant morbi tristique senectus
                                                                    et. In dictum non consectetur a erat.
                                                                    Nunc ultrices eros in cursus turpis massa
                                                                    tincidunt ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="assets/images/products/default/review-img-3.jpg"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">Related Products</h4>
                                <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="swiper-container swiper-theme"
                                data-swiper-options="{
                                        'spaceBetween': 20,
                                        'slidesPerView': 2,
                                        'breakpoints': {
                                            '576': {
                                                'slidesPerView': 3
                                            },
                                            '768': {
                                                'slidesPerView': 4
                                            },
                                            '992': {
                                                'slidesPerView': 3
                                            }
                                        }
                                    }">
                                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/default/5.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview"
                                                    title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Drone</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$632.00</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/default/6.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview"
                                                    title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Official Camera</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                    <ins class="new-price">$263.00</ins><del
                                                        class="old-price">$300.00</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/default/7-1.jpg" alt="Product"
                                                    width="300" height="338" />
                                                <img src="assets/images/products/default/7-2.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview"
                                                    title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Phone Charge Pad</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$23.00</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="assets/images/products/default/8.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Add to Compare"></a>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-quickview"
                                                    title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="product-default.html">Fashionalble
                                                    Pencil</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">$50.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-truck"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                            <p>For all orders over $99</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-bag"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Secure Payment</h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-money"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->


                                <div class="widget widget-products">
                                    <div class="title-link-wrapper mb-2">
                                        <h4 class="title title-link font-weight-bold">More Products</h4>
                                    </div>

                                    <div class="swiper nav-top">
                                        <div class="swiper-container swiper-theme nav-top"
                                            data-swiper-options="{
                                                    'slidesPerView': 1,
                                                    'spaceBetween': 20,
                                                    'navigation': {
                                                        'prevEl': '.swiper-button-prev',
                                                        'nextEl': '.swiper-button-next'
                                                    }
                                                }">
                                            <div class="swiper-wrapper">
                                                @php $counter = 0; @endphp
                                                @foreach ($moreProducts as $mProduct)
                                                    @if ($counter === 0)
                                                        <div class="widget-col swiper-slide">
                                                    @endif
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a href="{{ route('product.details', $mProduct->product_id) }}">{{ $mProduct->name }}">
                                                                <img src="{{ asset(Storage::url($mProduct->image->image_path)) }}"
                                                                    alt="Product" width="100" height="113" />
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a
                                                                    href="{{ route('product.details', $mProduct->product_id) }}">{{ $mProduct->name }}</a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 100%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">₹ {{ $mProduct->price }}</div>
                                                        </div>
                                                    </div>
                                                    @php $counter++; @endphp
                                                    @if ($counter % 3 === 0)
                                                        @php $counter = 0; @endphp
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection

@section("js")
<script>
    @php $product->image; @endphp
    window.product = {!! json_encode($product->toArray()) !!};
</script>
@endsection
