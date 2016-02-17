<?php

namespace App;

use Devfactory\Media\MediaTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use MediaTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Boot the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = str_random(16);
        });

        static::updating(function ($user) {
            $user->slug = str_slug($user->name);
        });
    }

    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirm()
    {
        $this->is_verified = true;
        $this->token = null;
        $this->save();
    }

    /**
     * Get user's avatar.
     */
    public function getAvatar()
    {
        $avatarType = $this->avatar;

        switch ($avatarType) {
            case 'media';
                return $this->getMedia('avatar');
                break;
            case 'xbox';
                return $this->gamertag()->avatar;
                break;
            default;
                return null;
                break;
        }
    }

    /**
     * Get the gamertag that belongs to the user.
     */
    public function gamertag()
    {
        return $this->hasOne('App\Gamertag');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
