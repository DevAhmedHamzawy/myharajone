<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberShipDuration extends Model
{
    protected $guarded = [];
    protected $with = ['membership'];

    public function membership()
    {
        return $this->belongsTo('App\MemberShip');
    }
}
