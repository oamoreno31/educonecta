<?php

namespace App\Http\DAO;

use App\Models\Tag;
use App\Models\custResponse;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionsRole;
use Illuminate\Database\QueryException;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Class PermissionRoleDao
 * @package App\Http\DAO
 */
class PermissionRoleDao
{
    /**
     * New PermissionRole
     */
    public static function NewPermissionRole($request)
    {
        try {
            $permissionsRole = PermissionsRole::create($request->all());

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $permissionsRole;
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
            $PermissionsRole = PermissionsRole::find($id);

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $PermissionsRole;
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
    public static function UpdatePermissionRole($PermissionsRole, $request)
    {
        try {
            $PermissionsRole->update($request->all());

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
     * Delete PermissionRole
     */
    public static function DeletePermissionRole($id)
    {
        try {
            
            $PermissionsRole = PermissionsRole::find($id)->delete();

            $response = new custResponse();
            $response->success = true;
            $response->message = "true";
            $response->detail = $PermissionsRole;
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
