@extends('admin.layout')

@section('admin-content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">
            Products
        </h4>

        <p class="text-muted mb-0">
            Manage products and certification system
        </p>
    </div>

    <a href="{{ route('admin.products.create') }}"
       class="btn"
       style="background:#6a3013;color:#fff">

        + Add Product

    </a>

</div>

@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="bg-white rounded shadow-sm overflow-hidden">

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">

                <tr>

                    <th width="60">
                        #
                    </th>

                    <th width="90">
                        Image
                    </th>

                    <th>
                        Product
                    </th>

                    <th width="140">
                        Product Status
                    </th>

                    <th width="160">
                        Certification
                    </th>

                    <th width="100">
                        Order
                    </th>

                    <th width="330">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($products as $product)

                    <tr>

                        {{-- ID --}}

                        <td>

                            <strong>
                                #{{ $product->id }}
                            </strong>

                        </td>

                        {{-- IMAGE --}}

                        <td>

                            <img src="{{ $product->image_url }}"
                                 width="60"
                                 height="60"
                                 class="rounded border"
                                 style="object-fit:cover;">

                        </td>

                        {{-- PRODUCT DETAILS --}}

                        <td>

                            <div class="fw-semibold mb-1">
                                {{ $product->name }}
                            </div>

                            @if($product->short_description)

                                <div class="text-muted small">

                                    {{ \Illuminate\Support\Str::limit(
                                        $product->short_description,
                                        70
                                    ) }}

                                </div>

                            @endif
                        </td>
                        {{-- PRODUCT STATUS --}}
                        <td>
                            @if($product->is_active)
                                <span class="badge bg-success">
                                    Active
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        {{-- CERTIFICATION STATUS --}}
                        <td>
                            @if($product->certifications->count())
                                <span class="badge bg-success">
                                    {{ $product->certifications->count() }}
                                    Certificates
                                </span>
                            @else
                                <span class="badge bg-warning text-dark">
                                    No Certificates
                                </span>
                            @endif
                        </td>

                        {{-- SORT ORDER --}}
                        <td>
                            {{ $product->sort_order }}
                        </td>

                        {{-- ACTIONS --}}
                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                {{-- VIEW PRODUCT --}}
                                <a href="{{ route('admin.products.show',$product) }}" class="btn btn-sm btn-outline-primary">
                                    View
                                </a>

                                {{-- EDIT PRODUCT --}}
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">
                                    Edit
                                </a>

                                {{-- CERTIFICATIONS --}}
                                <a href="{{ route('admin.products.certifications', $product) }}" class="btn btn-sm btn-outline-dark" title="Manage Certifications">
                                    📄
                                </a>
                                {{-- DELETE PRODUCT --}}
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            No products available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection