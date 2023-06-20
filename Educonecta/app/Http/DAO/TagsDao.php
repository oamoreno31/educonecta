<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Post;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class TagsDao
 * @package App\Http\DAO
 */
class TagsDao
{
    /**
     * Display a listing of the resource.
     */
    public static function getAllTags()
    {
        try {
            $tags_data["tags"] = json_decode(Tag::get(["name", "id"]));
            $tags_data = array_column($tags_data["tags"], 'name', 'id');

            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $tags_data;
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
     * Get category by id
     */
    public static function getCategoryById($id){
        try {
            $tag = Tag::where('id', 'like', $id)->get();
            
            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $tag;
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
     * Post count by Category
     */
    public static function countCategories($id){
        try {
            $count = Tag::where('id', 'like', $id)->count();
            
            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $count;
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
