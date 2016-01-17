<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use \Devfactory\Media\MediaTrait;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

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
    protected $fillable = ['name', 'category_id'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['is_locked', 'is_official', 'topics'];

    /**
     * Get the category that owns the tag.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the topics that belongs to the tag.
     */
    public function topics()
    {
        return $this->belongsToMany('App\Topic');
    }
}
