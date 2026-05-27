{{-- resources/views/products.blade.php — public catalog --}}
@extends('layout.app')

@section('title', 'Our Products | Av2 Agro')

@section('content')
<div class="container py-5">
  <h1 class="mb-4">Our Products</h1>
  <div class="row g-4">
    @forelse ($products as $product)
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ $product->image_url }}" class="card-img-top object-fit-cover" style="height:220px" alt="{{ $product->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text text-muted small">{{ $product->short_description }}</p>
            @if ($product->description)
              <p class="card-text small">{{ \Illuminate\Support\Str::limit($product->description, 160) }}</p>
            @endif
          </div>
        </div>
      </div>
    @empty
      <p class="text-muted">No products are available at the moment.</p>
    @endforelse
  </div>
  <div class="mt-4">{{ $products->links() }}</div>
</div>
@endsection
