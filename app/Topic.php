<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'topics';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'is_poll', 'category_id'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['is_locked', 'is_pinned', 'posts', 'views'];

    /**
     * Get the category that owns the topic.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that owns the topic.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the tags that owns to the topic.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the posts that belongs to the topic.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the first post.
     */
    public function firstPost()
    {
        return $this->hasOne('App\Post');
    }

    /**
     * Get the poll that belongs to the topic.
     */
    public function poll()
    {
        return $this->hasOne('App\Poll');
    }
}
