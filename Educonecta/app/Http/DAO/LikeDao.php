<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Like;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class LikeDao
 * @package App\Http\DAO
 */
class LikeDao
{
    /**
     * New Like
     */
    public static function newLike($postId, $userId)
    {
        try {
            $likes = Like::create([
                "post_id" => $postId,
                "user_id" => $userId,
            ]);

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $likes;
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
     * Dislike
     */
    public static function dislike($postId, $userId)
    {
        try {
            $data_like = Like::where('post_id', 'like', $postId)->where('user_id', 'like', $userId)->get();
            $like = Like::find($data_like[0]->id)->delete();

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $like;
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
     * Display a listing of the resource.
     */
    public static function getByPost($postId)
    {
        try {
            $likes = Like::where('post_id', 'like', $postId);

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $likes;
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
     * Get Likes count by post
     */
    public static function countLikesByPost($postId)
    {
        try {
            $likesCount = Like::where('post_id', 'like', $postId)->count();

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $likesCount;
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
     * Get Likes count by user
     */
    public static function userLikesPost($postId, $userId)
    {
        try {
            $userLikesPost = Like::where('post_id', 'like', $postId)->where('user_id', $userId)->count();
            $cero = 0;
            if ($userLikesPost > $cero) {
                $userLikesPost = true;
            } else {
                $userLikesPost = false;
            }

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $userLikesPost;
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
