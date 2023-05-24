<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseDBController extends Controller
{
    private $database;

    public function __construct() {
        $this->database = app('firebase.database');
    }

    /**
     * Insert data.
     */
    public function insert() {
        $newPost =  $this->database
            ->getReference('blog/posts')
            ->push([
                'title' => "Title of Article",
                'description' => "This is an article"
            ]);

        return response()->json($newPost->getvalue());
    }

    /**
     * Retrieve data.
     */
    public function getData() {
        $data = $this->database->getReference('blog')->getvalue();

        return response()->json($data);
    }

    /**
     * Update data.
     */
    public function update() {
        $post_id = "-M56ibO-en8Z9O5ryzjK";

        // new values
        $postData = [
            'title' => 'My awesome post title',
            'description' => 'This text should be longer',
        ];

        $updates = [
            'blog/posts/'.$post_id => $postData,
        ];

        $update = $this->database->getReference()->update($updates);

        return response()->json($update->getvalue());
    }

    /**
     * Delete data.
     */
    public function delete() {
        $post_id = "-M56jWfY-f7mHJYc5MtL";

        $delete = $this->database->getReference('blog/posts/'.$post_id)->remove();
    }

    /**
     * Delete all data.
     */
    public function deleteAll() {
        $delete = $this->database->getReference('blog/posts')->remove();
    }
}
