<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Organic Rice',
            'slug' => 'organic-rice',
            'short_description' => 'Premium organic rice',
            'description' => 'Healthy and naturally grown rice.',
            'image' => 'products/rice.jpg',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Product::create([
            'name' => 'Fresh Coconut Oil',
            'slug' => 'fresh-coconut-oil',
            'short_description' => 'Cold pressed coconut oil',
            'description' => 'Pure traditional coconut oil.',
            'image' => 'products/coconut-oil.jpg',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Product::create([
            'name' => 'Natural Jaggery',
            'slug' => 'natural-jaggery',
            'short_description' => 'Unrefined natural jaggery',
            'description' => '100% natural and unrefined jaggery.',
            'image' => 'products/jaggery.jpg',
            'is_active' => true,
            'sort_order' => 3,
        ]);
    }
}
