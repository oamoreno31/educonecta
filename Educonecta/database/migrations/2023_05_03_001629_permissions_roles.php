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
        Schema::create('permissions_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('permissions_id');
            $table->foreign('permissions_id', 'fk_permissionsroles_permissions')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('roles_id', 'fk_permissionsroles_roles');
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
