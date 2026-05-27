<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Product Catalog
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::active()
            ->paginate(12);

        return view(
            'products',
            compact('products')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Product Details Page
    |--------------------------------------------------------------------------
    */

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view(
            'products.show',
            compact('product')
        );
    }
}