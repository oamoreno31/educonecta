<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\QueryException;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PermissionDao
 * @package App\Http\DAO
 */
class PermissionDao
{
    /**
     * New Persmission
     */
    public static function NewPermission($request)
    {
        try {
            $Permission = Permission::create($request->all());

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $Permission;
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
            $Permission = Permission::find($id);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $Permission;
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
     * Update Persmission
     */
    public static function UpdatePersmission($Persmission, $request)
    {
        try {
            $Persmission->update($request->all());

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
     * Delete Persmission
     */
    public static function DeletePersmission($id)
    {
        try {
            
            $Persmission = Permission::find($id)->delete();

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $Persmission;
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
