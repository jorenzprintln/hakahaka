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
        Schema::create('tourist_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('location');
            $table->string('reviewer_name')->nullable();
            $table->text('review_content');
            $table->float('rating')->nullable();
            $table->date('review_date');
            $table->string('source_platform');
            $table->string('source_url')->nullable();
            $table->integer('likes_count')->nullable();
            $table->integer('comments_count')->nullable();
            $table->boolean('media_attached')->default(0);
            $table->string('language')->nullable();
            $table->string('sentiment')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamp('scraped_at');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_reviews');
    }
};
