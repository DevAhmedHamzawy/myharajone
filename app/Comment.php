<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function getimgPathAttribute()
    {
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=identicon" . "&s=" . $size = 40;
    }

    public function getcreateAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
