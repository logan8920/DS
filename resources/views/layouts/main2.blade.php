<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="shopify-api-key" content="{{ config('services.shopify.api_key') }}">
    <meta name="shopify-host" content="{{ request('host') }}">
    <meta name="shopify-shop" content="{{ request('shop') }}">
    <title>Dropshipx @yield('title')</title>
    <base href="{{ url('/') }}">
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon-32x32.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <!-- WebFont.js -->
    <!-- <script src="https://cdn.shopify.com/shopifycloud/app-bridge.js"></script> -->
    <script src="https://unpkg.com/@shopify/app-bridge@3"></script>
    <script src="https://unpkg.com/@shopify/app-bridge-utils@3"></script>

    <script type="text/javascript">
        window.baseSRC = document.querySelector("base").href.slice(0, -1);
    </script>
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800', 'Seoge Script:400,500,600,700,800']
            }
        };
        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = baseSRC + '/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/fonts/wolmart87d5.ttf?png09e') }}" as="font" type="font/ttf"
        crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo15.min.css?v=') . rand(11111, 999999) }}">
    <style type="text/css">
        .loading-overlay {
            display: none;
            background: rgba(255, 255, 255, 0.7);
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            z-index: 9998;
            align-items: center;
            justify-content: center;
        }

        .loading-overlay.is-active {
            display: flex;
        }

        .spin-icon {
            display: inline-block;
            animation: spin 2.5s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        label.error {
            color: red !important;
            font-size: 12px !important;
            position: relative;
            line-height: 1;
            width: 12.5rem;
        }

        input.error {
            border: 1px solid red !important;
        }

        textarea.error {
            border: 1px solid red;
        }

        select.error {
            border: 1px solid red;
        }

        input.error::focus {
            border: 1px solid red !important;
        }

        textarea.error::focus {
            border: 1px solid red;
        }

        select.error::focus {
            border: 1px solid red;
        }

        div.vscomp-wrapper.focused .vscomp-toggle-button,
        div.vscomp-wrapper:focus .vscomp-toggle-button {
            box-shadow: none;
        }

        div.vscomp-toggle-button {
            width: 100%;
            height: calc(1.5em + .75rem + 3.5px);
            padding: 8px .375rem .75rem 16px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
            color: #000000;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #cccccc;
            border-radius: 6px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        div.vscomp-ele {
            max-width: 100%;
        }
    </style>

    @yield('css')
</head>

<body class="home">
    <div class="loading-overlay">
        <span class="w-icon-store-seo spin-icon" style="font-size: 60px;"></span>
    </div>

    <!-- SIDEBAR -->
    @include('partials.sidebar')

    <!-- WRAPPER (Header + Content) -->
    <div id="wrapper" class="wrapper page-wrapper">
        @include('partials.header2')

        <!-- HEADER inside wrapper -->

        <!-- MAIN CONTENT -->

        @yield('content')

        @include('partials.footer')


    </div>

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button">
        <i class="w-icon-angle-up"></i>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg>
    </a>
    <!-- End of Scroll Top -->
    <script type="text/javascript">
        let overlay = document.querySelector('.loading-overlay');

        function toggleLoader() {
            overlay && overlay.classList.toggle('is-active');
        }

        function toggleFilters(ele = undefined) {
            const filterBody = ele?.nextElementSibling ?? document.getElementById('filterBody');
            const body = filterBody;
            const btn = ele?.length ? ele.querySelector("[id=toggleBtn]") : document.getElementById('toggleBtn');

            if (body.style.display === "none") {
                body.style.display = "grid";
                btn.textContent = "▲";
            } else {
                body.style.display = "none";
                btn.textContent = "▼";
            }
        }

        window.ListOnShopifyResponse = function (req) {
            return new Promise((resolve) => {
                console.log(req);
                const $modal = $(".cart-dropdown");
                const $closeBtn = $modal.find(".btn-close");
                const $pushBtn = $modal.find(".btn-push");
                $modal.find(".cart-header span").text(req.headerText);
                $modal.find(".product-name").text(req.productName);
                $modal.find("figure.product-media a img").attr("src", req.productMedia);
                $modal.find(".product-price").text(req.productPrice);
                console.log($modal.find("input#platform_price"));
                $modal.find("input#platform_price").val(parseInt(req.productPrice.trim().replace('₹ ', '')));
                $modal.addClass("opened");

                function closeModal(response) {
                    $modal.removeClass("opened");
                    $pushBtn.off("click", yesHandler);
                    $closeBtn.off("click", noHandler);
                    resolve(response);
                }

                function yesHandler() {
                    let [selectDomain, sellingPrice] = [$modal.find("select#channelDomain").val(), $modal.find("input#selling_price").val()];
                    closeModal({ selectDomain, sellingPrice });
                }
                function noHandler() { closeModal(0); }

                $pushBtn.on("click", yesHandler);
                $closeBtn.on("click", noHandler);
            });
        }
    </script>
    <!-- Plugin JS File -->
    <script data-cfasync="false" src="{{ asset('assets/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/skrollr/skrollr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assets/js/form.js?v=') . rand(11111, 999999) }}"></script>
    @yield('js')
    <script>

        // $(document).on("click","#filterBody button.apply", function(e) {
        //     e.preventDefault();
        //     table && table.ajax.reload();
        // });
    </script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.min.js?v=') . rand(11111, 999999) }}"></script>
</body>

</html>