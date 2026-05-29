{{-- ============================================================ --}}
{{-- resources/views/admin/products/create.blade.php --}}
{{-- Used for BOTH create + edit --}}
{{-- ============================================================ --}}

@extends('admin.layout')

@section('admin-content')

@php
$editing = isset($product);
@endphp

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="mb-1">
            {{ $editing ? 'Edit Product' : 'Add Product' }}
        </h4>

        <p class="text-muted mb-0">
            Manage product details and certification information
        </p>
    </div>

    <a href="{{ route('admin.products.index') }}"
        class="btn btn-outline-secondary">
        Back
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="bg-white rounded shadow-sm p-4">

    <form action="{{ $editing ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        @if($editing)
        @method('PUT')
        @endif

        {{-- ======================================================= --}}
        {{-- PRODUCT INFORMATION --}}
        {{-- ======================================================= --}}

        <div class="border-bottom pb-3 mb-4">

            <h5 class="mb-3">
                Product Information
            </h5>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Product Name *
                </label>

                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>

                @error('name')
                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Short Description
                </label>

                <input type="text" name="short_description" class="form-control" value="{{ old('short_description', $product->short_description ?? '') }}">

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Full Description
                </label>

                <textarea name="description" class="form-control" rows="5">{{ old('description', $product->description ?? '') }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Product Image
                </label>

                @if($editing && $product->image)

                <div class="mb-3">

                    <img src="{{ $product->image_url }}" width="140" class="rounded border shadow-sm">

                </div>

                @endif

                <input type="file" name="image" class="form-control" accept="image/*">

                @error('image')
                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Sort Order
                        </label>

                        <input type="number" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', $product->sort_order ?? 0) }}">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="is_active"
                            class="form-select">

                            <option value="1"
                                {{ old('is_active', $product->is_active ?? 1) ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ !old('is_active', $product->is_active ?? 1) ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>
{{-- ======================================================= --}}
{{-- ACTION BUTTONS --}}
{{-- ======================================================= --}}

<div class="d-flex justify-content-between align-items-center border-top pt-4">

    <div>

        @if($editing && $product->certificate_file)

        <a href="{{ route('admin.products.preview-certificate', $product) }}"
            target="_blank"
            class="btn btn-success">
            View Certificate

        </a>

        @endif

    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('admin.products.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

        <button type="submit"
            class="btn btn-primary">

            {{ $editing ? 'Update Product' : 'Create Product' }}

        </button>

    </div>

</div>
