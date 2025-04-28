<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('health-topics');
            $table->string('image')->nullable();
            $table->text('introduction')->nullable();
            $table->text('body_content')->nullable();
            $table->string('image2')->nullable();
            $table->text('another_content')->nullable();
            $table->string('image3')->nullable();
            $table->text('conclusion')->nullable();
            $table->json('faqs')->nullable();
            $table->string('author')->default('Alexander Matovelo');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};