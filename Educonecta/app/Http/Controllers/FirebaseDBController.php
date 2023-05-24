<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Factory;

class FirebaseDBController extends Controller
{
    private $database;

    public function __construct() {
        $this->database = app('firebase.database');

        $this->storage = app('firebase.storage');
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
        $post_id = "-NWAe4ZWtAxFgXAFaOPM";

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
        $post_id = "-NWAe4ZWtAxFgXAFaOPM";

        $delete = $this->database->getReference('blog/posts/'.$post_id)->remove();
    }

    /**
     * Delete all data.
     */
    public function deleteAll() {
        $delete = $this->database->getReference('blog/posts')->remove();
    }

    /**
     * Upload File
     */
    public static function uploadFile($image, $postId){
          $firebase_storage_path = 'PostsFiles/'.$postId."/";
          $localfolder = public_path('firebase-temp-uploads') .'/';
          $name = $image->getClientOriginalName();
          $extension = $image->getClientOriginalExtension();
          $file = $name. '.' . $extension;
          $fileName = $name. '.' . $extension;
          if ($image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder.$file, 'r');
            app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
            //will remove from local laravel folder
            unlink($localfolder . $file);
            // Session::flash('message', 'Succesfully Uploaded');
            $imageReference = app('firebase.storage')->getBucket()->object("PostsFiles/".$postId."/".$fileName);

            if ($imageReference->exists()) {
                $expiresAt = new \DateTime('tomorrow');
                $imageRef = $imageReference->signedUrl($expiresAt);
              } else {
                $imageRef = "none";
              }
          }
          return $imageRef;

    }
}
