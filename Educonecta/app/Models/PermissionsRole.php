<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionsRole
 *
 * @property $permissions_id
 * @property $roles_id
 *
 * @property Permission $permission
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PermissionsRole extends Model
{
    
    static $rules = [
		'permissions_id' => 'required',
		'roles_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['permissions_id','roles_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permission()
    {
        return $this->hasOne('App\Models\Permission', 'id', 'permissions_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'roles_id');
    }
    

}
