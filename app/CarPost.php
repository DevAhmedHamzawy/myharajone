<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPost extends Post
{
    /**
     * Disable soft deletes for this model
     */
    public static function bootSoftDeletes() {}
}
