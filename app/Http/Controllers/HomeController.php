<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        $banners = Banner::latest()->get();

        $testimonials = Testimonial::latest()->get();

        return view(
            'home',
            compact('products', 'banners', 'testimonials')
        );
    }
}
