<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'order'];

    /**
     * Get the tags that belongs to the category.
     */
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    /**
     * Get the topics that belongs to the category.
     */
    public function topics()
    {
        return $this->hasManyThrough('App\Topic', 'App\Tag');
    }
}
