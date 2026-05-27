@extends('layout.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card border-0 shadow-lg">

                <div class="card-body p-5">

                    {{-- =================================================== --}}
                    {{-- VERIFIED HEADER --}}
                    {{-- =================================================== --}}

                    <div class="text-center mb-5">

                        <div class="mb-4">

                            <span class="badge bg-success px-4 py-3 fs-5">

                                VERIFIED CERTIFICATE

                            </span>

                        </div>

                        <h2 class="fw-bold mb-3">
                            {{ $product->name }}
                        </h2>

                        <p class="text-muted mb-0">

                            This product certificate has been
                            officially verified.

                        </p>

                    </div>

                    {{-- =================================================== --}}
                    {{-- PRODUCT INFO --}}
                    {{-- =================================================== --}}

                    <div class="row g-4 align-items-center">

                        {{-- PRODUCT IMAGE --}}

                        <div class="col-md-4 text-center">

                            <img src="{{ $product->image_url }}"
                                 class="img-fluid rounded shadow-sm border"
                                 alt="{{ $product->name }}">

                        </div>

                        {{-- CERTIFICATE DATA --}}

                        <div class="col-md-8">

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100">

                                        <div class="text-muted small mb-1">
                                            Batch Number
                                        </div>

                                        <div class="fw-semibold">
                                            {{ $product->batch_number ?: 'N/A' }}
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100">

                                        <div class="text-muted small mb-1">
                                            Approved By
                                        </div>

                                        <div class="fw-semibold">
                                            {{ $product->approved_by ?: 'N/A' }}
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100">

                                        <div class="text-muted small mb-1">
                                            Purity Percentage
                                        </div>

                                        <div class="fw-semibold">
                                            {{ $product->purity_percentage ?: '0' }}%
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100">

                                        <div class="text-muted small mb-1">
                                            Moisture Level
                                        </div>

                                        <div class="fw-semibold">
                                            {{ $product->moisture_level ?: '0' }}%
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100">

                                        <div class="text-muted small mb-1">
                                            Test Date
                                        </div>

                                        <div class="fw-semibold">

                                            {{ optional($product->test_date)->format('d M Y') }}

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100">

                                        <div class="text-muted small mb-1">
                                            Certificate Issued
                                        </div>

                                        <div class="fw-semibold">

                                            {{ optional($product->certificate_generated_at)->format('d M Y') }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- =================================================== --}}
                    {{-- QUALITY REPORT --}}
                    {{-- =================================================== --}}

                    @if($product->quality_test_report)

                        <div class="mt-5">

                            <h5 class="fw-bold mb-3">

                                Quality Test Report

                            </h5>

                            <div class="border rounded p-4 bg-light">

                                {{ $product->quality_test_report }}

                            </div>

                        </div>

                    @endif

                    {{-- =================================================== --}}
                    {{-- REMARKS --}}
                    {{-- =================================================== --}}

                    @if($product->additional_remarks)

                        <div class="mt-4">

                            <h5 class="fw-bold mb-3">

                                Additional Remarks

                            </h5>

                            <div class="border rounded p-4">

                                {{ $product->additional_remarks }}

                            </div>

                        </div>

                    @endif

                    {{-- =================================================== --}}
                    {{-- ACTION BUTTONS --}}
                    {{-- =================================================== --}}

                    <div class="mt-5 text-center">

                        <a href="{{ route('products.public-certificate', $product) }}"
                           target="_blank"
                           class="btn btn-success btn-lg">

                            View Certificate PDF

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection