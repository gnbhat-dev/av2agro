<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@av2agro.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin@123'),
            ]
        );
        $this->call(ProductSeeder::class);

        // Seed Products
        $products = [
            [
                'name' => 'Premium Basmati Rice',
                'slug' => 'premium-basmati-rice',
                'short_description' => 'Premium quality aged basmati grains',
                'description' => 'Long-grain basmati rice sourced directly from organic farms.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Heirloom Red Rice',
                'slug' => 'heirloom-red-rice',
                'short_description' => 'Ancient variety, rich in nutrients',
                'description' => 'Traditional red rice variety with high fibre content.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Organic Jaggery',
                'slug' => 'organic-jaggery',
                'short_description' => 'Pure cane jaggery, unrefined',
                'description' => 'Cold-pressed organic jaggery from Kerala sugarcane fields.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Foxtail Millet',
                'slug' => 'foxtail-millet',
                'short_description' => 'High-protein ancient grain',
                'description' => 'Gluten-free foxtail millet, excellent for daily cooking.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Stone-Ground Rice Flour',
                'slug' => 'stone-ground-rice-flour',
                'short_description' => 'Traditional stone-milled flour',
                'description' => 'Freshly milled rice flour, ideal for appam and puttu.',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($products as $p) {
            Product::firstOrCreate(['slug' => $p['slug']], $p);
        }

        // Seed Testimonials
        $testimonials = [
            [
                'name' => 'Gokul Das',
                'location' => 'Calicut',
                'message' => 'Heritage sugar and rice have become a regular part of our kitchen. The quality is consistent, clean, and you can really feel the difference.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Anitha S',
                'location' => 'Kochi',
                'message' => 'Pure ingredients and authentic taste. We trust these products for our family\'s daily cooking.',
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::firstOrCreate(['name' => $t['name'], 'location' => $t['location']], $t);
        }
    }
}
