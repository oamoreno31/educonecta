<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Role;
use App\Models\PostsCategory;
use Illuminate\Database\QueryException;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class RoleDao
 * @package App\Http\DAO
 */
class RoleDao
{
    /**
     * New Role
     */
    public static function NewRole($request)
    {
        try {
            $role = Role::create($request->all());

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $role;
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
            $role = Role::find($id);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $role;
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
     * Update Role
     */
    public static function UpdateRole($role, $request)
    {
        try {
            $role->update($request->all());

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
     * Delete Role
     */
    public static function DeleteRole($id)
    {
        try {
            
            $role = Role::find($id)->delete();

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $role;
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
