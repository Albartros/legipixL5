<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamertag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gamertags';

    /**
     * Confirm the gamertag.
     *
     * @return void
     */
    public function confirm()
    {
        $this->is_verified = true;
        $this->token = null;
        $this->save();
    }
}
