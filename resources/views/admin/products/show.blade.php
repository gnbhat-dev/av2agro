@extends('admin.layout')

@section('admin-content')

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0">Product #{{ $product->id }}</h4>
  <div>
    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm" style="background:#6a3013;color:#fff">Edit</a>
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary">Back to list</a>
  </div>
</div>

<div class="bg-white rounded shadow-sm p-4">
  <div class="row g-4">
    <div class="col-md-4 text-center">
      <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height:280px;object-fit:cover">
    </div>
    <div class="col-md-8">
      <h5>{{ $product->name }}</h5>
      <p class="text-muted small mb-2">Slug: <code>{{ $product->slug }}</code></p>
      <p><strong>Short description:</strong><br>{{ $product->short_description ?: '—' }}</p>
      <p><strong>Full description:</strong><br>{{ $product->description ?: '—' }}</p>
      <p class="mb-1">
        <strong>Status:</strong>
        @if ($product->is_active)
          <span class="badge bg-success">Active</span>
        @else
          <span class="badge bg-secondary">Inactive</span>
        @endif
      </p>
      <p class="mb-0"><strong>Sort order:</strong> {{ $product->sort_order }}</p>
    </div>
  </div>
</div>

@endsection
