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
        Schema::create('posts_tags', function (Blueprint $table) {
            // posts
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_poststags_posts')->references('id')->on('posts')->onDelete('restrict')->onUpdate('restrict');

            // tags
            $table->unsignedBigInteger('tags_id');
            $table->foreign('tags_id', 'fk_poststags_tags')->references('id')->on('tags')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_tags');
    }
};
