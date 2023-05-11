<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 *
 * @property $id
 * @property $post_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Post $post
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Like extends Model
{
    
    static $rules = [
		'post_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post()
    {
        return $this->hasOne('App\Models\Post', 'id', 'post_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
