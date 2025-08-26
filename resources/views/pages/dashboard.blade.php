@extends('layouts.main')
@section('title')
    - Dashboard
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main">
        @if ($banner ?? false)
            <section class="intro-section mb-4 mt-4">
                <div class="swiper-container swiper-theme animation-slider" data-swiper-options="{
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
                                <img src="assets/images/banner/{{ $banner['image'] }}" alt="Slide" width="1903" height="100"
                                    alt="{{ $banner['name'] }}" style="background-color: #DBDBDD;">
                            </figure>
                        </div>
                        <!-- End of .intro-slide1 -->
                    </div>
                </div>
                <!-- End of .swiper-container -->
            </section>
        @endif
        <!-- End of .intro-section -->

        @if($categories)
            <div class="container-fluid">

                <div class="top-categories-wrapper appear-animate">
                    <h2 class="title title-center text-capitalize pt-7 mb-7">Categories</h2>
                    <div class="pl-2 pr-2">
                        <div class="swiper-container swiper-theme shadow-swiper" data-swiper-options="{
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
                                @foreach ($categories as $cateogry)
                                    <div class="swiper-slide category category-ellipse">
                                        <figure class="category-media">
                                            <a href="{{ route('product.categories') }}">
                                                <img src="assets/images/categories/{{ $cateogry['icon'] }}"
                                                    alt="{{ $cateogry['name'] }}" width="190" height="190"
                                                    style="background-color: #C1C6CC;" />
                                            </a>
                                        </figure>
                                        <div class="category-content">
                                            <h4 class="category-name">
                                                <a href="{{ route('product.categories') }}">{{ ucfirst($cateogry['name']) }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($categories)
            @foreach ($categories as $cateogry)
                <div class="container-fluid">
                    <div class="row banner-product-wrapper appear-animate pb-1 mb-10">
                        <div class="banner-product col-xl-3 col-md-4 mb-4 mb-md-0">
                            <h2 class="title pt-3 mb-5 appear-animate">{{ $cateogry->name }}</h2>
                            <div class="banner banner-fixed overlay-zoom br-xs">
                                <figure class="banner-media h-100">
                                    <img src="assets/images/categories/{{ $cateogry->icon }}" alt="{{ $cateogry->name }}"
                                        width="431" height="610" style="background-color: #E2E2E2;" />
                                </figure>
                                <div class="banner-content">
                                    <h5 class="banner-subtitle text-uppercase font-weight-bold">Accessories</h5>
                                    <h3 class="banner-title text-capitalize ls-25">{{ $cateogry->name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper col-xl-9 col-md-8">
                            <div class="swiper-container swiper-theme" data-swiper-options="{
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
                                @if($cateogry->product)
                                    @php $counter = 0; @endphp
                                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                                            @foreach ($cateogry->product as $product)
                                            @php $counter++; @endphp
                                            @if($counter === 1)
                                            <div class="swiper-slide product-col">
                                            @endif
                                                <div class="product-wrap">
                                                    <div class="product text-center">
                                                        <figure class="product-media">
                                                            <a href="{{ route('product.details', 1) }}">
                                                                @if($product?->images)
                                                                    @foreach ($product->images as $image)
                                                                        <img src="{{ Storage::url($image['image_path']) }}" alt="Product"
                                                                            width="300" height="337">
                                                                    @endforeach
                                                                @else
                                                                    <img src="assets/images/demos/demo15/products/2-1-2.jpg" alt="Product"
                                                                        width="300" height="337">
                                                                @endif
                                                            </a>
                                                            <div class="product-action-horizontal">
                                                                <a href="#" class="btn-product-icon btn-cart w-icon-visit"
                                                                    title="Send To Shopify"> Send To Shopify</a>
                                                            </div>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name"><a
                                                                    href="{{ route('product.details', 1) }}">{{ $product->name }}</a>
                                                            </h4>
                                                            <div class="product-price">
                                                                <ins class="new-price">₹ {{ $product->price . " " . $counter }}</ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End of Product Wrap -->
                                            @if($counter % 2 === 0)
                                            </div>
                                            <!-- End of Product Col -->
                                            @php $counter = 0; @endphp
                                            @endif
                                            @endforeach
                                        </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </main>
    <!-- End of Main -->
@endsection