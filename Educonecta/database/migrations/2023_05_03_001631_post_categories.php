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
        //
        Schema::create('posts_categories', function (Blueprint $table) {
            // posts
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_postscategories_posts')->references('id')->on('posts')->onDelete('restrict')->onUpdate('restrict');

            // categories
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id', 'fk_postscategories_categories')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_categories');
    }
};
