<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Post;
use App\Models\PostsTag;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PostTagsDao
 * @package App\Http\DAO
 */
class PostTagsDao
{
    /**
     * Display a listing of the resource.
     *
     */
    public static function SearchByPost($postId)
    {
        try {
            $postTags = PostsTag::where('posts_id', 'like', $postId)->get();

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $postTags;
            return $response;
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = 'Ha ocurrido un error, contactate con un administrador. Code: ' + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }
    /**
     * New record
     *
     */
    public static function newRecord($postId, $tagId)
    {
        try {
            $tags = PostsTag::create([
                "posts_id" => $postId,
                "tags_id" => $tagId,
            ]);

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $tags;
            return $response;
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = 'Ha ocurrido un error, contactate con un administrador. Code: ' + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }
    /**
     * New record
     *
     */
    public static function deleteRecord($id)
    {
        try {
            $postTagDeleted = PostsTag::find($id)->delete();
            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $postTagDeleted;
            return $response;
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = 'Ha ocurrido un error, contactate con un administrador. Code: ' + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }
}
