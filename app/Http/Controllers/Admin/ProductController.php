<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Product Listing
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::orderBy('sort_order')
            ->paginate(15);

        return view(
            'admin.products.index',
            compact('products')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create Page
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.products.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Product
    |--------------------------------------------------------------------------
    */

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        /*
        |--------------------------------------------------------------------------
        | Upload Product Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request->file('image')
                ->store('products', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $this->uniqueSlug(
            Str::slug($validated['name'])
        );

        /*
        |--------------------------------------------------------------------------
        | Defaults
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] = $request->boolean(
            'is_active',
            true
        );

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product created successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Product Details
    |--------------------------------------------------------------------------
    */

    public function show(Product $product)
    {
        return view(
            'admin.products.show',
            compact('product')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Page
    |--------------------------------------------------------------------------
    */

    public function edit(Product $product)
    {
        return view(
            'admin.products.create',
            compact('product')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Product
    |--------------------------------------------------------------------------
    */

    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Replace Product Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if ($product->image) {

                Storage::disk('public')
                    ->delete($product->image);
            }

            $validated['image'] = $request->file('image')
                ->store('products', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $this->uniqueSlug(
            Str::slug($validated['name']),
            $product->id
        );

        /*
        |--------------------------------------------------------------------------
        | Defaults
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] = $request->boolean(
            'is_active',
            true
        );

        $validated['sort_order'] = $validated['sort_order']
            ?? $product->sort_order;

        /*
        |--------------------------------------------------------------------------
        | Update Product
        |--------------------------------------------------------------------------
        */

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product updated successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Product
    |--------------------------------------------------------------------------
    */

    public function destroy(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Product Image
        |--------------------------------------------------------------------------
        */

        if ($product->image) {

            Storage::disk('public')
                ->delete($product->image);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Certificate PDF
        |--------------------------------------------------------------------------
        */

        if ($product->certificate_file) {

            Storage::disk('public')
                ->delete($product->certificate_file);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Certificate QR
        |--------------------------------------------------------------------------
        */

        if ($product->certificate_qr) {

            Storage::disk('public')
                ->delete($product->certificate_qr);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Product
        |--------------------------------------------------------------------------
        */

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product deleted successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Unique Slug Generator
    |--------------------------------------------------------------------------
    */

    private function uniqueSlug(
        string $base,
        ?int $exceptId = null
    ): string {

        $slug = $base;

        $suffix = 1;

        while (
            Product::query()
                ->when(
                    $exceptId,
                    fn ($q) => $q->where('id', '!=', $exceptId)
                )
                ->where('slug', $slug)
                ->exists()
        ) {

            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }
}