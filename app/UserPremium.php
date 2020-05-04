<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPremium extends Model
{
    // table name has a mistake in detecting
    protected $table = 'user_premium';
    protected $guarded = [];


    public function premium()
    {
        return $this->belongsTo('App\UserPremium');
    }

    public function memberShip()
    {
        return $this->belongsTo('App\MemberShip');
    }
}
