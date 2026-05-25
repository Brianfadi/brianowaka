<?php

namespace Database\Seeders;

use App\Models\PricingTier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiers = [
            [
                'name' => 'Basic',
                'price' => 'KES 25K – 50K',
                'description' => 'UI/UX Design, Graphics, Small APIs',
                'is_featured' => false,
                'order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Standard',
                'price' => 'KES 50K – 100K',
                'description' => 'Web Apps, E-commerce, REST APIs',
                'is_featured' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Enterprise',
                'price' => 'KES 100K+',
                'description' => 'Business Systems, Complex Solutions',
                'is_featured' => false,
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($tiers as $tier) {
            PricingTier::create($tier);
        }
    }
}
