<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('handle')->unique()->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->enum('status', ['draft', 'published', 'deleted'])->default('draft');
            $table->integer('view_count')->default('0');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
