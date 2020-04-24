<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['posts','likes','dislikes','profile'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function favourites()
    {
        return $this->hasMany('App\Favourite');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'seller_id')->whereLike(1);
    }

    public function dislikes()
    {
        return $this->hasMany('App\Like', 'seller_id')->whereLike(-1);
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
