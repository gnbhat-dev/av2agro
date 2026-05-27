<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'testimonials' => Testimonial::count(),
            'messages' => ContactMessage::count(),
            'unread' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
