<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['value'];

    protected $primaryKey = 'post_id';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function posts() {
        return $this->belongsTo('App\Post');
    }
}
