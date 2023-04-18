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
        Schema::dropIfExists('publicaciones');
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('titulo');
            $table->string('descripcion');
            $table->longText('contenido');
            $table->timestamp('fecha_publicacion');

            // $table->dropColumn('fecha_publicacion');

            $table->string('author_id');            
            $table->string('author_name');            
            // $table->foreign('author_id')->references('documentId')->on('users');

            // $table->dropForeign(['author_id']);
            // $table->dropColumn('author_id');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
