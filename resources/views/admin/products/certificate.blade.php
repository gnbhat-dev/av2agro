@extends('admin.layout')

@section('admin-content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3>
                Product Certification
            </h3>

            <p class="text-muted mb-0">
                {{ $product->name }}
            </p>
        </div>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.products.generate-certificate', $product) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Certificate Title
                    </label>

                    <input type="text"
                           name="certificate_title"
                           class="form-control"
                           value="{{ old('certificate_title', $product->certificate_title) }}"
                           required>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Upload Certificate Image
                    </label>

                    <input type="file"
                           name="certificate_image"
                           class="form-control"
                           accept="image/*"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Generate Certificate

                </button>

            </form>

        </div>

    </div>

    @if($product->certificate_status)

        <div class="card mt-4 shadow-sm">

            <div class="card-body">

                <h5 class="mb-3">
                    Existing Certificate
                </h5>

                <div class="d-flex gap-2 flex-wrap">

                    <a href="{{ route('admin.products.preview-certificate', $product) }}"
                       target="_blank"
                       class="btn btn-primary">

                        View Certificate

                    </a>

                    @if($product->certificate_qr_url)

                        <a href="{{ $product->certificate_qr_url }}"
                           target="_blank"
                           class="btn btn-dark">

                            View QR

                        </a>

                    @endif

                    @if($product->certificate_file)

                        <div class="mt-4">

                            <img src="{{ asset('storage/' . $product->certificate_file) }}"
                            class="img-fluid border rounded shadow-sm">

                        </div>

                    @endif

                </div>

            </div>

        </div>

    @endif

</div>

@endsection