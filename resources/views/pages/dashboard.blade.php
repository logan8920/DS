@extends('layouts.main2')
@section('title')
    - Dashboard
@endsection

@section('content')
    <!-- Start of Main -->
    <main class="main">
        @if ($banners ?? false)
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
                        @foreach ($banners as $banner)
                            <div class="swiper-slide banner banner-fixed intro-slide1">
                                <figure class="banner-media">
                                    <img src="{{ $banner->image }}" alt="Slide" width="1903" height="100"
                                        alt="{{ $banner['name'] }}" style="background-color: #DBDBDD;">
                                </figure>
                            </div>
                        @endforeach
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
                                                <img src="{{ asset('assets/images/categories/')}}/{{ $cateogry['icon'] }}"
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
        @if($categories5)
            @foreach ($categories5 as $cateogry)
                <div class="container-fluid">
                    <div class="row banner-product-wrapper appear-animate pb-1 mb-10">
                        <div class="banner-product col-xl-3 col-md-4 mb-4 mb-md-0">
                            <h2 class="title pt-3 mb-5 appear-animate">{{ $cateogry->name }}</h2>
                            <div class="banner banner-fixed overlay-zoom br-xs">
                                <figure class="banner-media h-100">
                                    <img src="{{ str_contains($cateogry->icon, 'http') ? $cateogry->icon : asset("assets/images/categories/{$cateogry->icon}") }}"
                                        alt="{{ $cateogry->name }}" width="431" height="610" style="object-fit: contain;" />
                                </figure>
                                <!-- <div class="banner-content">
                                                <h5 class="banner-subtitle text-uppercase font-weight-bold">Accessories</h5>
                                                <h3 class="banner-title text-capitalize ls-25">{{ $cateogry->name }}</h3>
                                            </div> -->
                            </div>
                        </div>
                        <div class="product-wrapper col-xl-9 col-md-8 mt-8">
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
                                                                                    'slidesPerView': 4
                                                                                }
                                                                            }
                                                                            }">
                                @if($cateogry->subCatProduct()->exists())
                                    @php $counter = 0;
                                    $products = $cateogry->subCatProduct()->limit(4)->get(); @endphp
                                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                                        @foreach ($products as $product)
                                            @php $counter++; @endphp

                                            <div class="swiper-slide product-col">

                                                <div class="product-wrap">
                                                    <div class="product text-center">
                                                        <figure class="product-media">
                                                            <a href="{{ route('product.details', $product->product_id) }}">
                                                                @if($product?->files)
                                                                    @foreach ($product->files as $file)

                                                                        @php
                                                                            $ext = strtolower(pathinfo($file['image_path'], PATHINFO_EXTENSION));
                                                                            $imageExt = ['jpg','jpeg','png','gif','webp'];
                                                                            $videoExt = ['mp4','webm','ogg'];
                                                                        @endphp

                                                                        @if(in_array($ext, $imageExt))
                                                                            <img 
                                                                                src="{{ asset($file['image_path']) }}" 
                                                                                alt="Product Image"
                                                                                width="300" 
                                                                                height="337"
                                                                            >
                                                                        @elseif(in_array($ext, $videoExt))
                                                                            <video 
                                                                                width="300" 
                                                                                height="337" 
                                                                                controls
                                                                            >
                                                                                <source src="{{ asset($file['image_path']) }}" type="video/{{ $ext }}">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        @endif

                                                                    @endforeach
                                                                @else
                                                                    <img src="{{ asset('assets/images/demos/demo15/products/2-1-2.jpg') }}"
                                                                        alt="Product" width="300" height="337">
                                                                @endif
                                                            </a>
                                                            <div class="product-action-horizontal">
                                                                <a href="#" data-product-id="{{ $product?->product_id }}"
                                                                    class="btn-product-icon btn-cart w-icon-visit w-100"
                                                                    title="Send To Shopify">&nbsp; Send To Shopify</a>
                                                            </div>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name"><a
                                                                    href="{{ route('product.details', $product->product_id) }}">{{ $product->name }}</a>
                                                            </h4>
                                                            <div class="product-price">
                                                                <ins class="new-price">₹ {{ $product->price }}</ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End of Product Wrap -->

                                            </div>
                                            <!-- End of Product Col -->

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
    @include('partials.cart')
@endsection