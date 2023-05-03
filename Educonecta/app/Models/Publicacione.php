<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacione
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $contenido
 * @property $author_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Publicacione extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'contenido' => 'required',
		'author_id' => 'required',
		'author_name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','descripcion','contenido','author_id', 'author_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'documentId', 'author_id');
    }
    

}
