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
}
