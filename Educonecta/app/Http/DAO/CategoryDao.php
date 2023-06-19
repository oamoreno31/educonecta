<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Category;
use Illuminate\Database\QueryException;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PostDao
 * @package App\Http\DAO
 */
class CategoryDao
{
    /**
     * New Category
     */
    public static function NewCategory($request)
    {
        try {
            $category = Category::create([
                "name" => $request->name,
                "slug" => CategoryDao::createSlug($request->name),
            ]);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $category;
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
     * Update Category
     */
    public static function updateCategory($request, $category)
    {
        try {
            $category->update([
                "name" => $request->name,
                "slug" => CategoryDao::createSlug($request->name),
            ]);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $category;
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
     * Delete Category
     */
    public static function DeleteCategory($id)
    {
        try {
            $category = Category::find($id)->delete();
        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = 'Ha ocurrido un error, contactate con un administrador. Code: ' + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }
    /**
     * Search by ID
     */
    public static function SearchById($id)
    {
        try {
            $category = Category::find($id);
            $response = new custResponse();
            $response->success = true;
            $response->message = "";
            $response->detail = $category;
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
     * Fetch Categories
     */
    public static function getAllCategories()
    {
        try {
            $categories = Category::where('id', '!=', "")->get();
            $nuevaCategoria = array(
                'name' => '-- Seleccione una opción --',
                'id' => ''
            );
            array_push($categories['categories'], $nuevaCategoria);
            $options = array_column($categories['categories'], 'name', 'id');

            $response = new custResponse();
            $response->success = true;
            $response->message = "";
            $response->detail = $options;
            return $response;

        } catch (QueryException $error) {
            $response = new custResponse();
            $response->success = false;
            $response->message = 'Ha ocurrido un error, contactate con un administrador. Code: ' + $error->getCode();
            $response->detail = $error;
            return $response;
        }
    }

    public static function createSlug($txt)
    {
        $accents = ["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " "];
        $REPLACEaccents = ["a", "e", "i", "o", "u", "a", "e", "i", "o", "u", "_"];

        return strtolower(str_replace($accents, $REPLACEaccents, $txt));
    }
}
