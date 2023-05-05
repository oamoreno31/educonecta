<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $content
 * @property $post_date
 * @property $author_id
 * @property $author_name
 * @property $created_at
 * @property $updated_at
 *
 * @property Comment[] $comments
 * @property PostsCategory[] $postsCategories
 * @property PostsTag[] $postsTags
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Post extends Model
{

    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'content' => 'required',
		'post_date' => 'required',
		'author_id' => 'required',
		'author_name' => 'required',
    ];
    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','content','post_date','author_id','author_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'posts_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postsCategories()
    {
        return $this->hasMany('App\Models\PostsCategory', 'posts_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postsTags()
    {
        return $this->hasMany('App\Models\PostsTag', 'posts_id', 'id');
    }


}
