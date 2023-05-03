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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // posts
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_comments_posts')->references('id')->on('posts')->onDelete('restrict')->onUpdate('restrict');

            // users
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id', 'fk_comments_users')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');

            // comments
            $table->unsignedBigInteger('comments_id');
            $table->foreign('comments_id', 'fk_comments_comments')->references('id')->on('comments')->onDelete('restrict')->onUpdate('restrict');

            $table->text('content');
            $table->boolean('state')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
