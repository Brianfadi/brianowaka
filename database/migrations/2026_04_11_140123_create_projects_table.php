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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('tech_stack')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->json('images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('demo_link')->nullable();
            $table->string('github_link')->nullable();
            $table->boolean('is_for_sale')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
