@extends('layouts.main');

@section('title')
    - Source a Product
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/virtual-select.min.css') }}">
    <style>
        div.contact-us-form .form-group .form-control {
            margin-bottom: 0px;
        }

        input {
            background: #fff !important;
        }
    </style>
@endsection
@section('content')
    <main class="main bg-grey pt-10">

        <!-- Start of PageContent -->
        <div class="page-content contact-us">
            <div class="container">
                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-12 mb-8">
                            <h4 class="title mb-3">People usually ask these</h4>
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
@section('js')
    <script src="{{ asset('assets/js/virtual-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/additional-methods.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            VirtualSelect.init({
                ele: "#category_id",
            });

            $('#regForm').validate();

            $("input[type=radio][name=product_info_type]").click(function() {
                const id = this.value;
                $('.product-info-type').hide(); // hide all
                $('.product-info-type').prop('required', false)
                $('#div-' + id).show(); // show selected
                $('#div-' + id).find('input').attr("required", true);
                $('#regForm').validate();
            });

            // Trigger once at load to set the correct visible field
            $("input[type=radio][name=product_info_type]:checked").trigger("click");

        });
    </script>
@endsection
