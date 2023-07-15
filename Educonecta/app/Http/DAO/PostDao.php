<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Post;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PostDao
 * @package App\Http\DAO
 */
class PostDao {
    /**
     * Display a listing of the resource.
     */
    public static function SearchByCategory($value)
    {
        try {
            $post = Post::where('category_id', 'like', $value);
            
            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $post;
            return $response;
        } catch (\Throwable $th) {
            $response = new custResponse();
            $response->success = false;
            $response->message = "error";
            $response->detail = $th;
            return $response;
        }
    }

    /**
     * Create new post
     */
    public static function newPost($request){
        try {
            $post = Post::create($request);
            
            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $post;
            return $response;

        } catch (\Throwable $th) {

            $response = new custResponse();
            $response->success = false;
            $response->message = "error";
            $response->detail = $th;
            return $response;
        }
    }
    /**
     * Search by Internal ID
     */
    public static function searchById($id){
        try {
            $post = Post::find($id);
            
            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $post;
            return $response;
        } catch (\Throwable $th) {
            $response = new custResponse();
            $response->success = false;
            $response->message = "error";
            $response->detail = $th;
            return $response;
        }
    }
    /**
     * Delete Post
     */
    public static function deletePost($id){
        try {
            $post = Post::find($id)->delete();
            
            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $post;
            return $response;
        } catch (\Throwable $th) {
            $response = new custResponse();
            $response->success = false;
            $response->message = "error";
            $response->detail = $th;
            return $response;
        }
    }

}
