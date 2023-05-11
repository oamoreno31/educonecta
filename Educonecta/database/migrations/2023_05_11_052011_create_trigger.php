<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER tr_create_post_category AFTER INSERT ON `posts` FOR EACH ROW
                BEGIN
                    INSERT INTO posts_categories (`posts_id`, `categories_id`) 
                    VALUES (NEW.id, NEW.category_id);
                END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
    }
};
