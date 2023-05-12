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
        Schema::create('post_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('post_id');
            $table->string('file_name');
            $table->string('file_size');
            $table->string('file_blob');
            $table->string('file_url_fb');
            $table->foreign('post_id', 'fk_post_file')->references('id')->on('posts')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_files');
    }
};
