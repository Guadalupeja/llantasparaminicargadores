<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_category_id')
                ->constrained('post_categories')
                ->cascadeOnDelete();

            $table->string('title', 170);
            $table->string('slug', 180)->unique();

            $table->text('excerpt')->nullable();
            $table->longText('content');

            $table->string('featured_image')->nullable();
            $table->string('featured_image_alt', 180)->nullable();

            $table->string('author_name', 120)->default('Ruguex');
            $table->unsignedInteger('reading_time')->default(1);

            $table->string('seo_title', 160)->nullable();
            $table->string('seo_description', 180)->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots', 60)->default('index,follow');

            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->index(['status', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};