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

        .card ul li {
            list-style: auto;
        }
    </style>
@endsection
@section('content')
    <main class="main bg-grey pt-10">

        <!-- Start of PageContent -->
        <div class="page-content contact-us mt-5">
            <div class="container">
                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-12 mb-8">
                            {{-- <h4 class="title mb-3">People usually ask these</h4> --}}
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                <div class="card">                                    
                                    <h2>High RTO Pincode List</h2>
                                    <p class="mb-0">
                                        Based on lakhs of historical orders, our algorithm has identified that certain pincodes are prone to very high RTO %. It is best to avoid targeting customers from these areas as it might lead to waste of customer acquisition costs.
                                    </p>
                                    <a download class="btn btn-danger" href="/assets/high-rto-pincode-list.xlsx">Download High RTO Pincode List</a>
                                    <p>(Last updated on 09 Nov 2024)</p>
                                    <br>
                                    <h4>This Pincode can be used as negative locations in Facebook's Ad Manager</h4>
                                    <ul>
                                        <li>
                                            <h5>Download the list of pincodes from the above link.</h5>
                                            <p>You can do this in Excel itself Using "textjoin" function. or you can use free sites such as delim.co and paste the pincodes from the downloaded file. Your output should look like this - 784514,784148,784529,784145.</p>
                                        </li>
                                        <li>
                                            <h5>Collate the pincodes in comma-separated form</h5>
                                        </li>

                                        <li>
                                            <h5>Open your Facebook Ad Manager and create your ads as you normally would</h5>
                                        </li>

                                        <li>
                                            <h5>That's it. Facebook will now avoid showing ads to users in these pincodes.</h5>
                                        </li>
                                    </ul>
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