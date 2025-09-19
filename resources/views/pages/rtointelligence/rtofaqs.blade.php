@extends('layouts.main');

@section('title')
    - RTO Faqs
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
@endsection
@section('content')
    <main class="main pt-10 mt-2">

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
