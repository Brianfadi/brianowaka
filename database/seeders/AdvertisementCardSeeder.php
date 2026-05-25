<?php

namespace Database\Seeders;

use App\Models\AdvertisementCard;
use Illuminate\Database\Seeder;

class AdvertisementCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            [
                'title' => 'Premium Web Solutions',
                'subtitle' => 'Transform your business with cutting-edge technology',
                'description' => 'Get a complete web application built with modern technologies, responsive design, and optimized performance.',
                'badge_text' => 'LIMITED TIME OFFER',
                'badge_icon' => '🔥',
                'theme_color' => 'blue',
                'original_price' => 2999.00,
                'sale_price' => 1999.00,
                'price_label' => 'Save $1,000 - Limited Time Only!',
                'primary_button_text' => '🚀 Get Started Now',
                'primary_button_url' => '#contact',
                'secondary_button_text' => 'View Portfolio',
                'secondary_button_url' => '/portfolio',
                'features' => [
                    'Custom Web Application Development',
                    'Mobile-First Responsive Design',
                    'SEO Optimization & Performance'
                ],
                'showcase_items' => [
                    ['icon' => '🚀', 'title' => 'Fast Deploy'],
                    ['icon' => '⚡', 'title' => 'High Performance'],
                    ['icon' => '🔒', 'title' => 'Secure'],
                    ['icon' => '📱', 'title' => 'Responsive']
                ],
                'visual_type' => 'grid',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'E-Commerce Solutions',
                'subtitle' => 'Launch your business online in 48 hours',
                'description' => 'Complete e-commerce platform with product management, payment processing, and order management.',
                'badge_text' => 'E-COMMERCE SPECIAL',
                'badge_icon' => '💰',
                'theme_color' => 'emerald',
                'original_price' => 4999.00,
                'sale_price' => 2999.00,
                'price_label' => 'Complete E-Commerce Package',
                'primary_button_text' => '🚀 Start Selling Online',
                'primary_button_url' => '#contact',
                'secondary_button_text' => 'View E-Commerce Demos',
                'secondary_button_url' => '/store',
                'features' => [
                    'Product Catalog + Inventory Management',
                    'Stripe & PayPal Integration',
                    'Admin Dashboard + Order Management'
                ],
                'showcase_items' => [
                    ['icon' => '🛒', 'title' => 'Shopping Cart'],
                    ['icon' => '💳', 'title' => 'Payments'],
                    ['icon' => '📊', 'title' => 'Analytics']
                ],
                'visual_type' => 'grid',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Mobile App Development',
                'subtitle' => 'iOS & Android development expertise',
                'description' => 'Native mobile applications with modern UI/UX design and seamless user experience.',
                'badge_text' => 'MOBILE FIRST',
                'badge_icon' => '📱',
                'theme_color' => 'pink',
                'original_price' => 7999.00,
                'sale_price' => 4999.00,
                'price_label' => 'Cross-Platform Development',
                'primary_button_text' => '📱 Build My App',
                'primary_button_url' => '#contact',
                'secondary_button_text' => 'View App Portfolio',
                'secondary_button_url' => '/portfolio',
                'features' => [
                    'Native iOS & Android Development',
                    'Cross-Platform Solutions',
                    'App Store Deployment & Support'
                ],
                'showcase_items' => [
                    ['icon' => '📊', 'title' => 'Analytics'],
                    ['icon' => '💬', 'title' => 'Chat'],
                    ['icon' => '🔔', 'title' => 'Push Notifications']
                ],
                'visual_type' => 'mockup',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'AI & Machine Learning',
                'subtitle' => 'Intelligent solutions for modern businesses',
                'description' => 'Integrate AI and machine learning capabilities into your applications for smarter automation.',
                'badge_text' => 'AI POWERED',
                'badge_icon' => '🤖',
                'theme_color' => 'indigo',
                'original_price' => 9999.00,
                'sale_price' => 6999.00,
                'price_label' => 'AI Integration Package',
                'primary_button_text' => '🤖 Explore AI Solutions',
                'primary_button_url' => '#contact',
                'secondary_button_text' => 'View AI Projects',
                'secondary_button_url' => '/portfolio',
                'features' => [
                    'Custom AI Model Development',
                    'Data Analysis & Insights',
                    'Automated Decision Making'
                ],
                'showcase_items' => [
                    ['icon' => '🧠', 'title' => 'Smart AI'],
                    ['icon' => '📈', 'title' => 'Predictions'],
                    ['icon' => '⚡', 'title' => 'Automation'],
                    ['icon' => '🎯', 'title' => 'Precision']
                ],
                'visual_type' => 'grid',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Business Automation',
                'subtitle' => 'Streamline operations with custom workflows',
                'description' => 'Automate repetitive tasks and optimize business processes with custom software solutions.',
                'badge_text' => 'PRODUCTIVITY BOOST',
                'badge_icon' => '⚡',
                'theme_color' => 'emerald',
                'original_price' => 5999.00,
                'sale_price' => 3999.00,
                'price_label' => 'Complete Automation Suite',
                'primary_button_text' => '⚡ Automate Now',
                'primary_button_url' => '#contact',
                'secondary_button_text' => 'See Automation Examples',
                'secondary_button_url' => '/services',
                'features' => [
                    'Workflow Automation',
                    'Integration with Existing Systems',
                    'Real-time Monitoring & Reports'
                ],
                'showcase_items' => [
                    ['icon' => '🔄', 'title' => 'Workflows'],
                    ['icon' => '📊', 'title' => 'Reports'],
                    ['icon' => '🔗', 'title' => 'Integrations']
                ],
                'visual_type' => 'icon',
                'sort_order' => 5,
                'is_active' => true,
            ]
        ];

        foreach ($cards as $cardData) {
            AdvertisementCard::create($cardData);
        }
    }
}