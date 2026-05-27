@extends('layout.app')

@section('content')

<div class="container py-5">

    <div class="row g-5">

        {{-- ======================================================= --}}
        {{-- PRODUCT IMAGE --}}
        {{-- ======================================================= --}}

        <div class="col-lg-5">

            <div class="card shadow-sm border-0">

                <div class="card-body text-center">

                    <img src="{{ $product->image_url }}"
                         class="img-fluid rounded"
                         alt="{{ $product->name }}">

                </div>

            </div>

        </div>

        {{-- ======================================================= --}}
        {{-- PRODUCT DETAILS --}}
        {{-- ======================================================= --}}

        <div class="col-lg-7">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body p-4">

                    <div class="mb-3">

                        <h2 class="fw-bold mb-2">
                            {{ $product->name }}
                        </h2>

                        @if($product->is_active)

                            <span class="badge bg-success">
                                Active Product
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                Inactive
                            </span>

                        @endif

                    </div>

                    {{-- SHORT DESCRIPTION --}}

                    @if($product->short_description)

                        <div class="mb-4">

                            <h5 class="fw-semibold">
                                Short Description
                            </h5>

                            <p class="text-muted mb-0">
                                {{ $product->short_description }}
                            </p>

                        </div>

                    @endif

                    {{-- FULL DESCRIPTION --}}

                    @if($product->description)

                        <div class="mb-4">

                            <h5 class="fw-semibold">
                                Product Details
                            </h5>

                            <p class="mb-0">
                                {{ $product->description }}
                            </p>

                        </div>

                    @endif

                    {{-- ======================================================= --}}
                    {{-- CERTIFICATE SECTION --}}
                    {{-- ======================================================= --}}

                    @if($product->certificate_status)

                        <hr class="my-4">

                        <div>

                            <div class="d-flex align-items-center mb-3">

                                <h4 class="mb-0 me-3">
                                    Product Certification
                                </h4>

                                <span class="badge bg-success fs-6">
                                    VERIFIED
                                </span>

                            </div>

                            <div class="row align-items-center">

                                {{-- QR CODE --}}

                                <div class="col-md-4 text-center mb-4 mb-md-0">

                                    @if($product->certificate_qr_url)

                                        <img src="{{ $product->certificate_qr_url }}"
                                             class="img-fluid border rounded p-2 bg-white"
                                             width="200">

                                        <div class="small text-muted mt-2">
                                            Scan to verify certificate
                                        </div>

                                    @endif

                                </div>

                                {{-- CERTIFICATE DETAILS --}}

                                <div class="col-md-8">

                                    <div class="mb-3">

                                        <p class="mb-2">

                                            <strong>Batch Number:</strong>

                                            {{ $product->batch_number ?: 'N/A' }}

                                        </p>

                                        <p class="mb-2">

                                            <strong>Approved By:</strong>

                                            {{ $product->approved_by ?: 'N/A' }}

                                        </p>

                                        <p class="mb-0">

                                            <strong>Issued On:</strong>

                                            {{ optional($product->certificate_generated_at)->format('d M Y') }}

                                        </p>

                                    </div>

                                    <div class="d-flex flex-wrap gap-2">

                                        {{-- VIEW CERTIFICATE --}}

                                        <a href="{{ route('products.public-certificate', $product) }}"
                                           target="_blank"
                                           class="btn btn-primary">

                                            View Certificate

                                        </a>

                                        {{-- DOWNLOAD CERTIFICATE --}}

                                        <a href="{{ $product->certificate_url }}"
                                           target="_blank"
                                           class="btn btn-success">

                                            Download Certificate

                                        </a>

                                        {{-- VERIFY CERTIFICATE --}}

                                        <a href="{{ route('products.verify', $product->slug) }}"
                                           class="btn btn-outline-dark">

                                            Verify Certificate

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @else

                        <hr class="my-4">

                        <div class="alert alert-warning mb-0">

                            This product currently does not have
                            a verified certificate.

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection