<?php

namespace Database\Seeders;

use App\Models\HeroOffer;
use Illuminate\Database\Seeder;

class HeroOfferSeeder extends Seeder
{
    public function run(): void
    {
        HeroOffer::create([
            'badge_text'          => '🔥 LIMITED TIME OFFER',
            'title'               => 'Premium Web Solutions',
            'subtitle'            => 'Transform your business with cutting-edge technology',
            'features'            => [
                ['icon' => '🚀', 'title' => 'Fast Deploy',       'gradient_from' => 'blue-500',   'gradient_to' => 'cyan-500'],
                ['icon' => '⚡', 'title' => 'High Performance',  'gradient_from' => 'green-500',  'gradient_to' => 'emerald-500'],
                ['icon' => '🔒', 'title' => 'Secure',            'gradient_from' => 'purple-500', 'gradient_to' => 'pink-500'],
                ['icon' => '📱', 'title' => 'Responsive',        'gradient_from' => 'orange-500', 'gradient_to' => 'red-500'],
            ],
            'benefits'            => [
                'Custom Web Application Development',
                'Mobile-First Responsive Design',
                'SEO Optimization & Performance',
            ],
            'regular_price'       => 'KES 150,000',
            'offer_price'         => 'KES 99,000',
            'savings_text'        => 'Save KES 51,000 - Limited Time Only!',
            'cta_text'            => '🚀 Get Started Now',
            'cta_link'            => '/contact',
            'secondary_cta_text'  => 'View Portfolio',
            'secondary_cta_link'  => '/portfolio',
            'is_active'           => true,
            'order'               => 0,
        ]);
    }
}
