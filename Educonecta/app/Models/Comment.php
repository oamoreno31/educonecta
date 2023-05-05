<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Class Comment
 *
 * @property $id
 * @property $posts_id
 * @property $users_id
 * @property $comments_id
 * @property $content
 * @property $state
 * @property $created_at
 * @property $updated_at
 *
 * @property Comment[] $comments
 * @property Comment $comment
 * @property Post $post
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comment extends Model
{

    static $rules = [
		'posts_id' => 'required',
		'users_id' => 'required',
		'content' => 'required',
		'state' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['posts_id','users_id','comments_id','content','state'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'comments_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function comment()
    {
        return $this->hasOne('App\Models\Comment', 'id', 'comments_id');
    }

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
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }


}
