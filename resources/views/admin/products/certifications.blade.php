@extends('admin.layout')

@section('admin-content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">
                Product Certifications
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

    {{-- ADD CERTIFICATE --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header fw-bold">
            Add New Certification
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route(
                        'admin.products.certifications.store',
                        $product
                  ) }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-5 mb-3">

                        <label class="form-label">
                            Certification Title
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-5 mb-3">

                        <label class="form-label">
                            Certificate Image
                        </label>

                        <input type="file"
                               name="certificate_image"
                               class="form-control"
                               accept="image/*"
                               required>

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button class="btn btn-primary w-100">

                            Upload

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- CERTIFICATION TABLE --}}

    <div class="card shadow-sm">

        <div class="card-header fw-bold">
            Certification List
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="80">
                                ID
                            </th>

                            <th>
                                Certification Title
                            </th>

                            <th width="150">
                                View
                            </th>

                            <th width="220">
                                QR Code
                            </th>

                            <th width="120">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($certifications as $cert)

                            <tr>

                                <td>
                                    #{{ $cert->id }}
                                </td>

                                <td>

                                    {{ $cert->title }}

                                </td>

                                <td>

                                    <a href="{{ route(
                                            'certifications.show',
                                            $cert->id
                                        ) }}"
                                       target="_blank"
                                       class="btn btn-success btn-sm">

                                        View

                                    </a>

                                </td>

                                <td>

                                    <img src="{{ asset(
                                            'storage/' .
                                            $cert->certificate_qr
                                        ) }}"
                                         width="120">

                                </td>

                                <td>

                                    <form action="{{ route(
                                            'admin.certifications.destroy',
                                            $cert->id
                                        ) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm(
                                                    'Delete certificate?'
                                                )">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center py-4 text-muted">

                                    No certifications found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection