<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostsCategory
 *
 * @property $posts_id
 * @property $categories_id
 *
 * @property Category $category
 * @property Post $post
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PostsCategory extends Model
{
    
    static $rules = [
		'posts_id' => 'required',
		'categories_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['posts_id','categories_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categories_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post()
    {
        return $this->hasOne('App\Models\Post', 'id', 'posts_id');
    }
    

}
