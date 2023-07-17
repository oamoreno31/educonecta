<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostFile
 *
 * @property $id
 * @property $post_id
 * @property $file_name
 * @property $file_size
 * @property $file_blob
 * @property $file_url_fb
 * @property $created_at
 * @property $updated_at
 *
 * @property Post $post
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PostFile extends Model
{
    
    static $rules = [
		'post_id' => 'required',
		'file_name' => 'required',
		'file_hash' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id','file_name','file_hash'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post()
    {
        return $this->hasOne('App\Models\Post', 'id', 'post_id');
    }
    

}
