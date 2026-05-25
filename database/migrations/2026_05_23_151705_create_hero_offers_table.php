<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_offers', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->default('LIMITED TIME OFFER'); // e.g., "LIMITED TIME OFFER"
            $table->string('title'); // e.g., "Premium Web Solutions"
            $table->string('subtitle'); // e.g., "Transform your business with cutting-edge technology"
            $table->json('features'); // Array of feature objects with icon, title, gradient
            $table->json('benefits'); // Array of benefit texts
            $table->string('regular_price')->nullable(); // e.g., "$2,999"
            $table->string('offer_price'); // e.g., "$1,999"
            $table->string('savings_text')->nullable(); // e.g., "Save $1,000 - Limited Time Only!"
            $table->string('cta_text')->default('Get Started Now'); // Call to action button text
            $table->string('cta_link')->default('#contact'); // CTA button link
            $table->string('secondary_cta_text')->nullable(); // e.g., "View Portfolio"
            $table->string('secondary_cta_link')->nullable(); // e.g., "/portfolio"
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_offers');
    }
};
