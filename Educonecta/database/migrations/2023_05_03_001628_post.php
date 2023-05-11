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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('title');
            $table->string('description');
            $table->longText('content');
            $table->timestamp('post_date');

            // $table->dropColumn('fecha_publicacion');

            $table->string('category_id');            
            $table->string('author_id');            
            $table->string('author_name');        
            // $table->foreign('author_id')->references('documentId')->on('users');
            // $table->dropForeign(['author_id']);
            // $table->dropColumn('author_id');
            // $table->unsignedBigInteger('status_id');
            // $table->foreign('status_id', 'fk_post_status')->references('id')->on('stauts')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
