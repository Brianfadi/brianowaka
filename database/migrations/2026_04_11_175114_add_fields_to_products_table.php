<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('short_description')->nullable()->after('description');
            $table->unsignedBigInteger('category_id')->nullable()->after('short_description');
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->decimal('discount_price', 10, 2)->nullable()->after('price');
            $table->string('pricing_type')->default('fixed')->after('discount_price'); // fixed | contact
            $table->json('images')->nullable()->after('documentation_path');
            $table->boolean('is_featured')->default(false)->after('is_active');
            $table->string('status')->default('draft')->after('is_featured'); // draft | published
            $table->string('demo_credentials')->nullable()->after('demo_link');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn([
                'short_description', 'category_id', 'discount_price',
                'pricing_type', 'images', 'is_featured', 'status', 'demo_credentials',
            ]);
        });
    }
};
