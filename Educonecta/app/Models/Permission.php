<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 *
 * @property $id
 * @property $name
 * @property $slug
 * @property $created_at
 * @property $updated_at
 *
 * @property PermissionsRole[] $permissionsRoles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Permission extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissionsRoles()
    {
        return $this->hasMany('App\Models\PermissionsRole', 'permissions_id', 'id');
    }
    

}
