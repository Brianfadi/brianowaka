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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->string('badge_text')->nullable();
            $table->string('badge_icon')->nullable();
            $table->string('theme_color')->default('blue'); // blue, emerald, pink, indigo, etc.
            $table->decimal('original_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('price_label')->nullable();
            $table->string('primary_button_text')->default('Get Started');
            $table->string('primary_button_url')->default('#contact');
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();
            $table->json('features')->nullable(); // Array of features
            $table->json('showcase_items')->nullable(); // Array of showcase grid items
            $table->string('visual_type')->default('grid'); // grid, mockup, icon, custom
            $table->text('custom_visual_html')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};