<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
            $table->string('short_description')->nullable()->after('description');
            $table->string('image')->nullable()->after('icon');
            $table->boolean('is_featured')->default(false)->after('is_active');
            $table->string('status')->default('draft')->after('is_featured'); // draft | published
            $table->string('starting_price')->nullable()->after('price'); // e.g. "From KES 10,000"
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['slug', 'short_description', 'image', 'is_featured', 'status', 'starting_price']);
        });
    }
};
