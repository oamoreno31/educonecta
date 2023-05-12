<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostsTag
 *
 * @property $posts_id
 * @property $tags_id
 *
 * @property Post $post
 * @property Tag $tag
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PostsTag extends Model
{
    
    static $rules = [
		'posts_id' => 'required',
		'tags_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['posts_id','tags_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post()
    {
        return $this->hasOne('App\Models\Post', 'id', 'posts_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tag()
    {
        return $this->hasOne('App\Models\Tag', 'id', 'tags_id');
    }
    

}
