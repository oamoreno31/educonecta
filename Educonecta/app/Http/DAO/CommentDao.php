<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Comment;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class CommentDao
 * @package App\Http\DAO
 */
class CommentDao
{
    /**
     * Display a listing of the resource.
     */
    public static function getByPost($postId)
    {
        try {
            $comentarios = Comment::where('posts_id', 'like', $postId);
            
            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $comentarios;
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
     * Get Comments count by post
     */
    public static function countCommentByPost($postId)
    {
        try {
            $comentariosCount = Comment::where('posts_id', 'like', $postId)->count();
            
            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $comentariosCount;
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
