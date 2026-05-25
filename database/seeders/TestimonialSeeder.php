<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'role' => 'Startup Founder',
                'company' => 'TechStart Inc',
                'content' => 'The quality of these products is outstanding! Saved us months of development time and the support has been excellent. Highly recommend to anyone looking for professional solutions.',
                'rating' => 5,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Michael Chen',
                'role' => 'Tech Lead',
                'company' => 'Digital Solutions',
                'content' => 'Professional, well-documented, and easy to integrate. Exactly what we needed for our project. The code quality is top-notch and saved us countless hours.',
                'rating' => 5,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Emily Rodriguez',
                'role' => 'Product Manager',
                'company' => 'Innovation Labs',
                'content' => 'Great value for money. The products are production-ready and the customer service is top-notch. Will definitely buy again for future projects!',
                'rating' => 5,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'David Kim',
                'role' => 'CTO',
                'company' => 'CloudTech',
                'content' => 'Exceptional quality and attention to detail. The documentation is comprehensive and the support team is very responsive. A game-changer for our development workflow.',
                'rating' => 5,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Lisa Anderson',
                'role' => 'Software Engineer',
                'company' => 'DevCorp',
                'content' => 'Clean code, modern architecture, and excellent performance. These products have become an essential part of our tech stack. Couldn\'t be happier with the purchase.',
                'rating' => 5,
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
