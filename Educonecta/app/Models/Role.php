<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property $id
 * @property $name
 * @property $slug
 * @property $created_at
 * @property $updated_at
 *
 * @property PermissionsRole $permissionsRole
 * @property UsersRole[] $usersRoles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{
    
    static $rules = [
		'name' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permissionsRole()
    {
        return $this->hasOne('App\Models\PermissionsRole', 'roles_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersRoles()
    {
        return $this->hasMany('App\Models\UsersRole', 'roles_id', 'id');
    }
    

}
