@extends('layouts.main2')

@section('title')
    - RTO Faqs
@endsection

@section('css')
    <style>
        .contact-section .card-header {
            font-size: 1.4rem;
            letter-spacing: 0;
        }

        .contact-section .card-header a {
            padding-top: 1.5rem;
        }


        .accordion {
            overflow: hidden;
        }

        .accordion .collapsed,
        .accordion .expanding {
            display: none;
        }

        .card-header {
            color: #333;
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: -0.025em;
            line-height: 1.5;
        }

        .card-header a {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: inherit;
            padding: 1.4rem 5rem 1.4rem 2rem;
            -webkit-transition: background-color 0.4s;
            transition: background-color 0.4s;
        }

        .card-header a.collapse {
            background: #ff3232 !important;
            color: #fff;
        }

        .card-header a::after,
        .card-header a::before {
            position: absolute;
            top: 50%;
            right: 2rem;
            margin-top: -0.1rem;
            font-family: "wolmart";
            font-size: 1.2rem;
            font-weight: 400;
            color: #333;
        }

        .card-header a:hover {
            color: #336699;
        }

        .card-header a:hover::after {
            color: #336699;
        }

        .expand::after,
        .collapse::after {
            content: "";
            -webkit-transition: -webkit-transform 0.3s;
            transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            transition: transform 0.3s, -webkit-transform 0.3s;
        }

        .expand::after {
            -webkit-transform: translateY(-50%) rotate(0deg);
            transform: translateY(-50%) rotate(0deg);
        }

        .collapse::after {
            -webkit-transform: translateY(-50%) rotate(180deg);
            transform: translateY(-50%) rotate(180deg);
        }

        .card-body {
            padding: 1.2rem 2rem;
            background: white !important;
            border-radius: 0.4rem;
        }

        .card-body p {
            font-size: 1.3rem;
            line-height: 2;
        }

        .accordion-simple .card {
            border-top: 1px solid #eee;
        }

        .accordion-simple .card:last-child {
            border-bottom: 1px solid #eee;
        }

        .accordion-simple .card-body {
            padding-top: 0;
        }

        .accordion-boxed .card-header a {
            padding-bottom: 1.6rem;
        }

        .accordion-boxed .card {
            border-top: 1px solid #eee;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
        }

        .accordion-boxed .card:last-child {
            border-bottom: 1px solid #eee;
        }

        .accordion-boxed .card-body {
            padding-top: 0.5rem;
            padding-bottom: 1.1rem;
            border-radius: 0.4rem;
        }

        .accordion-boxed.accordion-gutter-md .card {
            border: 1px solid #eee;
        }

        .accordion-boxed.accordion-plus .expand::after,
        .accordion-boxed.accordion-plus .expand::before,
        .accordion-boxed.accordion-plus .collapse::after,
        .accordion-boxed.accordion-plus .collapse::before {
            background-color: #333;
        }

        .accordion-bg .card-header a {
            background-color: #fff;
            border-radius: 0.4rem;
        }

        .accordion-bg.accordion-primary .card-header a {
            background-color: #336699;
            color: #fff;
        }

        .accordion-bg.accordion-primary .card-header a::after {
            color: #fff;
        }

        .accordion-bg.accordion-plus .expand::before,
        .accordion-bg.accordion-plus .expand::after,
        .accordion-bg.accordion-plus .collapse::before,
        .accordion-bg.accordion-plus .collapse::after {
            background-color: #fff;
        }

        .accordion-plus .expand::before,
        .accordion-plus .collapse::before {
            content: "";
            width: 1px;
            height: 1rem;
            right: 2.4rem;
            -webkit-transition: background-color 0.3s, -webkit-transform 0.3s;
            transition: background-color 0.3s, -webkit-transform 0.3s;
            transition: transform 0.3s, background-color 0.3s;
            transition: transform 0.3s, background-color 0.3s, -webkit-transform 0.3s;
        }

        .accordion-plus .expand::after,
        .accordion-plus .collapse::after {
            content: "";
            width: 1rem;
            height: 1px;
            -webkit-transition: -webkit-transform 0.3s;
            transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            transition: transform 0.3s, -webkit-transform 0.3s;
        }

        .accordion-plus .expand::before {
            background-color: #333;
            -webkit-transform: translateY(-50%) rotate(-180deg);
            transform: translateY(-50%) rotate(-180deg);
        }

        .accordion-plus .expand::after {
            -webkit-transform: translateY(-50%) rotate(-180deg);
            transform: translateY(-50%) rotate(-180deg);
        }

        .accordion-plus .collapse::before {
            background-color: transparent !important;
            -webkit-transform: translateY(-50%) rotate(180deg);
            transform: translateY(-50%) rotate(180deg);
        }

        .accordion-plus .collapse::after {
            -webkit-transform: translateY(-50%) rotate(180deg);
            transform: translateY(-50%) rotate(180deg);
        }

        .accordion-plus .expand::after,
        .accordion-plus .collapse::after {
            font-size: 1.6rem;
            right: 2rem;
            background-color: #333;
        }

        .accordion-border .card-body {
            border: 1px solid #eee;
            border-top: 0;
        }

        .accordion-icon .card-header i {
            font-size: 1.7rem;
            margin: 0 0.8rem 0 0;
        }

        .accordion-icon .card-body {
            padding-top: 0.3rem;
            padding-bottom: 1.2rem;
        }

        .accordion-icon.accordion a {
            padding: 1.8rem 5rem 1.8rem 2rem;
            word-break: break-word;
            border-radius: 0.4rem;
        }

        .accordion-gutter-md .card:not(:first-child) {
            margin-top: 1rem;
        }

        @media (max-width: 375px) {

            .without-bg-section .title::before,
            .without-bg-section .title::after {
                content: none;
            }
        }

        .card-header a:hover {
            color: #fff;
            background: #ff3232 !important;
        }
    </style>
@endsection
@section('content')
    <main class="main pt-10 mt-2 bg-grey br-sm">

        <!-- Start of PageContent -->
        <div class="page-content contact-us">
            <div class="container">
                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-12 mb-8">
                            <h4 class="title mb-3">RTO Faqs</h4>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse1" class="collapse">How can I cancel my order?</a>
                                    </div>
                                    <div id="collapse1" class="card-body expanded" style="display: block;">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                            sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                                    </div>
                                    <div id="collapse2" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                            sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3" class="expand">What do I need to buy products?</a>
                                    </div>
                                    <div id="collapse3" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                            sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse4" class="expand">How can I track an order?</a>
                                    </div>
                                    <div id="collapse4" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                            sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse5" class="expand">How can I get money back?</a>
                                    </div>
                                    <div id="collapse5" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in
                                            metus vulp utate eu sceler isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Section -->
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection