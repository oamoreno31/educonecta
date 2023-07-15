<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Category;
use App\Models\PostsCategory;
use Illuminate\Database\QueryException;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PostCategoryDao
 * @package App\Http\DAO
 */
class PostCategoryDao
{
    /**
     * New Category
     */
    public static function NewPostCategory($request)
    {
        try {
            $postsCategory = PostsCategory::create($request->all());

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $postsCategory;
            return $response;
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            if ($error->getCode() == "23000") {
                $response->message = "Este registro ya existe.";
            } else {
                $response->message = "Ha ocurrido un error, contactate con un administrador\nCode: " + $error->getCode();
            }
            $response->detail = $error;
            return $response;
        }
    }
    /**
     * SearchById
     */
    public static function SearchById($id)
    {
        try {
            $postsCategory = PostsCategory::find($id);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $postsCategory;
            return $response;
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = "Ha ocurrido un error, contactate con un administrador\nCode: " + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }
    /**
     * Update Post Category
     */
    public static function UpdatePostCategory($postCategory, $request)
    {
        try {
            
            $postCategory->update($request->all());

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = [];
            return $response;
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = "Ha ocurrido un error, contactate con un administrador\nCode: " + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }
    /**
     * Delete Post Category
     */
    public static function DeletePostCategory($id)
    {
        try {
            
            $postsCategory = PostsCategory::find($id)->delete();

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $postsCategory;
            return $response;
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = "Ha ocurrido un error, contactate con un administrador\nCode: " + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }
}
