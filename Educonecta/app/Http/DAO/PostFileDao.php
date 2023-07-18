<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Role;
use App\Models\PostFile;
use Illuminate\Database\QueryException;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PostFileDao
 * @package App\Http\DAO
 */
class PostFileDao
{
    /**
     * New PostFileDao
     */
    public static function NewPostFile($request)
    {
        try {
            $postFile = PostFile::create($request->all());

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $postFile;
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
            $postFile = PostFile::find($id);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $postFile;
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
     * Update PostFileDao
     */
    public static function UpdatePostFile($postFile, $request)
    {
        try {
            $postFile->update($request->all());

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
     * Delete PostFileDao
     */
    public static function DeletePostFile($id)
    {
        try {
            
            // $Persmission = Permission::find($id)->delete();
            $postFile = PostFile::find($id)->delete();

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $postFile;
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
     * Get File count by post
     */
    public static function countFilesByPost($postId)
    {
        try {
            $filesCount = PostFile::where('post_id', 'like', $postId)->count();
            
            $response = new custResponse();
            $response->success = true;
            $response->message = '';
            $response->detail = $filesCount;
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
